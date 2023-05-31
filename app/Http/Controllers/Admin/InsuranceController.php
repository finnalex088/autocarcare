<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Insurance;
use App\Models\Admin\JobCard;


class InsuranceController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
        $get_data = Insurance::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('insurance.delete',['id'=>$data->id]);
             $url_edit = route('insurance.addUpdate',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>&nbsp;';
             $button .= '<a  name="delete" class="delete btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete"><i class="fa fa-trash"></i> </a>';
             return $button;
         })
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.insurance.index');
    }

    public function addUpdate(Request $request , $id = null)
    {
        $jobCard = JobCard::select('id','customer_name')->get();
        if ($request->isMethod('post')) {
            $insurance = Insurance::findOrNew($request->update_id);
            $insurance->company_name = $request->company_name;
             $insurance->job_id   = $request->job_id;
            $insurance->insurance_type  = $request->insurance_type;
            $insurance->insurance_period  = $request->insurance_period;
            $insurance->job_id = $request->job_id;
            $insurance->save();
             if($insurance){
                $add_update_message = empty($request->update_id) ? 'Insurance Added Successfully.!' : 'Insurance Updated Successfully.!';
                return redirect()->route('insurance.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('insurance.index')->with('error', 'Insurance not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  Insurance::findOrFail($id);
                return view('admin.insurance.addUpdate')->with(compact('get_data','jobCard'));
            } else {
                return view('admin.insurance.addUpdate')->with(compact('get_data','jobCard'));
            }
        } 
    }

    public function delete(Request $request, $id)
    {
        $insurance=Insurance::find($id);
        $insurance->delete();
        return redirect()->route('job_card.index')->with('success', 'Job Card Deleted Successfully!.');
    }

}

