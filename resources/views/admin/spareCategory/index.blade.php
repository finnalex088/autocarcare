@extends('layouts.admin')
@section('content')    

    <h2 class="mb-4" style="margin-left:12px">spare category</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('spareCategory.addUpdate')}}" class="anchor btn btn-primary font-weight-bolder">Add Spare Category</a>
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
                <th>Name</th>
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
        ajax: "{{ route('spareCategory.index') }}",
        columns: [
           {data: 'name', name: 'name'},
           
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection
