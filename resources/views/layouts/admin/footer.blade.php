<script src="{{asset('admin/assets/js/script.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.js')}}"></script>  
<script src="{{asset('admin/assets/js/jquery.validate.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/daterangepicker.min.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
      
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
   this.classList.toggle("active");
    });
  }
 // for show and hide password onclick of bi bi-eye-slash icon.
    const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });

  



  </script>