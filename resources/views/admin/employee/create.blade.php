@extends('layouts.admin')

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>Add Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{route('employee.store')}}" method="post" id="employee_form">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @if($errors->has('name'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('name') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{old('designation')}}" class="form-control">
                            @if($errors->has('designation'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('designation') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Mobile No</label>
                            <input type="number" name="mobile_no" value="{{old('mobile_no')}}" class="form-control">
                            @if($errors->has('mobile_no'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('mobile_no') }}</span>
                                    @endif

                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="10" value="{{old('address')}}" class="form-control"></textarea>
                            @if($errors->has('address'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('address') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="number" name="age" value="{{old('age')}}" class="form-control">
                            @if($errors->has('age'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('age') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Joining Date</label>
                            <input type="date" name="joining_date" value="{{old('joining_date')}}" class="form-control">
                            @if($errors->has('joining_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('joining_date') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Leave Date</label>
                            <input type="date" name="leave_date" value="{{old('leave_date')}}" class="form-control">
                            @if($errors->has('leave_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('leave_date') }}</span>
                                    @endif
                        </div>

                         <div class="form-group">
                            <label for="">Relieving Date</label>
                            <input type="date" name="relieving_date" value="{{old('relieving_date')}}" class="form-control">
                            @if($errors->has('relieving_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('relieving_date') }}</span>
                                    @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
   $(document).ready(function () {
    $('#employee_form').validate({
     rules: {
       name: {
          required: true
       },
        designation: {
          required: true
       },
       mobile_no: {
          required: true
       },
       address: {
          required: true
       },
       age: {
          required: true
       },
       joining_date: {
          required: true
       },
       leave_date: {
          required: true
       },
       relieving_date: {
          required: true
       },
    },
    messages: {
       name: {
          required: "Name is required"
       },
       designation: {
          required: "Designation is required"
       },
       mobile_no: {
          required: "Mobile No is required"
       },
       address: {
          required: "Address is required"
       },
       age: {
          required: "Age is required"
       },
       joining_date: {
          required: "Joining Date is required"
       },
       leave_date: {
          required: "Leave Date is required"
       },
       relieving_date: {
          required: "Relieving Date is required"
       },
    },
   });
   });
</script>
@endsection