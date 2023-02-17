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
   <h3 class="card-title">Add Job Card</h3>
</div>
<!--begin::Form-->
<form action="{{ route('job_card.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
   <div class="card-body">
      <div class="row">
      <div class="col-md-10 form-group">
         <label>Registration Number
         <span class="text-danger">*</span></label>
         <input type="registration_number" name="registration_number" class="form-control" value="{{ isset($get_data->registration_number) ? $get_data->registration_number : old('registration_number')}}" placeholder="Enter Registration Number" />
      </div>

      <div class="col-md-10 form-group">
         <label>Customer Name
         <span class="text-danger">*</span></label>
         <input type="customer_name" name="customer_name" class="form-control" value="{{ isset($get_data->customer_name) ? $get_data->customer_name : old('customer_name')}}" placeholder="Enter Name" />
      </div>

      <div class="col-md-10 form-group">
         <label>Phone No
         <span class="text-danger">*</span></label>
         <input type="number" name="mobile_no" class="form-control" value="{{ isset($get_data->mobile_no) ? $get_data->mobile_no : old('mobile_no')}}" placeholder="Enter Phone No" />
      </div>

      <div class="form-group col-md-10">
      <label for="exampleTextarea">Residence
      <span class="text-danger">*</span></label>
      <textarea type="text" name="address" id="w3review" class="form-control form-control-solid">{{ isset($get_data->address) ? $get_data->address : old('address')}}</textarea>
      @if($errors->has('address'))
      <span class="validation_error" style="color:red">{{ $errors->first('address') }}</span>
      @endif
   </div>

  <div class="col-md-10 form-group">
      <label>Make</label>
      <select class="form-control category_id" name="make_id" data-live-search="true" id="make_ids">
         <option value="">Selete Make</option>
         @foreach($CarMake as $list)
         <option value="{{$list['id']}}"
         <?php 
         if(!empty($get_data->make_id))
         {
            if($get_data->make_id ==$list['id'])
            {
                  echo "selected";
               }
            }
         ?>
         >{{$list['name']}}</option>
         @endforeach
      </select>
   </div>

   <div class="col-md-10 form-group">
      <label>Model </label>
      <select id="make_id" name="model_id" class="form-control">
         
      </select>
   </div>

   <div class="col-md-10 form-group">
         <label>Odometer Reading
         <span class="text-danger">*</span></label>
         <input type="number" name="odometer_reading" class="form-control" value="{{ isset($get_data->odometer_reading) ? $get_data->odometer_reading : old('odometer_reading')}}" placeholder="Enter Odometer Reading" />
      </div>

      <div class="col-md-10 form-group">
         <label>Color
         <span class="text-danger">*</span></label>
         <input type="color" name="color" class="form-control" value="{{ isset($get_data->color) ? $get_data->color : old('color')}}">
      </div>

      <div class="col-md-10 form-group">
      <label>Fuel Type</label>
      <select id="fuel_type" name="fuel_type" class="form-control">
         <option value="">Selete Fuel Type</option>
         <option @isset($get_data->id) @if($get_data->fuel_type == "Petrol") selected @endif  @endisset value="Petrol">Petrol</option>
        <option @isset($get_data->id) @if($get_data->fuel_type == "Diesel") selected @endif  @endisset value="Diesel">Diesel</option>
      <option @isset($get_data->id) @if($get_data->fuel_type == "Petrol+CNG") selected @endif  @endisset value="Petrol+CNG">Petrol+CNG</option>
      </select>
   </div>

   <div class="col-md-10 form-group">
      <label>Fuel Level</label>
      <select id="fuel_level" name="fuel_level" class="form-control">
         <option value="">Selete Fuel Level</option>
         <option @isset($get_data->id) @if($get_data->fuel_level == "Empty") selected @endif  @endisset value="Empty">Empty</option>
        <option @isset($get_data->id) @if($get_data->fuel_level == "Half") selected @endif  @endisset value="Half">Half</option>
      <option @isset($get_data->id) @if($get_data->fuel_level == "Full") selected @endif  @endisset value="Full">Full</option>
      </select>
   </div>

   <div class="col-md-10 form-group">
      <label>Work Type:</label>
      <select id="work_type" name="work_type" class="form-control">
         <option>Select Work Type</option>
        <option @isset($get_data->id) @if($get_data->work_type == "Running Repair") selected @endif  @endisset value="Running Repair">Running Repair</option>
        <option @isset($get_data->id) @if($get_data->work_type == "Body-shop") selected @endif  @endisset value="Body-shop">Body-shop</option>
      <option @isset($get_data->id) @if($get_data->work_type == "Insurance") selected @endif  @endisset value="Insurance">Insurance</option>
      </select>
   </div>
<div class="col-md-10 form-group">
         <label>Estimate
         <span class="text-danger">*</span></label>
         <input type="text" name="estimate" class="form-control" value="{{ isset($get_data->estimate) ? $get_data->estimate : old('estimate')}}" placeholder="Enter Estimate" />
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
<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}"></script>

   <script>
        $(document).ready(function () {
            $('#make_ids').on('change', function () {
                var idState = this.value;
                $("#make_id").html('');
                $.ajax({
                    url: "{{route('job_card.makeModel')}}",
                    type: "POST",
                    data: {
                        make_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#make_id').html('<option value="">Select Model</option>');
                        $.each(res.car_model, function (key, value) {
                            $("#make_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection





