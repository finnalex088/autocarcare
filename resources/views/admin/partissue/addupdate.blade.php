
@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">
<!--begin::Container-->

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
      <label>Job Card</label>
      <select class="form-control category_id" name="job_id" data-live-search="true" id="job_id">
         <option value="">Selete Job</option>
         @foreach($jobCard as $list)
         <option value="{{$list['id']}}"
         <?php 
         if(!empty($get_data->job_id))
         {
            if($get_data->job_id ==$list['id'])
            {
                  echo "selected";
               }
            }
         ?>
         >{{$list['customer_name']}}</option>
         @endforeach
      </select>
         </div>
     
     </div>
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

@endsection

@section('script')
<script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
      part_name: {
          required: true
       },
       part_no: {
          required: true
       },
       part_quantity: {
          required: true
       },
    },
    messages: {
       part_name: {
          required: "Part Name is required"
       },
       part_no: {
          required: "Part Number is required"
       },
       part_quantity: {
          required: "Part Quantity is required"
       },
    },
   });
   });
</script>
@endsection







