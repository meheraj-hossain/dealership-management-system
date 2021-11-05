<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total'];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Shopkeeper(){
        return $this->belongsTo(Shopkeeper::class,'user_id');
    }

    public function OrderDetail(){
        return $this->hasMany(OrderDetail::class,'order_id');
    }
}
