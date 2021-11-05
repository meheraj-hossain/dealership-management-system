<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Inventory;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
   public function pendingDelivery(){
       $data['title']='Pending Orders';
       $data['deliveries']=Order::with(['User'=>function($query){
           $query->with(['Shopkeeper'=>function($query){
               $query->with('ShopRegistration');
           }]);
       }])->paginate(2);

       $data['serial']=managePaginationSerial($data['deliveries']);
       return view('delivery.pending_delivery',$data);
   }

   public function orderDetails($id){
//       dd($id);
      $data['title']='Order Details';
//      dd($data);
      $data['orders']=Order::with(['OrderDetail'=>function($query){
          $query->with(['Inventory'=>function($query){
              $query->with(['BeverageSize','BeverageType','BeverageFlavor','SnacksFlavor']);
          }]);
      }])->findOrFail($id);
      return view('delivery.order_details',$data);
   }
}
