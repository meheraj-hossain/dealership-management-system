<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeManagement extends Model
{
    protected $table = 'employee_management';
    public function AreaManager(){
        return $this->belongsTo(AreaManager::class,'employee_id');
    }

}
