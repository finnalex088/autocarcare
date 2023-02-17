<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Billing;
use App\Models\Admin\Part;
use App\Models\Admin\JobCard;



class BillingController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
        $get_data = Billing::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('billing.delete',['id'=>$data->id]);
             $url_edit = route('billing.addUpdate',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit">Edit</i> </a>&nbsp;';
             $button .= '<a  name="delete" class="btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete">Delete<i class="fa fa-trash"></i> </a>';
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
            $billing = Billing::findOrNew($request->update_id);
            $billing->job_id   = $request->job_id;
            $billing->part_id   = $request->part_id;
            $billing->amount  = $request->amount;
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

}
