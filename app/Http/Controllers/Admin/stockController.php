<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Stock;

class stockController extends Controller
{
    public function addUpdate(Request $request , $id = null)
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
             if($stock){
                $add_update_message = empty($request->update_id) ? 'stock Added Successfully.!' : 'stock Updated Successfully.!';
                return redirect()->route('stock.index')->with('success', $add_update_message);
            } else {
                return redirect()->route('stock.index')->with('error', 'stock not Created');
            }
            }else {
            $get_data = '';
            if($id){
                $get_data =  Part::findOrFail($id);
                return view('admin.stock.addupdate')->with(compact('get_data'));
            } else {
                return view('admin.stock.addupdate')->with(compact('get_data'));
            }
        } 
    }

    public function delete(Request $request, $id)
    {
        $stock=Stock::find($id);
        $stock->delete();
        return redirect()->route('stock.index')->with('success', 'stock Successfully!.');
    }
}
