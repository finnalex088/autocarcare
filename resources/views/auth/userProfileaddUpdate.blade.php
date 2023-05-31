
@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">
<!--begin::Container-->

<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
     @if (session('success'))
         <div class="alert alert-success" role="alert">
            {{ session('success') }}
         </div>
         @endif
<div class="card-header">
   <h3 class="card-title">Update Profile</h3>
</div>

        <div class="">
            <a class="btn btn-primary" href="{{ route('admin_dashboard') }}" style="float: right; margin-right: 15%;"> Back</a>
        </div>
<!--begin::Form-->
<form action="{{ route('profile.update') }}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="">
   <div class="card-body">
      <div class="row">
      

      <div class="col-md-10 form-group">
         <label>User Name:
         <span class="text-danger">*</span></label>
         <input type="text" name="name" class="form-control"  value="{{ auth()->user()->name }}" />
      </div>
       <div class="col-md-10 form-group">
         <label>User Email:
         <span class="text-danger">*</span></label>
         <input type="Email" name="email" class="form-control" value="{{ auth()->user()->email }}" />
      </div>
       <div class="col-md-10 form-group">
         <label>User Password:
         <span class="text-danger">*</span></label>
         <div class="password-input-container">
    <input type="password" name="password" class="form-control" id="password">
    <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
  </div>
      </div>
         <div class="col-md-10 form-group">
         <label>User Phone No:
         <span class="text-danger">*</span></label>
         <input type="number" name="phone" class="form-control" value="{{ auth()->user()->phone }}" />
      </div>
        <div class="col-md-10 form-group">
         <label>User Address:
         <span class="text-danger">*</span></label>
         <textarea class="form-control" name="address" id="address" rows="3">{{ auth()->user()->address }}</textarea>
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
       email: {
          required: true
       },
       password: {
          required: true
       },
       UNT: {
          required: true
       },
       Phone: {
          required: true
       },
      
       address: {
          required: true
       
    },
    messages: {
      name : {
          required:"name  is required"
       },
       email: {
          required: "email  is required"
       },
       password: {
          required: "password  is required"
       },
       Phone: {
          required: "Phone  is required"
       },
       address: {
          required: "address  is required"
       },
      
     
    },
    },
   });
   });
</script>
@endsection






