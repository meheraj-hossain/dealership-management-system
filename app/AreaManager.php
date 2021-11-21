<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AreaManager extends Model
{
//    public function User ()
//    {
//        return $this->hasOne(User::class, 'row_id')->where('action_table','area_manager');
//    }

    public function user()
    {
        return $this->morphOne(User::class, 'ids');
    }

    public function current_user()
    {
        return $this->User()->where('id',Auth::id());
    }

    public function Area(){
        return $this->belongsTo(Area::class,'area_id');
    }
}
