<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SnacksFlavor extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventory::class,'flavor_id');
    }
}
