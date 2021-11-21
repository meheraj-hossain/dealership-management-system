<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeverageFlavor extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventory::class,'flavor_id');
    }
}
