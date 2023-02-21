@extends('layouts.admin')
@section('content')    
<div class="container mt-5">
    <h2 class="mb-4">Spare Wise</h2>
    
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
                <th>Spare Part Name</th>
                <th>Spare Part code</th>
                <th>Purchase Price</th>
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
        ajax: "{{ route('stock.stockdetails') }}",
        columns: [
           {data: 'spare_part_name', name: 'spare_part_name'},
           {data: 'spare_part_ccode', name: 'spare_part_ccode'},
           {data: 'Purchase_price', name: 'Purchase_price'},
           
           {data: 'action', name: 'action', orderable: true, searchable: true},
           ],
    });
});
</script>
@endsection