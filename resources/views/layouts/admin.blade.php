
<html>
<head>
   @include('layouts.admin.header')
</head>  
 
    <body>
<div class="container-fluid">
 
          <div class="row">
            <div class="col">
            @include('layouts.admin.sidebar')
        </div>

        <div class="col">
        <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Autocar Care</span>
    </div>
    @yield('content')
  </section>
        
        </div>
        </div>
        
        </div>
        <footer class="row">
       @include('layouts.admin.footer')
       @yield('script')
   </footer>
</body>
</html>












