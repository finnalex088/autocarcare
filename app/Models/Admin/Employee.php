<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'designation',
        'mobile_no',
        'address',
        'age',
        'joining_date',
        'leave_date',
        'relieving_date',
    ];    
}
