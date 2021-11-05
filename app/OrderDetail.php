<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function Inventory(){
        return $this->belongsTo(Inventory::class,'product_id');
    }

    public function Order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
