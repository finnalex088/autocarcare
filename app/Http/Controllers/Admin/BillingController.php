<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Billing;
use App\Models\Admin\Part;
use App\Models\Admin\JobCard;
use PDF;


class BillingController extends Controller
{
    public function index(Request $request)
    {
        
     
        if($request->ajax()){
        $get_data = Billing::with(['getjob']);
        
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('billing.delete',['id'=>$data->id]);
             $url_edit = route('billing.addUpdate',['id'=>$data->id]);
             $pdf_generate= route('billing.generatepdf',['id'=>$data->id]);
            
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>&nbsp;';
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
            $partid = $request->partid;
            $data = json_encode($partid);
            $billing = Billing::findOrNew($request->update_id);
            $billing->job_id   = $request->job_id;
            $billing->partid   = $data;
            $billing->amount  = $request->amount;
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

    public function delete(Request $request, $id)
    {
        $billing=Billing::find($id);
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

   public function generatepdf(Request $request, $id)
{
    $billing = Billing::find($id);
    $data = [
        'job_id' => $billing->job_id,
        'amount' => $billing->amount
    ];
    $pdf = PDF::loadView('pdf', $data);
    return $pdf->download('bill.pdf');
}
}
