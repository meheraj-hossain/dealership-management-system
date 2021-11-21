<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeverageType extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventory::class,'type_id');
    }
}
