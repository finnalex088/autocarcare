<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\JobCard;
use App\Models\Admin\CarMake;
use App\Models\Admin\CarModel;
use Storage;


class JobCardController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
        $get_data = JobCard::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('job_card.delete',['id'=>$data->id]);
             $url_edit = route('job_card.addUpdate',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>&nbsp;';
             $button .= '<a  name="delete" class="delete btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete"><i class="fa fa-trash"></i> </a>';
             return $button;
         })
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.job_card.index');
    }

    public function addUpdate(Request $request , $id = null)
    {
        
        $CarMake = CarMake::select('id','name')->get();
        if ($request->isMethod('post')) {
            // $img = $request->image;
            // $folderPath = "uploads/";
            
            // $image_parts = explode(";base64,", $img);
            // $image_type_aux = explode("image/", $image_parts[0]);
            // $image_type = $image_type_aux[1];
            
            // $image_base64 = base64_decode($image_parts[1]);
            // $fileName = uniqid() . '.png';
            
            // $file = $folderPath . $fileName;
            // Storage::put($file, $image_base64);
           
            $job_card = JobCard::findOrNew($request->update_id);
            $job_card->registration_number = $request->registration_number;
            $job_card->make_id  = $request->make_id;
            $job_card->model_id  = $request->model_id;
            $job_card->customer_name = $request->customer_name;
            $job_card->mobile_no = $request->mobile_no;
            $job_card->address = $request->address;
            $job_card->color = $request->color;
            $job_card->insurance_id = $request->insurance_id;
            $job_card->odometer_reading = $request->odometer_reading;
            $job_card->fuel_type = $request->fuel_type;
            $job_card->fuel_level = $request->fuel_level;
            $job_card->work_type = $request->work_type;
            $job_card->estimate = $request->estimate;
            // $job_card->image_id = $fileName;
            
            $job_card->save();
             if($job_card){
                $add_update_message = empty($request->update_id) ? 'Job Card Successfully.!' : 'Job Card Successfully.!';
                return redirect()->route('job_card.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('job_card.index')->with('error', 'Job Card not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  JobCard::findOrFail($id);
                return view('admin.job_card.addUpdate')->with(compact('get_data','CarMake'));
            } else {
                return view('admin.job_card.addUpdate')->with(compact('get_data','CarMake'));
            }
        } 
    }

    public function makeModel(Request $request)
    {
        $data['car_model'] = CarModel::where("make_id",$request->make_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function delete(Request $request, $id)
    {
        $job_card=JobCard::find($id);
        $job_card->delete();
        return redirect()->route('job_card.index')->with('success', 'Job Card Deleted Successfully!.');
    }
}


