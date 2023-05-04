@extends('layouts.admin')

@section('content')    

    <h2 class="mb-4" style="margin-left:12px">Employee List</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('employee.create')}}" class="anchor btn btn-primary font-weight-bolder"> Add Employee</a>
               <!--end::Button-->
            </div>
            @if (count($errors) > 0)
         @foreach ($errors->all() as $error)
         <p class="alert alert-danger">{{ $error}}  </p>
         @endforeach
         @endif
         @if (session('error'))
         <div class="alert alert-danger" role="alert">
            {{ session('error') }}
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success" role="alert">
            {{ session('success') }}
         </div>
         @endif
    <table class="table table-bordered yajra-datatable table-hover">
        <thead>
            <tr>
                 <th>Image</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
@section('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employee.index') }}",
        columns: [
              {
        data: 'image',
        name: 'image',
        render: function (data, type, full, meta) {
            return "<img src='{{ asset('uploads/image') }}/" + data + "' height='50'>";
        }
    },
            {data: 'name', name: 'name'},
            {data: 'designation', name: 'designation'},
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection