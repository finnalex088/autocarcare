@extends('layouts.admin')
@section('content')

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
      <div class="col-md-5 form-group">
         <label>Registration Number
         <span class="text-danger">*</span></label>
        <input type="number" name="registration_number" class="form-control" value="{{ isset($get_data->registration_number) ? $get_data->registration_number : old('registration_number')}}" placeholder="Enter Registration Number" />
</div>
<div class="col-md-5 form-group">
         <label>Customer Name
         <span class="text-danger">*</span></label>
         <input type="customer_name" name="customer_name" class="form-control" value="{{ isset($get_data->customer_name) ? $get_data->customer_name : old('customer_name')}}" placeholder="Enter Name" />
      </div>

      </div>

      <div class="row">
      <div class="col-md-5 form-group">
         <label>Phone No
         <span class="text-danger">*</span></label>
         <input type="number" name="mobile_no" class="form-control" value="{{ isset($get_data->mobile_no) ? $get_data->mobile_no : old('mobile_no')}}" placeholder="Enter Phone No" />
      </div>

      <div class="form-group col-md-5">
      <label for="exampleTextarea">Residence
      <span class="text-danger">*</span></label>
      <textarea type="text" name="address" id="w3review" class="form-control form-control-solid">{{ isset($get_data->address) ? $get_data->address : old('address')}}</textarea>
      @if($errors->has('address'))
      <span class="validation_error" style="color:red">{{ $errors->first('address') }}</span>
      @endif
   </div>
</div>
<div class="row">
  <div class="col-md-5 form-group">
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

   <div class="col-md-5 form-group">
      <label>Model </label>
      <select id="make_id" name="model_id" class="form-control">
         
      </select>
   </div>
         </div>
         <div class="row">
   <div class="col-md-5 form-group">
         <label>Odometer Reading
         <span class="text-danger">*</span></label>
         <input type="number" name="odometer_reading" class="form-control" value="{{ isset($get_data->odometer_reading) ? $get_data->odometer_reading : old('odometer_reading')}}" placeholder="Enter Odometer Reading" />
      </div>

      <div class="col-md-5 form-group">
         <label>Color
         <span class="text-danger">*</span></label>
         <input type="color" name="color" class="form-control" value="{{ isset($get_data->color) ? $get_data->color : old('color')}}">
      </div>
         </div>
         <div class="row">
      <div class="col-md-5 form-group">
      <label>Fuel Type</label>
      <select id="fuel_type" name="fuel_type" class="form-control">
         <option value="">Selete Fuel Type</option>
         <option @isset($get_data->id) @if($get_data->fuel_type == "Petrol") selected @endif  @endisset value="Petrol">Petrol</option>
        <option @isset($get_data->id) @if($get_data->fuel_type == "Diesel") selected @endif  @endisset value="Diesel">Diesel</option>
      <option @isset($get_data->id) @if($get_data->fuel_type == "Petrol+CNG") selected @endif  @endisset value="Petrol+CNG">Petrol+CNG</option>
      </select>
   </div>

   <div class="col-md-5 form-group">
      <label>Fuel Level</label>
      <select id="fuel_level" name="fuel_level" class="form-control">
         <option value="">Selete Fuel Level</option>
         <option @isset($get_data->id) @if($get_data->fuel_level == "Empty") selected @endif  @endisset value="Empty">Empty</option>
        <option @isset($get_data->id) @if($get_data->fuel_level == "Half") selected @endif  @endisset value="Half">Half</option>
      <option @isset($get_data->id) @if($get_data->fuel_level == "Full") selected @endif  @endisset value="Full">Full</option>
      </select>
   </div>
         </div>
         <div class="row">
   <div class="col-md-5 form-group">
      <label>Work Type:</label>
      <select id="work_type" name="work_type" class="form-control">
         <option>Select Work Type</option>
        <option @isset($get_data->id) @if($get_data->work_type == "Running Repair") selected @endif  @endisset value="Running Repair">Running Repair</option>
        <option @isset($get_data->id) @if($get_data->work_type == "Body-shop") selected @endif  @endisset value="Body-shop">Body-shop</option>
      <option @isset($get_data->id) @if($get_data->work_type == "Insurance") selected @endif  @endisset value="Insurance">Insurance</option>
      </select>
   </div>
<div class="col-md-5 form-group">
         <label>Estimate
         <span class="text-danger">*</span></label>
         <input type="text" name="estimate" class="form-control" value="{{ isset($get_data->estimate) ? $get_data->estimate : old('estimate')}}" placeholder="Enter Estimate" />
      </div>
         </div>

         <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
                @if(isset($get_data->image_id))
                <img src="{{ asset('storage/app/public/'.$get_data->image_id) }}" alt="Image">
                @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
   Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }

</script>

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
    <script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
       registration_number : {
          required: true
       },
        customer_name: {
          required: true
       },
       mobile_no: {
          required: true
       },
       address: {
          required: true
       },
       odometer_reading: {
          required: true
       },
       fuel_type: {
          required: true
       },
       fuel_level: {
          required: true
       },
       work_type: {
          required: true
       },
       estimate: {
          required: true
       },
       make_id: {
          required: true
       },
       model_id: {
          required: true
       },
    },
    messages: {
       registration_number: {
          required: "Registration Number is required"
       },
       customer_name: {
          required: "Name is required"
       },
       mobile_no: {
          required: "Phone No is required"
       },
       address: {
          required: "Address is required"
       },
       odometer_reading: {
          required: "Odometer is required"
       },
       fuel_type: {
          required: "Fuel Type is required"
       },
       fuel_level: {
          required: "Fuel Level is required"
       },
       work_type: {
          required: "Work Type is required"
       },
       estimate: {
          required: "Estimate is required"
       },
       make_id: {
          required: "Make id is required"
       },
       model_id: {
          required: "Model id is required"
       },
    },
   });
   });
</script>
@endsection






