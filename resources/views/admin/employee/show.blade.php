@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    
        <h2 class="ml-2">car</h2>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>
                                    {{ $employee->name }}
                                </td>
                            </tr>

                            <tr>
                                <th>Designation</th>
                                <td>
                                    {{ $employee->designation }}
                                </td>
                            </tr>

                             <tr>
                                <th>Mobile No</th>
                                <td>
                                    {{ $employee->mobile_no }}
                                </td>
                            </tr>

                             <tr>
                                <th>Address</th>
                                <td>
                                    {{ $employee->address }}
                                </td>
                            </tr>

                             <tr>
                                <th>Age</th>
                                <td>
                                    {{ $employee->age }}
                                </td>
                            </tr>

                             <tr>
                                <th>Joining Date</th>
                                <td>
                                    {{ $employee->joining_date }}
                                </td>
                            </tr>

                             <tr>
                                <th>Leave Date</th>
                                <td>
                                    {{ $employee->leave_date }}
                                </td>
                            </tr>

                             <tr>
                                <th>Relieving Date</th>
                                <td>
                                    {{ $employee->relieving_date }}
                                </td>
                            </tr>
                            
                            </tbody>
                    </table>
               
            </div>
        </div>
    </div>

@endsection

