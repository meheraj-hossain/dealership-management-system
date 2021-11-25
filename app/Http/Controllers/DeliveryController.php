<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaManager;
use App\Delivery;
use App\Inventory;
use App\Order;
use App\OrderDetail;
use App\Shopkeeper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function pendingDelivery(){
        $user= User::where('id',Auth::id())->first();
        $title='Customers Order';
        if ($user->action_table == 'App\AreaManager' ){
            $areas = Area::with(['ShopRegistration'=>function($query){
                $query->with(['Order'=>function($query){
                    $query->where('order_status','!=','Pending');
                },'Shopkeeper']);
            }])->where('id',$user->ids->area_id)->first();
            return view('delivery.pending_delivery',compact('user','areas','title'));
        }else{
            $deliveries=Order::with(['User'=>function($query){
                $query->with(['Shopkeeper'=>function($query){
                    $query->with('ShopRegistration');
                }]);
            }])->get();

            return view('delivery.pending_delivery',compact('user','deliveries','title'));
        }
    }

    public function orderDetails($id){
        $data['user_role'] = Auth::user()->action_table;
        $data['title']='Order Details';
        $data['orders']=Order::with(['OrderDetail'=>function($query){
            $query->with(['Inventory'=>function($query){
                $query->with(['BeverageSize','BeverageType','BeverageFlavor','SnacksFlavor']);
            }]);
        }])->findOrFail($id);
        return view('delivery.order_details',$data);
    }

    public function orderStatus(Request $request, $id){
        $status = Order::with(['OrderDetail'])->findOrFail($id);
        if ($status->order_status == 'Pending' ){
            $status->order_status = 'Approved';
            foreach ($status->OrderDetail as $order_detail){
                $inventory=Inventory::where('id', $order_detail->product_id)->first();
                $inventory->quantity = $inventory->quantity-$order_detail->quantity;
                $inventory->save();
            }
            $status->update();
        }elseif ($status->order_status == 'Approved' ){
            $status->order_status = 'Shipped';
            $status->update();
        }elseif ($status->order_status == 'Shipped' ){
            $status->order_status = 'Received';
            $status->received_date = $request->received_date;
            $status->update();
            return redirect()->route('order.list');
        }elseif($status->order_status == 'Received'){
            $status->order_status = 'Delivered';
            $status->update();
        }
        return redirect()->route('pending.delivery');
    }
}
// delivery Controller
