@extends('layouts.admin')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{__('Employee')}}</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">{{__('Update')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-body os_alr_area">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" id="editBlog" action="{{route('employee.update',$employee->id)}}">

                            @csrf
                            @method('patch')
                            <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$employee->name}}"  class="form-control">
                            @if($errors->has('name'))
                            <span class="validation_error" style="color:red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                         <div class="form-group">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{$employee->designation}}"  class="form-control">
                            @if($errors->has('designation'))
                            <span class="validation_error" style="color:red">{{ $errors->first('designation') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Mobile No</label>
                            <input type="number" name="mobile_no" value="{{$employee->mobile_no}}"  class="form-control">
                            @if($errors->has('mobile_no'))
                            <span class="validation_error" style="color:red">{{ $errors->first('mobile_no') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="10" value="{{$employee->address}}" class="form-control">{{$employee->address}}</textarea>
                            @if($errors->has('address'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('address') }}</span>
                                    @endif
                        </div>


                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="number" name="age" value="{{$employee->age}}" class="form-control">
                            @if($errors->has('age'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('age') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Joining Date</label>
                            <input type="date" name="joining_date" value="{{$employee->joining_date}}" class="form-control">
                            @if($errors->has('joining_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('joining_date') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Leave Date</label>
                            <input type="date" name="leave_date" value="{{$employee->leave_date}}" class="form-control">
                            @if($errors->has('leave_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('leave_date') }}</span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="">Relieving Date</label>
                            <input type="date" name="relieving_date" value="{{$employee->relieving_date}}" class="form-control">
                            @if($errors->has('relieving_date'))
                                        <span class="validation_error" style="color:red">{{ $errors->first('relieving_date') }}</span>
                                    @endif
                        </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary mr-1">Update</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
