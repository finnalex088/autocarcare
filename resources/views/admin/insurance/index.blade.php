@extends('layouts.admin')
@section('content')    
<div class="container mt-5">
    <h2 class="mb-4">Insurance List</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('insurance.addUpdate')}}" class="anchor btn btn-primary font-weight-bolder" style="text-end"> Add Insurance</a>
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
                <th>Company</th>
                <th>Insurance Type</th>
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
        ajax: "{{ route('insurance.index') }}",
        columns: [
           {data: 'company_name', name: 'company_name'},
           {data: 'insurance_type', name: 'insurance_type'},
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection