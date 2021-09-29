<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopkeeper extends Model
{
    public function User() {
        return $this->hasOne(User::class,'row_id');
    }
}
