
<html>
<head>
   @include('layouts.admin.header')
   @auth
            <!-- Show user information -->
            
       
        @endauth
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












