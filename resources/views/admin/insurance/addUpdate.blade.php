@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">
<!--begin::Container-->

<div class="card-header">
   <h3 class="card-title">Add Insurance</h3>
</div>
<!--begin::Form-->
<form action="{{ route('insurance.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
   <div class="card-body">
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
      <div class="row">
      <div class="col-md-10 form-group">
         <label>Company Name
         <span class="text-danger">*</span></label>
         <input type="text" name="company_name" class="form-control" value="{{ isset($get_data->company_name) ? $get_data->company_name : old('company_name')}}" placeholder="Enter Company Name" />
      </div>
  

   <div class="col-md-10 form-group">
      <label>Insurance Type:</label>
      <select id="fuel_level" name="insurance_type" class="form-control">
         <option value="">Selete Insurance</option>
         <option @isset($get_data->id) @if($get_data->insurance_type == "Zero Depreciation") selected @endif  @endisset value="Zero Depreciation">Zero Depreciation</option>
        <option @isset($get_data->id) @if($get_data->insurance_type == "Compressive") selected @endif  @endisset value="Compressive">Compressive</option>
      <option @isset($get_data->id) @if($get_data->insurance_type == "Third Party") selected @endif  @endisset value="Third Party">Third Party</option>
      </select>
   </div>

   <div class="col-md-10 form-group">
         <label>Insurance Period
         <span class="text-danger">*</span></label>
         
         <!-- <input type="text" required="" placeholder="Insurance Type" name="insurance_period"  id="kt_daterangepicker_1"> -->
         <input type="date" name="insurance_period" value="" />

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
</script>

<script type="text/javascript">
  $(function() {

$('input[name="insurance_period"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});

$('input[name="insurance_period"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="insurance_period"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});
</script>

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
   $(function() {

$('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});
</script>
@endsection







