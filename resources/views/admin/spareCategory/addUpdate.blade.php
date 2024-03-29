
@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">
<!--begin::Container-->

<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
   <h3 class="card-title">Add spare Category</h3>
</div>
<!--begin::Form-->
<form action="{{ route('spareCategory.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
   <div class="card-body">
      <div class="row">
      

      <div class="col-md-10 form-group">
         <label>Spare Category Name:
         <span class="text-danger">*</span></label>
         <input type="text" name="name" class="form-control" value="{{ isset($get_data->name) ? $get_data->name : old('name')}}" placeholder="Enter spare Category" />
      </div>
     


</div>
</div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
   </div>
</form>

<!--begin: Code-->

@endsection

@section('script')
<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}"></script>
<script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
      name: {
          required: true
       },
       
    },
    messages: {
      name: {
          required: "Spare Category is required"
       },
      
       },
    });
   });
</script>
@endsection







