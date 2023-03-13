@extends('layouts.admin')
@section('content')    

    
    
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
        @if($count>5)
        <div class="col-sm-4">
          
         
          
          
          <div class="well" id="well1" style="background-color:green">
             <h4>In Stock</h4>
             <h5>{{$count}}</h5>
          </div>
         
        </div>
        @elseif($count<=5)
        <div class="col-sm-4">
          <div class="well" id="well2" style="background-color:orange">
              <h4>Low stock</h4>
               <h5>{{$count}}</h5>
          </div>
        </div>
        @else
        <div class="col-sm-4">
         
          <div class="well" id="well3" style="background-color:red">
            <h4>Out of stock</h4> 
             <h5>{{$count}}</h5>
          </div>
        </div>
         @endif
      </div>
</div>
</div>
    
@endsection

