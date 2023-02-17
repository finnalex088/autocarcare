<script src="{{asset('admin/assets/js/script.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.js')}}"></script>  
<script src="{{asset('admin/assets/js/jquery.validate.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>