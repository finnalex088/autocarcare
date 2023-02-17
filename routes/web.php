<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\JobCardController;
use App\Http\Controllers\Admin\InsuranceController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin_dashboard');

    /*----------------------------------Employee Module--------------------------------------------------*/
    Route::resource('employee', EmployeeController::class);

   /*----------------------------------Job Card Module--------------------------------------------------*/

    Route::any('job_card', [JobCardController::class,'index'])->name('job_card.index');
     Route::any('job_card/addUpdate/{id?}', [JobCardController::class,'addUpdate'])->name('job_card.addUpdate');
     Route::any('job_card/delete/{id?}', [JobCardController::class,'delete'])->name('job_card.delete');
     Route::post('job_card/make_model', [JobCardController::class, 'makeModel'])->name('job_card.makeModel');

     /*----------------------------------Insurance Module--------------------------------------------------*/

    Route::any('insurance', [InsuranceController::class,'index'])->name('insurance.index');
    Route::any('insurance/addUpdate/{id?}', [InsuranceController::class,'addUpdate'])->name('insurance.addUpdate');
     Route::any('insurance/delete/{id?}', [InsuranceController::class,'delete'])->name('insurance.delete');

});




