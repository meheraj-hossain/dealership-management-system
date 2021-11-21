<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeverageCategory extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventory::class,'category_id');
    }
}
