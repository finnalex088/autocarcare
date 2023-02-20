
@extends('layouts.admin')
@section('content')
<div class="col-sm-9">
      
      <form action="{{ route('stock.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
      @csrf
      <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
     <div class="row">
      <div class="col-sm-6">
      <label>Fuel Level</label>
      <select id="spare_part_category" name="spare_part_category" class="form-control">
         <option value="">Selete spare part  category</option>
        <option @isset($get_data->id) @if($get_data->spare_part_category == "A") selected @endif  @endisset value="A">A</option>
      <option @isset($get_data->id) @if($get_data->spare_part_category == "B") selected @endif  @endisset value="B">B</option>
      </select>
         </div>
     
     </div><br>
     <div class="row">
     
     <div class="col-sm-6">
     <input type="text"  class="form-control" id="name" name="spare_part_name" value="{{ isset($get_data->spare_part_name) ? $get_data->part_name : old('spare_part_name')}}" placeholder="Spare part name">
     </div>
     </div><br>
     
     <div class="row">
     
     <div class="col-sm-6">
     <input type="text"  class="form-control" id="code" name="spare_part_ccode" value="{{ isset($get_data->spare_part_ccode) ? $get_data->spare_part_ccode : old('spare_part_ccode')}}" placeholder="Spare part code">
     </div>
     </div><br>
     <div class="row" style="margin-left:30%">
     
     <div class="col-sm-5">
     <button type="button" class="btn btn-outline-dark" style=" display: block;margin-left: auto;margin-right:0;color:blue">Auto generate</button>
     </div>
     <div class="col-sm-1">
     <button type="button" class="btn btn-primary" style=" display: block;margin-left: auto;margin-right:0;">Submit</button>
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-3">
     <input type="text" class="form-control" id="purchasePrice" name="Purchase_price" value="{{ isset($get_data->Purchase_price) ? $get_data->Purchase_price : old('	Purchase_price')}}"  placeholder="Purchase Price">
     </div>
     <div class="col-sm-3">
     <input type="text"  class="form-control" id="SalesPrice" name="sales_price" value="{{ isset($get_data->sales_price) ? $get_data->sales_price : old('sales_price')}}" placeholder="Sales Price">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-3">
     <input type="text" class="form-control" id="tax" name="tax" value="{{ isset($get_data->tax) ? $get_data->tax : old('tax')}}"  placeholder="Tax">
     </div>
     <div class="col-sm-3">
     <input type="text"  class="form-control" id="ProfitMargin" name="profit_margin" value="{{ isset($get_data->profit_margin) ? $get_data->profit_margin : old('profit_margin')}}" placeholder="Profit Margin">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-3">
     <select id="unt" name="UNT" class="form-control">
         <option value="">Selete UNT</option>
         
        <option @isset($get_data->id) @if($get_data->UNT == "A") selected @endif  @endisset value="A">A</option>
      <option @isset($get_data->id) @if($get_data->UNT == "B") selected @endif  @endisset value="B">B</option>
      </select>
     </div>
     <div class="col-sm-3">
     <input type="text"  class="form-control" id="location" name="location" value="{{ isset($get_data->location) ? $get_data->location : old('location')}}" placeholder="Location">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-3">
     <input type="text" class="form-control" id="lowStockQuantity" name="low_stock_quantity" value="{{ isset($get_data->low_stock_quantity) ? $get_data->low_stock_quantity : old('low_stock_quantity')}}"  placeholder="Low Stock Quantity">
     </div>
     <div class="col-sm-3">
     <input type="text"  class="form-control" id="hsnCode" name="HSN_code" value="{{ isset($get_data->HSN_code) ? $get_data->HSN_code: old('HSN_code')}}" placeholder="HSN Code">
     </div>
     </div><br>
     <div class="row">
     
     <div class="col-sm-6">
     <input type="text"  class="form-control" id="description" name="description" value="{{ isset($get_data->description) ? $get_data->description : old('description')}}" placeholder="Description">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-6">
     <input type="text"  class="form-control" id="ManufacturedBy" name="manufactured_by" value="{{ isset($get_data->manufactured_by) ? $get_data->manufactured_by : old('manufactured_by')}}" placeholder="Manufactured by">
     </div>
     </div><br>
     
     <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
   </div>
     
     
     
     
     
     
     
     
     
     
     
     </form>
     
      
     
      
     
           </div>
@endsection

@section('script')
<script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
       company_name: {
          required: true
       },
        insurance_type: {
          required: true
       },
       insurance_period: {
          required: true
       },
    },
    messages: {
       company_name: {
          required: "Company Name is required"
       },
       insurance_type: {
          required: "Insurance Type is required"
       },
       insurance_period: {
          required: "Insurance Period is required"
       },
    },
   });
   });
</script>
@endsection






