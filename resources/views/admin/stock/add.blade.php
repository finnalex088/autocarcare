
@extends('layouts.admin')
@section('content')
<div class="col-sm-9">
      
      <form action="{{ route('stock.add')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
      @csrf
      <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
     <div class="row">
      <div class="col-sm-12">
      <label>Spare category</label>
      <select class="form-control category_id" name="spare_category_id" data-live-search="true" id="make_ids">
         <option value="">Selete Category</option>
         @foreach($spare_category as $list)
         <option value="{{$list['id']}}">{{$list['name']}}</option>
         @endforeach
      </select>
         </div>
     
     </div><br>
     <div class="row">
     
     <div class="col-sm-12">
     <label>Spare part name</label>
     <input type="text"  class="form-control" id="name" name="spare_part_name"  placeholder="Spare part name">
     </div>
     </div><br>
     
     <div class="row">
     
     <div class="col-sm-12">
     <label>Spare part code</label>
     <input type="text"  class="form-control" id="code" name="spare_part_ccode"  placeholder="Spare part code">
     </div>
     </div><br>
     <div class="row" style="margin-left:30%">
     
     <div class="col-sm-12">
     <button type="button" class="btn btn-outline-dark" style=" display: block;margin-left: auto;margin-right:0;color:blue">Auto generate</button>
     </div>
    
     </div><br>
     <div class="row">
     <div class="col-sm-6">
     <label>Purchase Price</label>
     <input type="text" class="form-control" id="purchasePrice" name="Purchase_price"   placeholder="Purchase Price">
     </div>
     <div class="col-sm-6">
     <label>Sales Price</label>
     <input type="text"  class="form-control" id="SalesPrice" name="sales_price"  placeholder="Sales Price">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-6">
     <label>Tax</label>
     <input type="text" class="form-control" id="tax" name="tax"   placeholder="Tax">
     </div>
     <div class="col-sm-6">
     <label>Profit Margin</label>
     <input type="text"  class="form-control" id="ProfitMargin" name="profit_margin"  placeholder="Profit Margin">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-6">
     <label> UNT</label>
     <select id="unt" name="UNT" class="form-control">
         <option value="">Selete UNT</option>
         
        <option @isset($get_data->id) @if($get_data->UNT == "A") selected @endif  @endisset value="A">A</option>
      <option @isset($get_data->id) @if($get_data->UNT == "B") selected @endif  @endisset value="B">B</option>
      </select>
     </div>
     <div class="col-sm-6">
     <label>Location</label>
     <input type="text"  class="form-control" id="location" name="location"  placeholder="Location">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-6">
     <label>Stock Quantity</label>
     <input type="number" class="form-control" id="lowStockQuantity" name="low_stock_quantity"   placeholder="Stock Quantity">
     </div>
     <div class="col-sm-6">
     <label>HSN Code</label>
     <input type="text"  class="form-control" id="hsnCode" name="HSN_code"  placeholder="HSN Code">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-12">
     <label>Description</label>
     <input type="text"  class="form-control" id="description" name="description" value="{{ isset($get_data->description) ? $get_data->description : old('description')}}" placeholder="Description">
     </div>
     </div><br>
     <div class="row">
     <div class="col-sm-12">
     <label>Manufactured by</label>
     <input type="text"  class="form-control" id="ManufacturedBy" name="manufactured_by" value="{{ isset($get_data->manufactured_by) ? $get_data->manufactured_by : old('manufactured_by')}}" placeholder="Manufactured by">
     </div>
     </div><br>
     
     <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
   </div>
     
     
     
     
     
     
     
     
     
     
     
     </form>
     
      
     
      
     
           </div>
@endsection

@section('script')
<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}"></script>

  
    <script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
      spare_part_category : {
          required: true
       },
       spare_part_name: {
          required: true
       },
       spare_part_ccode: {
          required: true
       },
       Purchase_price: {
          required: true
       },
       sales_price: {
          required: true
       },
       tax: {
          required: true
       },
       profit_margin: {
          required: true
       },
       UNT: {
          required: true
       },
       location: {
          required: true
       },
       low_stock_quantity: {
          required: true
       },
       HSN_code: {
          required: true
       },
       description: {
          required: true
       },
       manufactured_by: {
          required: true
       },
    },
    messages: {
      spare_part_category : {
          required:"Spare part is required"
       },
       spare_part_name: {
          required: "Part name is required"
       },
       spare_part_ccode: {
          required: "Part code is required"
       },
       Purchase_price: {
          required: "Purchase price is required"
       },
       sales_price: {
          required: "sales price is required"
       },
       tax: {
          required: "tax is required"
       },
       profit_margin: {
          required: "Profit margin is required"
       },
       UNT: {
          required: "UNT is required"
       },
       location: {
          required: "loaction is required"
       },
       low_stock_quantity: {
          required: "stock quantity is required"
       },
       HSN_code: {
          required: "HSN code is required"
       },
       description: {
          required: "description is required"
       },
       manufactured_by: {
          required: "manufactured by is required"
       },
    },
   });
   });
</script>
@endsection














