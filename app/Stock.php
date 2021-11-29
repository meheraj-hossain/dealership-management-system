<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function Inventory(){
        return $this->belongsTo(Inventory::class,'inventory_id');
    }
}
