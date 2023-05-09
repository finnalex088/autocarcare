<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\JobCardController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\PartController;
use App\Http\Controllers\Admin\BillingController;

use App\Http\Controllers\Admin\stockController;
use App\Http\Controllers\Admin\spareCategoryController;
use App\Http\Controllers\Admin\PDFController;




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
    return redirect('/login');
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

     /*------------------------------------------part issue-----------------------------------------------*/
     Route::any('partissue', [PartController::class,'index'])->name('partissue.index');
    Route::any('partissue/addUpdate/{id?}', [PartController::class,'addUpdate'])->name('partissue.addUpdate');
     Route::any('partissue/delete/{id?}', [PartController::class,'delete'])->name('partissue.delete');

     /*----------------------------------Billing Module--------------------------------------------------*/

    Route::any('billing', [BillingController::class,'index'])->name('billing.index');
    Route::any('billing/addUpdate/{id?}', [BillingController::class,'addUpdate'])->name('billing.addUpdate');
    Route::any('billing/delete/{id?}', [BillingController::class,'delete'])->name('billing.delete');
    Route::any('billing/generatepdf/{id}', [BillingController::class,'generatepdf'])->name('billing.generatepdf');

      /*----------------------------------stock Module--------------------------------------------------*/

   
    Route::any('stock/add/{id?}', [stockController::class,'add'])->name('stock.add');
    Route::any('/stock/edit/{id?}', [stockController::class,'edit'])->name('stock.edit');
    Route::any('stock/update/{id?}', [stockController::class,'update'])->name('stock.update');
    Route::any('stock/stockdetails/{id?}', [stockController::class,'stockdetails'])->name('stock.stockdetails');
     Route::any('stock/delete/{id?}', [stockController::class,'delete'])->name('stock.delete');


     /*----------------------------------spare category Module--------------------------------------------------*/

     Route::any('spareCategory', [spareCategoryController::class,'index'])->name('spareCategory.index');
     Route::any('spareCategory/addUpdate/{id?}', [spareCategoryController::class,'addUpdate'])->name('spareCategory.addUpdate');
     Route::any('spareCategory/delete/{id?}', [spareCategoryController::class,'delete'])->name('spareCategory.delete');

        /*----------------------------------GEnerate PDF Module--------------------------------------------------*/
        // Route::get('show', [PDFController::class,'show']);
    // Route::get('pdf', [PDFController::class,'generatepdf'])->name('pdf.generatepdf');
});






