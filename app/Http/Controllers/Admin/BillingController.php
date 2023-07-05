<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Billing;
use App\Models\Admin\Part;
use App\Models\Admin\JobCard;
use App\Models\Admin\spareCategory;
use App\Models\Admin\Insurance;
use App\Models\Admin\Stock;
use Illuminate\Support\Facades\Log;
// use Illuminate\Facades\DB;
use PDF;


class BillingController extends Controller
{
    public function index(Request $request)
    {
        
      
        if($request->ajax()){
          $billings = Billing::pluck('job_id');
        $jobCard = JobCard::whereIn('id', $billings)->select('id', 'customer_name')->get();
        return DataTables::of($jobCard)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
            $billingId = Billing::where('job_id',$data->id)->first();
             $delete_url = route('billing.delete',['id'=>$data->id]);
             $url_edit = route('billing.addUpdate',['id'=>$billingId->id]);
             $pdf_generate= route('billing.generatepdf',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$billingId->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>&nbsp;';
             $button .= '<a  name="delete" class="delete btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete"><i class="fa fa-trash"></i> </a>';
              $button .= '<a href="'.$pdf_generate.'" id="'.$data->id.'" class="pdf btn btn-success btn-sm"> Download PDF </a>&nbsp;';
             // $button .= '<a  name="pdf" class="pdf btn btn-danger" onclick="return confirm(\'Are You Sure Want to Download PDF?\')" href="'.$url_PDFgenerate.'" id=" '.$data->id.' "class="pdf">Download PDF </a>';
             return $button;
         })
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.billing.index');
}

public function addUpdate(Request $request , $id = null)
    {
        
        $jobCard = JobCard::select('id','customer_name')->get();
        $part = Part::select('id','part_name')->get();
        if ($request->isMethod('post')) {
              $fieldNames = $request->input('field_name');
              
            $partid = $request->partid;
            $data = json_encode($partid);
            $billing = Billing::findOrNew($request->update_id);
             $labourTypes = [];
    foreach ($fieldNames as $fieldName) {
        $labourTypes[] = $fieldName;
    }
             $billing->labour_types = json_encode($labourTypes);
            $billing->job_id   = $request->job_id;
            $billing->partid   = $data;
            $billing->amount  = $request->amount;
            $billing->labour_fix_amount  = $request->labour_fix_amount;
            $billing->fix_total_amount  = $request->fix_total_amount;
            $billing->percentage_total_amount = $request->percentage_total_amount;
            $billing->save();
               
             if($billing){
                $add_update_message = empty($request->update_id) ? 'Billing Added Successfully.!' : 'Billing Updated Successfully.!';
                return redirect()->route('billing.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('billing.index')->with('error', 'Billing not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  Billing::findOrFail($id);
                return view('admin.billing.addUpdate')->with(compact('get_data','jobCard', 'part'));
            } else {
                return view('admin.billing.addUpdate')->with(compact('get_data','jobCard', 'part'));
            }
        } 
    }

    public function delete(Request $request, $job_id)
    {
        $billing = Billing::where('job_id', $job_id)->first();
      
        $billing->delete();
        return redirect()->route('billing.index')->with('success', 'Billing Deleted Successfully!.');
    }
//     public function generatepdf()
//    {
//         $data=[
//             'title'=>'welcome',
//             'date'=>date('m/d/y')
//                 ];
//          $pdf=PDF::loadView('pdf',$data);
//          return $pdf->download('bill.pdf');

//     }

   public function generatepdf(Request $request, $job_id)
{
  
    $billing = Billing::where('job_id', $job_id)->first();

    if (!$billing) {
      
        return redirect()->back()->with('error', 'Billing record not found for the given job ID');
    }
    $jobCards = JobCard::where('id', $billing->job_id)->get(['id','spare_category_id']);
    // log::info($jobCards);
    $jobCard = JobCard::where('id', $billing->job_id)->first();
    $part = Part::where('id', $billing->job_id)->first();
    $insurance = Insurance::where('job_id', $billing->job_id)->first();
    $stock=Stock::where('id',$jobCard->spare_category_id)->first();
    $partId = $billing->partid;
    $count = Billing::whereIn('partid', [$partId])->count();

    
    log::info($partId);
    log::info($count);
    // $jobCards = JobCard::where('spare_category_id', $spareCategory->id)->get();
    // log::info($spareCategory);
    $data = [
        'job_id' => $billing->job_id,
        'amount' => $billing->amount,
        'customer_name' =>$jobCard->customer_name,
        'address' =>$jobCard->address,
        'id' =>$jobCard->id,
        'model_id' =>$jobCard->model_id,
        'created_at'=>$jobCard->created_at,
        'registration_number' =>$jobCard->registration_number,
        'part_name'=>$part->part_name,
        'part_quantity'=>$part->part_quantity,
        'VIN_No' =>$jobCard->VIN_No,
        'policy_no' =>$jobCard->policy_no,
        'claim_no' =>$jobCard->claim_no,
        'mileage' =>$jobCard->mileage,
        'work_type'=>$jobCard->work_type,
        'UNT'=>$stock->UNT,
        'HSN_code'=>$stock->HSN_code,
        'tax'=>$stock->tax,
        'spare_part_name'=>$stock->spare_part_name,
        'amount'=>$billing->amount,
        'fix_total_amount'=>$billing->fix_total_amount,
        'percentage_total_amount'=>$billing->percentage_total_amount,
        'labour_fix_amount'=>$billing->labour_fix_amount,
        'count' => $count,
    ];
    $pdf = PDF::loadView('pdf', $data);
    return $pdf->download('bill.pdf');
}
}
