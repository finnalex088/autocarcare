<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCard extends Model
{
    use HasFactory;

     protected $fillable = [
        'registration_number',
        'customer_name',
        'mobile_no',
        'address',
        'make_id',
        'model_id',
    ];  
   
  
}


