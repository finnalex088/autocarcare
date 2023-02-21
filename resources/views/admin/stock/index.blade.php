@extends('layouts.admin')
@section('content')    
<div class="container mt-5">
    
    
            <div class="col-sm-9">
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
<a href="{{route('stock.addUpdate')}}" class="btn btn-primary font-weight-bold" style=" display: block;margin-left: auto;margin-right:2%;margin-bottom:5%">spare Parts</a>  
</div>
	  </div>
      <div class="row">
        <div class="col-sm-4">
          @if($count>5)
          <style>
            #well1{
              background-color:#66cf66;
              color:white;
            }
          </style>
          @endif
          <div class="well" id="well1">
             <h4>In Stock</h4>
             <h5>{{$count}}</h5>
          </div>
         
        </div>
        <div class="col-sm-4">
        @if($count<=5)
          <style>
            #well2{
              background-color:orange;
              color:white;
            }
          </style>
          @endif
          <div class="well" id="well2">
              <h4>Low stock</h4>
              
          </div>
        </div>
        <div class="col-sm-4">
        @if($count<=1)
          <style>
            #well3{
              background-color:red;
              color:white;
            }
          </style>
          @endif
          <div class="well" id="well3">
            <h4>Out of stock</h4> 
          </div>
        </div>
      </div>
</div>
</div>
</div>     
@endsection

