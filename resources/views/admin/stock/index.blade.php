@extends('layouts.admin')
@section('content')    
<div class="container mt-5">
    <h2 class="mb-4">Part List</h2>
     <div class="card-toolbar">
               <!--begin::Button-->
               <a href="{{route('partissue.addUpdate')}}" class="btn btn-primary font-weight-bolder"> Add Part Issue</a>
               <!--end::Button-->
            </div>
            <div class="col-sm-9">
      <div class="well">
        <h2 style="text-align:center;padding-bottom:1%;padding-top:1%;color:blue;text-shadow:2px 2px 2px black;font-weight:bold;">AUTOCAR CARE</h2>
        
      </div>
	  <div class="row">
	  <div class="col">
	  <h3 style="margin-left:17px;">Spare Parts</h3>
	  </div>
	  </div>
	  <div class="row">
	  <div class="col-sm-6">
	  <p style="margin-left:8px;font-size:17px">Kept in an inventory and used for the repair.</p>
	  </div>
	  <div class="col-sm-6">
	 <button type="button" class="btn btn-primary" style=" display: block;margin-left: auto;margin-right:2%;margin-bottom:5%">Spare part</button>
	  </div>
	  </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
             <h4>In Stock</h4>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
              <h4>Low stock</h4>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Out of stock</h4> 
          </div>
        </div>
      </div>
            
@endsection

