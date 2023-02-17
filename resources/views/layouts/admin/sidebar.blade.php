

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        
		
        <li><a href="#section2">Job Cards</a></li>
        <li><a href="#section3">Stocks</a></li>
        <li><a href="#section3">Billing Data</a></li>
		<li><a href="">Employee Data</a></li>
		<li><a href="#section3">Insurance Alerts/Service Alerts</a></li>
		
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content" id="navbar">
    <div class="col-sm-3 sidenav hidden-xs" id="navbar1">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
       <li class="active"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
		 <button class="dropdown-btn">Job Cards
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="{{route('job_card.index')}}">Registration</a>
    <a href="{{route('insurance.index')}}">Insurance details</a>
    <a href="partissue.html">Part Issue</a>
	
  </div>
         <button class="dropdown-btn">Stocks
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="processNo_a.html">Spare Parts</a>
    <a href="processNo_b.html">Stock wise</a>
    <a href="newprocessNo_c.html">Category</a>
  </div>
       <button class="dropdown-btn">Billing Data
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Job Card Details</a>
    
  </div>
		<li><a href="{{route('employee.index')}}">Employee Data</a></li>
		<li><a href="#section3">Insurance Alerts/Service Alerts</a></li>
		<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
      </ul><br>
    </div>
    <br>

     <div class="col-sm-9">
      
        @yield('content')
        
     
      
      </div>