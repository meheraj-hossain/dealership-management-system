<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRegistration extends Model
{
    public function Shopkeeper(){
        return $this->belongsTo(Shopkeeper::class,'ownerId');
    }

    public function Area(){
        return $this->belongsTo(Area::class,'area_id');
    }
    public function Order(){
        return $this->hasMany(Order::class,'shop_id');
    }
}
