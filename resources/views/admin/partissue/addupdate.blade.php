
@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">
<!--begin::Container-->
<div class="container">
<div class="row">
<div class="col-md-12">
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
   <h3 class="card-title">Add Part</h3>
</div>
<!--begin::Form-->
<form action="{{ route('partissue.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
   <div class="card-body">
      <div class="row">
      <div class="col-md-10 form-group">
         <label>Part No
         <span class="text-danger">*</span></label>
         <input type="text" name="part_no" class="form-control" value="{{ isset($get_data->part_no) ? $get_data->part_no : old('part_no')}}" placeholder="Enter Part No" />
      </div>

      <div class="col-md-10 form-group">
         <label>Part Name
         <span class="text-danger">*</span></label>
         <input type="text" name="part_name" class="form-control" value="{{ isset($get_data->part_name) ? $get_data->part_name : old('part_name')}}" placeholder="Enter Part Name" />
      </div>
      <div class="col-md-10 form-group">
         <label>Part Quantity
         <span class="text-danger">*</span></label>
         <input type="text" name="part_quantity" class="form-control" value="{{ isset($get_data->part_quantity) ? $get_data->part_quantity : old('part_quantity')}}" placeholder="Enter Part Quantity" />
      </div>


</div>
</div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
   </div>
</form>

<!--begin: Code-->
<div class="example-code mt-10">
<div class="example-highlight">
<pre style="height:400px">
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







