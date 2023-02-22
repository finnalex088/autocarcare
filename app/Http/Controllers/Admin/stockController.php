<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Stock;

class stockController extends Controller
{
   

    public function stockdetails(Request $request)
    {

        if($request->ajax()){
        $get_data = Stock::get();
        return Datatables::of($get_data)
            ->addIndexColumn()
         ->addColumn('action', function($row){
                $btn = '<a href="employee/'. $row->id .'" class="edit btn btn-info btn-sm">View</a>&nbsp;';
                $btn = $btn.'<a href="stock/' . $row->id . '/edit" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i>Update</a>&nbsp;';
                $btn = $btn.'<form action="employee/'. $row->id .'" method="post" class="d-inline">
                '.csrf_field().'
                '.method_field("DELETE").'
                                
                                <button type="submit" class="btn btn-danger"
                                onclick="return confirm(\'Are You Sure Want to Delete?\')">Delete</button>
                            </form>';

                 return $btn;
         })
            
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.stock.stockdetails');
    }
    public function add(Request $request , $id = null)
    {
        if ($request->isMethod('post')) {
            $stock = Stock::findOrNew($request->update_id);
            $stock->spare_part_category = $request->spare_part_category;
            $stock->spare_part_name  = $request->spare_part_name;
            $stock->spare_part_ccode  = $request->spare_part_ccode;
            $stock->Purchase_price = $request->Purchase_price;
            $stock->sales_price = $request->sales_price;
            $stock->tax = $request->tax;
            $stock->profit_margin = $request->profit_margin;
            $stock->UNT = $request->UNT;
            $stock->location = $request->location;
            $stock->low_stock_quantity = $request->low_stock_quantity;
            $stock->HSN_code = $request->HSN_code;
            $stock->description	 = $request->description;
            $stock->manufactured_by	 = $request->	manufactured_by;
            $stock->save();
            return redirect()->route('stock.stockdetails')->with('success', 'stock added Successfully!.');
             
        } 
        return view('admin.stock.add');
    }



 public function edit(Request $request, $id)
{
        $count=Stock::count();
        $stock= Stock::find($id);
        if(!$stock){
            return redirect('stock.stockdetails')->with('error', 'Stock Not Found');
        }

        return view('admin.stock.edit',compact('stock'));
    }

    //  public function update(Request $request, $id)
    // {
    //     $updateData = $request->validate([
    //         'spare_part_category'=> 'required',
    //         'spare_part_name'=> 'required',
    //         'spare_part_ccode'=> 'required',
    //         'Purchase_price'=> 'required',
    //         'sales_price'=> 'required',
    //         'tax'=> 'required',
    //         'profit_margin'=> 'required',
    //         'UNT'=> 'required',
    //         'location'=> 'required',
    //         'low_stock_quantity'=> 'required',
    //         'HSN_code'=> 'required',
    //         'description'=> 'required',
    //         'manufactured_by'=> 'required',

    //     ]);
    //     Stock::whereId($id)->update($updateData);
    //     return redirect()->route('stock.stockdetails')->with('success', 'Stock Updated Successfully!.');
    // }

public function update(Request $request,$id){
    
    $stock= Stock::find($id);
    
    return view('admin.stock.update',['get_data'=>$stock]);
}
    

    public function delete(Request $request, $id)
    {
        $stock=Stock::find($id);
        $stock->delete();
        return redirect()->route('stock.stockdetails')->with('success', 'stock deleted Successfully!.');
    }
}
