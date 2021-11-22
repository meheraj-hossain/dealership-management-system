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
       $data['title']='Customers Order';
       $data['areas'] = Area::with(['ShopRegistration'=>function($query){
           $query->with(['Order'=>function($query){
               $query->where('order_status','!=','Pending');
           },'Shopkeeper']);
       }])->where('id',$user->ids->area_id)->first();
//       dd($data['deliveries']->ShopRegistration);

//       $data['deliveries']=Order::with(['User'=>function($query){
//           $query->with(['Shopkeeper'=>function($query){
//               $query->with('ShopRegistration');
//           }]);
//       }])->paginate(6);
//       $data['serial']=managePaginationSerial($data['areas']);
       return view('delivery.pending_delivery',$data);
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

       $user_role = Auth::user()->action_table;
       $status = Order::with(['OrderDetail'])->findOrFail($id);

       if($status->order_status == 'Pending' && $user_role == 'App\Shopkeeper'){
           $status->order_status = 'Canceled';
           $status->update();
           session()->flash('message','Order Canceled Successfully');
           return redirect()->back();
       }
       elseif ($status->order_status == 'Pending' ){
           $status->order_status = 'Approved';
           foreach ($status->OrderDetail as $order_detail){
               $inventory=Inventory::where('id', $order_detail->product_id)->first();
               $inventory->quantity = $inventory->quantity-$order_detail->quantity;
               $inventory->save();
           }
           $status->update();
       }

       elseif ($status->order_status == 'Approved' ){
           $status->order_status = 'Shipped';
           $status->update();
       }

       elseif ($status->order_status == 'Shipped' ){
           $status->order_status = 'Recieved';
           $status->received_date = $request->received_date;
           $status->update();
           return redirect()->route('order.list');
       }

       elseif($status->order_status == 'Recieved'){
           $status->order_status = 'Delivered';
           $status->update();
       }
       session()->flash('message','Order Status is changed Successfully');
       return redirect()->route('pending.delivery');
   }
}
