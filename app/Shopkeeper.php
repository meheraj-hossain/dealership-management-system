<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopkeeper extends Model
{
//    public function User() {
//        return $this->hasOne(User::class,'row_id')->where('action_table','shopkeeper');
//    }

    public function user()
    {
        return $this->morphOne(User::class, 'ids');
    }

    public function ShopRegistration(){
        return $this->hasOne(ShopRegistration::class,'ownerId');
    }

    public function Order(){
        return $this->hasMany(Order::class,'user_id');
    }
}
