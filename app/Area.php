<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function ShopRegistration(){
        return $this->hasMany(ShopRegistration::class,'area_id');
    }

    public function AreaManager(){
        return $this->hasOne(AreaManager::class,'area_id');
    }

}
