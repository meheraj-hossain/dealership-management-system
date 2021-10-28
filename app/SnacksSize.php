<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SnacksSize extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventory::class,'size_id');
    }
}
