<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
     public function index(Request $request)
    {
        if($request->ajax()){
            $data = Employee::all();
            //dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            
           ->addColumn('action', function($row){
                $btn = '<a href="employee/'. $row->id .'" class="edit btn btn-info btn-md"><i class="fa fa-eye"></i></a>&nbsp;';
                $btn = $btn.'<a href="employee/'. $row->id .'/edit" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;';
                $btn = $btn.'<form action="employee/'. $row->id .'" method="post" class="d-inline" style="widht:50px;">
                '.csrf_field().'
                '.method_field("DELETE").'
                                
                                <button type="submit" class="btn btn-danger"
                                onclick="return confirm(\'Are You Sure Want to Delete?\')"><i class="fa fa-trash"></i></button>
                            </form>';

                 return $btn;
         })
            ->rawColumns(['action'])
            ->make(true);
        }


        return view('admin.employee.index');
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'designation'=> 'required',
            'mobile_no'=> 'required',
            'image' => 'required',
            'address'=> 'required',
            'age'=> 'required',
            'joining_date'=> 'required',
            'leave_date'=> 'required',
            'relieving_date'=> 'required',
        ]);
       
   

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->mobile_no = $request->mobile_no;
       if ($request->hasFile('image')) {
       $file = $request->file('image');
       $filename = time().'.'.$file->getClientOriginalExtension();
       $file->move('uploads/image/', $filename);
       $employee->image = $filename;
       }    
        $employee->address = $request->address;
        $employee->age = $request->age;
        $employee->joining_date = $request->joining_date;
        $employee->leave_date = $request->leave_date;
        $employee->relieving_date = $request->relieving_date;
        $employee->save();
       return redirect()->route('employee.index')->with('success', 'Employee Created Successfully!.');
    }

    public function show(Employee $employee)
    {
        return view('admin.employee.show',compact('employee'));
    }

    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);
        if(!$employee){
            return redirect('employee.index')->with('error', 'Employee Not Found');
        }

        return view('admin.employee.edit',compact('employee'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=> 'required',
            'designation'=> 'required',
            'mobile_no'=> 'required',
            'image' => 'required',
            'address'=> 'required',
            'age'=> 'required',
            'joining_date'=> 'required',
            'leave_date'=> 'required',
            'relieving_date'=> 'required',
        ]);
           $employee = Employee::find($id);
            $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->mobile_no = $request->mobile_no;
      if ($request->hasFile('image')) {
        $destination = 'uploads/image/' . $employee->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/image/', $filename);
        $employee->image = $filename;
    }  
        $employee->address = $request->address;
        $employee->age = $request->age;
        $employee->joining_date = $request->joining_date;
        $employee->leave_date = $request->leave_date;
        $employee->relieving_date = $request->relieving_date;
        $employee->update();

      //  $updateData = $request->validate([
        //     'name'=> 'required',
        //     'designation'=> 'required',
        //     'mobile_no'=> 'required',
        //     'image'=>'required',
        //     'address'=> 'required',
        //     'age'=> 'required',
        //     'joining_date'=> 'required',
        //     'leave_date'=> 'required',
        //     'relieving_date'=> 'required',
            
        // ]);
        
        return redirect()->route('employee.index')->with('success', 'Employee Updated Successfully!.');
    }

     public function destroy(Request $request, $id)
    {
        $employee=Employee::find($id);
        $employee->delete();
        $request->session()->flash('success','Employee Deleted');
        return redirect()->route('employee.index')->with('success', 'Employee Deleted Successfully!.');
    }

}
