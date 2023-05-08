<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
 public function show(Request $request)
   {
       return view('page');

    }

    public function generatepdf(Request $request)
   {
        $data=[
            'title'=>'welcome',
            'date'=>date('m/d/y')
        ];
         $pdf=PDF::loadView('pdf',$data);
         return $pdf->download('bill.pdf');

    }
}
