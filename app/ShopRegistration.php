<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopRegistration extends Model
{
    public function Shopkeeper(){
        return $this->hasOne(Shopkeeper::class,'ownerId');
    }
}
