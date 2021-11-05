<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use App\BeverageFlavor;
use App\BeverageSize;
use App\BeverageType;
use App\Inventory;
use App\Order;
use App\OrderDetail;
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
        $data['products'] = Inventory::with(['BeverageSize','BeverageFlavor','BeverageCategory','BeverageType','SnacksSize','SnacksFlavor','SnacksCategory','SnacksType'])->paginate(3);
        return view('order', $data);
    }

    public function placeOrder(Request $request){
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id= Auth::user()->id;
            $order->order_id=Str::random(6);
            $order->save();
            $final_total = 0;
            foreach ($request->id as $product_id) {
                $inventory=Inventory::where('id', $product_id)->first();
                $inventory->quantity = $inventory->quantity-$request->quantity[$product_id];
                $inventory->save();
                $order_details= new OrderDetail();
                $order_details->order_id = $order->id;
                $order_details->product_id = $inventory->id;
                $order_details->unit_price = $inventory->price_per_carton;
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->total = $order_details->unit_price * $order_details->quantity;
                $final_total += $order_details->total;
                $order_details->save();
            }
            $order->update(['total'=>$final_total]);
            DB::commit();
            $data['title']='Invoice';
            return view('place_order',$data);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}

