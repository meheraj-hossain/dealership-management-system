<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function BeverageSize() {
        return $this->belongsTo(BeverageSize::class,'size_id');
    }

    public function SnacksSize() {
        return $this->belongsTo(SnacksSize::class,'size_id');
    }

    public function BeverageFlavor() {
        return $this->belongsTo(BeverageFlavor::class,'flavor_id');
    }

    public function SnacksFlavor() {
        return $this->belongsTo(SnacksFlavor::class,'flavor_id');
    }

    public function BeverageCategory() {
        return $this->belongsTo(BeverageCategory::class,'category_id');
    }

    public function SnacksCategory() {
        return $this->belongsTo(SnacksCategory::class,'category_id');
    }

    public function SnacksType() {
        return $this->belongsTo(SnacksType::class,'type_id');
    }

    public function BeverageType() {
        return $this->belongsTo(BeverageType::class,'type_id');
    }
}
