<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    public function getjob(){
        return $this->hasOne('App\Models\Admin\jobCard','id','job_id');
    }
}
