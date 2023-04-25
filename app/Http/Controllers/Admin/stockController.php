<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Stock;
use App\Models\Admin\spareCategory;

class stockController extends Controller
{
   

    public function stockdetails(Request $request)
    {

        if($request->ajax()){
            $get_data = Stock::get();
            return Datatables::of($get_data)
                ->addIndexColumn()
                ->addColumn('action', function($data){    
                 $delete_url = route('stock.delete',['id'=>$data->id]);
                 $url_edit = route('stock.edit',['id'=>$data->id]);
                 $button = '<a href="'.$url_edit.'" id="'.$data->id.'" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>&nbsp;';
                 $button .= '<a  name="delete" class="delete btn btn-danger" onclick="return confirm(\'Are You Sure Want to Delete?\')" href="'.$delete_url.'" id=" '.$data->id.' "class="delete"><i class="fa fa-trash"></i> </a>';
                 return $button;
             })
            
            
            

            ->rawColumns(['action'])
            ->make(true); 
        }
        return view('admin.stock.stockdetails');
    }
    public function add(Request $request , $id = null)
    {
        $spare_category = spareCategory::all();
        if ($request->isMethod('post')) {
            $stock = Stock::findOrNew($request->update_id);
            //$stock = Stock::where('spare_category_id', $request->update_id)->firstOrNew();
            
            $stock->spare_category_id = $request->spare_category_id;
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
        return view('admin.stock.add',compact('spare_category'));
    }



 public function edit(Request $request, $id)
{
        $count=Stock::count();
        $get_data= Stock::find($id);
        $spare_category = spareCategory::all();
        if(!$get_data){
            return redirect('stock.stockdetails')->with('error', 'Stock Not Found');
        }

        return view('admin.stock.update',compact('get_data','spare_category'));
    }


    public function update(Request $request, $id)
    {
       
        $stock= $request->validate([
            'spare_part_name'=> 'required',
           'spare_part_name'  => 'required', 
            'spare_part_ccode'  => 'required', 
            'Purchase_price' => 'required', 
           'sales_price' => 'required', 
            'tax' => 'required',
            'profit_margin' => 'required',
            'UNT' => 'required',
            'location' => 'required', 
            'low_stock_quantity' => 'required', 
            'HSN_code' => 'required', 
            'description'	 => 'required', 
            'manufactured_by'	 => 'required',
        ]);
        Stock::whereId($id)->update($stock);
        return redirect()->route('stock.stockdetails')->with('success', 'stockUpdated Successfully!.');
    }


    

    public function delete(Request $request, $id)
    {
        $stock=Stock::find($id);
        $stock->delete();
        return redirect()->route('stock.stockdetails')->with('success', 'stock deleted Successfully!.');
    }
}
