<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use App\BeverageFlavor;
use App\BeverageSize;
use App\BeverageType;
use App\Inventory;
use App\Order;
use App\OrderDetail;
use App\SnacksCategory;
use App\SnacksFlavor;
use App\SnacksSize;
use App\SnacksType;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
//    public function home()
//    {
//        $data['title'] = 'Make Order';
//        $data['products'] = Inventory::paginate(5);
//        return view('make_order', $data);
//    }

    public function order()
    {
        $data['title'] = 'Order';
        $data['categories']=BeverageCategory::all();
        $data['sizes']=BeverageSize::all();
        $data['flavors']=BeverageFlavor::all();
        $data['types']=BeverageType::all();
        $data['stypes']=SnacksType::all();
        $data['sflavors']=SnacksFlavor::all();
        $data['ssizes']=SnacksSize::all();
        $data['scategories']=SnacksCategory::all();
        $data['products'] = Inventory::with(['BeverageSize','BeverageFlavor','BeverageCategory','BeverageType','SnacksSize','SnacksFlavor','SnacksCategory','SnacksType'])->where('quantity','>',0)->where('status','Active')->get();
        return view('order', $data);
    }

    public function placeOrder(Request $request){
        $shop_id = User::with(['Shopkeeper'=>function($query){
            $query->with(['ShopRegistration']);
        }])->where('id',Auth::user()->id)->first();
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id= Auth::user()->id;
            $order->order_id=Str::random(6);
            $order->shop_id = $shop_id->Shopkeeper->ShopRegistration->id;
            $order->save();
            $final_total = 0;
            foreach ($request->id as $product_id) {
                $inventory=Inventory::where('id', $product_id)->first();
                $order_details= new OrderDetail();
                $order_details->order_id = $order->id;
                $order_details->product_id = $inventory->id;
                $order_details->unit_price = $inventory->price_per_carton;
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->total = $order_details->unit_price * $order_details->quantity;
                $final_total += $order_details->total;
                $order_details->save();
            }
            if ($final_total>=1000 && $final_total<2000){
                $final_total=$final_total-($final_total*5/100);
                $order->update(['total'=>$final_total]);
                DB::commit();
                session()->flash('message','Your order is now pending. 5% Discount added');
            }elseif ($final_total>=2000){
                $final_total=$final_total-($final_total*10/100);
                $order->update(['total'=>$final_total]);
                DB::commit();
                session()->flash('message','Your order is now pending. 10% Discount added');
            }else {
                $order->update(['total' => $final_total]);
                DB::commit();
                session()->flash('message', 'Your order is now pending');
            }
            return redirect()->route('order.list');
        } catch (\Exception $exception) {
            DB::rollBack();
            session()->flash('error', 'Order is not created');
            return redirect()->back();
        }
    }

    public function userOrderList(){
        $data['deliveries']=Order::with(['User'=>function($query){
            $query->with(['Shopkeeper'=>function($query){
                $query->with('ShopRegistration');
            }]);
        }])->where('user_id',Auth::user()->id)->latest()->paginate(6);
        $data['serial']=managePaginationSerial($data['deliveries']);
        $data['title'] = 'Order List';
        return view('admin.user.shopkeeper.order_list.index',$data);
    }
}

