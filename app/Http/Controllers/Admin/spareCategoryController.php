<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\spareCategory;

class spareCategoryController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
        $get_data = spareCategory::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
            ->addColumn('action', function($data){    
             $delete_url = route('spareCategory.delete',['id'=>$data->id]);
             $url_edit = route('spareCategory.addUpdate',['id'=>$data->id]);
             $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit">Edit</i> </a>&nbsp;';
             $button .= '<a  name="delete" class="btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete">Delete<i class="fa fa-trash"></i> </a>';
             return $button;
         })
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.spareCategory.index');
    }


    public function addUpdate(Request $request , $id = null)
    {
        if ($request->isMethod('post')) {
            $part = spareCategory::findOrNew($request->update_id);
            $part->name = $request->name;
            
            
            $part->save();
             if($part){
                $add_update_message = empty($request->update_id) ? 'spare Category Added Successfully.!' : 'spare Category Updated Successfully.!';
                return redirect()->route('spareCategory.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('spareCategory.index')->with('error', 'spare Category not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  spareCategory::findOrFail($id);
                return view('admin.spareCategory.addupdate')->with(compact('get_data'));
            } else {
                return view('admin.spareCategory.addupdate')->with(compact('get_data'));
            }
        } 
    }

    public function delete(Request $request, $id)
    {
        $part=spareCategory::find($id);
        $part->delete();
        return redirect()->route('spareCategory.index')->with('success', 'spare Category Deleted Successfully!.');
    }
}
