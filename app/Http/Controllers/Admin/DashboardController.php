<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Admin\JobCard;
use App\Models\Admin\Part;
class DashboardController extends Controller
{
    public function index()
    {
        $employee=Employee::count();
        $job=JobCard::count();
        $part=Part::count();
        
        return view('admin.dashboard',compact('employee','job','part'));

    }
}
