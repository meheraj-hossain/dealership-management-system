<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaManager;
use App\Delivery;
use App\EmployeeManagement;
use App\Inventory;
use App\Order;
use App\OrderDetail;
use App\Shopkeeper;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function pendingDelivery()
    {
        $user  = User::where('id', Auth::id())->first();
        $title = 'Customers Order';
        if ($user->action_table == 'App\AreaManager') {
            $areas = Area::with([
                'ShopRegistration' => function ($query) {
                    $query->with([
                        'Order' => function ($query) {
                            $query->where('order_status', '!=', 'Pending')->orderBy('updated_at','DESC');
                            },'Shopkeeper']);}])->where('id', $user->ids->area_id)->first();
            return view('delivery.pending_delivery', compact('user', 'areas', 'title'));
        } else {
            $deliveries = Order::with([
                'User' => function ($query) {
                    $query->with(['Shopkeeper' => function ($query) {
                            $query->with('ShopRegistration');}]);}])->orderBy('updated_at','DESC')->get();

            return view('delivery.pending_delivery', compact('user', 'deliveries', 'title'));
        }
    }

    public function orderDetails($id)
    {
        $data['user_role'] = Auth::user()->action_table;
        $data['title']     = 'Order Details';
        $data['orders']    = Order::with(['OrderDetail' => function ($query) {
                $query->with([
                    'Inventory' => function ($query) {
                        $query->with(['BeverageSize', 'BeverageType', 'BeverageFlavor', 'SnacksFlavor','SnacksType','SnacksSize']);
                    }
                ]);
            }
        ])->findOrFail($id);
        return view('delivery.order_details', $data);
    }

    public function orderStatus(Request $request, $id)
    {
        $user_role = Auth::user()->action_table;
        $status = Order::with(['OrderDetail'])->findOrFail($id);
        if ($status->order_status == 'Pending' && $user_role=='App\Admin') {
            $status->order_status = 'Approved';
            foreach ($status->OrderDetail as $order_detail) {
                $inventory           = Inventory::where('id', $order_detail->product_id)->first();
                $inventory->quantity = $inventory->quantity - $order_detail->quantity;
                $inventory->save();
            }
            $status->update();
        }elseif ($status->order_status == 'Pending' && $user_role=='App\Shopkeeper'){
            $status->order_status = 'Cancelled';
            $status->update();
            return redirect()->route('order.list');
        }
        elseif ($status->order_status == 'Approved') {
            $status->order_status = 'Shipped';
            $status->update();
        }
        return redirect()->route('pending.delivery');
    }

    public function deliver($order_id, $user_id)
    {
        $user = User::with('AreaManager')->findOrFail($user_id);
        DB::beginTransaction();
        try {
            $order                = Order::findOrFail($order_id);
            $order->order_status  = 'Delivered';
            $order->delivery_date = Carbon::now();
            $order->delivered_by  = $user->AreaManager->id;
            $order->save();
            $orders = Order::where('delivered_by', $user->AreaManager->id)->get();

            if (count($orders) >= 2) {
                $payment = EmployeeManagement::where([
                    ['employee_id', $user->AreaManager->id],
                    ['month', date('F')]
                ])->first();
                $sum_total = Order::where('delivered_by', $user->AreaManager->id)->selectRaw("SUM(total) as total")->get();

                if (empty($payment)){
                    $payment = new EmployeeManagement;
                    $payment->employee_id = $user->AreaManager->id;
                    $payment->month = date('F');
                    $payment->commission = $sum_total[0]->total * 10 / 100;
                    $payment->save();
                } else {
                    $payment->commission = $sum_total[0]->total * 10 / 100;
                    $payment->save();
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
        session()->flash('message','Order status updated successfully');
        return redirect()->back();
    }
}
// delivery Controller
