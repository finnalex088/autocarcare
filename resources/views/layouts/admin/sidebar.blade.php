<div class="sidebar ">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Car Management</span>
      
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route('admin_dashboard')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('job_card.index')}}">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Job Cards</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Job Cards</a></li>
          <li><a href="{{route('job_card.index')}}">Registration</a></li>
          <li><a href="{{route('insurance.index')}}">Insurance Details</a></li>
          <li><a href="{{route('partissue.index')}}">Part Issue</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Stocks</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Stocks</a></li>
          <li><a href="{{route('stock.add')}}">Stocks</a></li>
          <li><a href="{{route('stock.stockdetails')}}">Stocks Details</a></li>
          <li><a href="{{route('spareCategory.index')}}">Spare Category</a></li>
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="{{route('billing.index')}}">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Billing</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Billing</a></li>
          <li><a href="{{route('billing.index')}}">Billing</a></li>
          
        </ul>
      </li>
      
      <li>
        <a href="{{route('employee.index')}}">
          <i class='bx bx-history'></i>
          <span class="link_name">Employee Data</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('employee.index')}}">Employee Data</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Insurance Alerts/Service Alerts</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Insurance Alerts/Service Alerts</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name">Logout</div>
        
      </div>
      <i class='bx bx-log-out' href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      </i>
      
    </div>
  </li>
</ul>
  </div>
 
  

   