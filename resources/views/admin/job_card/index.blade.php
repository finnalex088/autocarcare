@extends('layouts.admin')

@section('content')    
<div class="container mt-5">
    <h2 class="mb-4">Job Card List</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('job_card.addUpdate')}}" class="anchor btn btn-primary font-weight-bolder"> Add Job Card</a>
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
         <div class="card-body">
            <table class="table table-separate table-head-custom table-checkable" id="main_datatable">
            </table>
         </div>
    <table class="table table-bordered yajra-datatable table-hover ">
        <thead>
            <tr>
                <th>customer_name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('#main_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('job_card.index') }}",
        columns: [
            {data: 'customer_name', name: 'customer_name'},
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection