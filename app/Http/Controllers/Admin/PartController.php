<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Part;

class PartController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
        $get_data = Part::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('partissue.delete',['id'=>$data->id]);
             $url_edit = route('partissue.addUpdate',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit">Edit</i> </a>&nbsp;';
             $button .= '<a  name="delete" class="btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete">Delete<i class="fa fa-trash"></i> </a>';
             return $button;
         })
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.partissue.index');
    }


    public function addUpdate(Request $request , $id = null)
    {
        if ($request->isMethod('post')) {
            $part = Part::findOrNew($request->update_id);
            $part->part_name = $request->part_name;
            $part->part_no  = $request->part_no;
            $part->part_quantity  = $request->part_quantity;
            
            $part->save();
             if($part){
                $add_update_message = empty($request->update_id) ? 'part issue Added Successfully.!' : 'Part issue Updated Successfully.!';
                return redirect()->route('partissue.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('partissue.index')->with('error', 'part issue not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  Part::findOrFail($id);
                return view('admin.partissue.addupdate')->with(compact('get_data'));
            } else {
                return view('admin.partissue.addupdate')->with(compact('get_data'));
            }
        } 
    }

    public function delete(Request $request, $id)
    {
        $part=Part::find($id);
        $part->delete();
        return redirect()->route('partissue.index')->with('success', 'Job Card Deleted Successfully!.');
    }
}

