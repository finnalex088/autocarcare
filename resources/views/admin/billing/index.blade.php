@extends('layouts.admin')

@section('content')    
<div class="container mt-5">
    <h2 class="mb-4">Billing List</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('billing.addUpdate')}}" class="btn btn-primary font-weight-bolder"> Add Billing List</a>
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
    <table class="table table-bordered yajra-datatable">
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
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('billing.index') }}",
        columns: [
            {data: 'customer_name', name: 'customer_name'},
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection