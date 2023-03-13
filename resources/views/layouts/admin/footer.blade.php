<script src="{{asset('admin/assets/js/script.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.js')}}"></script>  
<script src="{{asset('admin/assets/js/jquery.validate.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/daterangepicker.min.js')}}"></script>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
      
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
   this.classList.toggle("active");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
    
  });


  </script>