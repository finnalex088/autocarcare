@extends('layouts.admin')
@section('content')
<div class="d-flex flex-column-fluid">




<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
   <h3 class="card-title">Add Bill</h3>
</div>
<!--begin::Form-->
<form action="{{ route('billing.addUpdate')}}" enctype="multipart/form-data" id="form_validation" method="post" class="forms-sample">
   @csrf
   <input type="hidden" name="update_id" value="{{ isset($get_data->id) ? $get_data->id : ''}}">
   <div class="card-body">
      <div class="row">

  <div class="col-md-10 form-group">
      <label>Job Card</label>
      <select class="form-control category_id" name="job_id" data-live-search="true" id="job_id">
         <option value="">Selete Job</option>
         @foreach($jobCard as $list)
         <option value="{{$list['id']}}"
         <?php 
         if(!empty($get_data->job_id))
         {
            if($get_data->job_id ==$list['id'])
            {
                  echo "selected";
               }
            }
         ?>
         >{{$list['customer_name']}}</option>
         @endforeach
      </select>
         </div>
   <div class="col-md-10 form-group">
      <!-- <label>Part Issue</label> -->
      <label><strong>Select Part :</strong></label><br/>
      <select  class="form-control category_id" name="partid[]" data-live-search="true" id="part_id" multiple="multiple">
         <option value="" disabled>Selete Part</option>
         @foreach($part as $list)
         <option value="{{$list['id']}}"
         <?php 
         if(!empty($get_data->part_id ))
         {
            if($get_data->part_id  ==$list['id'])
            {
                  echo "selected";
               }
            }
         ?>
         >{{$list['part_name']}}</option>
         @endforeach
      </select>
   </div>

  

    <div class="col-md-10 form-group">
         <label>Amount
         <span class="text-danger">*</span></label>
         <input type="number" name="amount" id="amount" class="form-control " value="{{ isset($get_data->amount) ? $get_data->amount : old('amount')}}" placeholder="Enter Amount"   onchange="add();"/>
      </div>

      <div class="col-md-10 form-group">
      <label>Select Labour Charges</label>
      <select class="form-control category_id" name="" data-live-search="true" id="labour_charges" onchange="changeStatus()">
         <option value="">Selete type of labour charges</option>
         <option value="fix">Fix price</option>
         <option value="percentage">percentege</option>
      </select>
         </div>
<div class="labour field_wrapper col-md-10 form-group " id="labour" >
         <label>Select Labour Types</label>
      <input type="text" class="form-control labour1" name="field_name[]" id="labour1" value="" />
      <a href="javascript:void(0);" class="add_button"  title="add field">
         <i class="fa fa-plus" style="color:black"></i>
         </a>
   
</div>
         
    <div class="col-md-10 form-group fix_price" id="fix_price" >
         
         <input type="number" name="total_amount" class="form-control fix_price1" id="fix_price1" placeholder="enter fix price"  />
      </div>

      <div class="col-md-10 form-group total_amount" id="total_amount" >
      <label>Total Amount +GST</label>
         <input type="number" name="fix_total_amount" id="total" class="form-control"  />
      </div>

      <div class="col-md-10 form-group percentage" id="percentage" >
         
         <input type="number" name="percentage1" class="form-control fix_price1" id="percentage1" placeholder="enter percentage"  />
      </div>

      <div class="col-md-10 form-group total_amount1" id="total_amount1" placeholder="percentage price" >
      <label>Total Amount + GST</label>
         <input type="number" name="percentage_total_amount" id="total1" class="form-control"   />
      </div>

</div>
</div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
   </div>
</form>

<!--begin: Code-->


@endsection

@section('script')
<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}"></script>

   <script>
        $(document).ready(function () {
            $('#make_ids').on('change', function () {
                var idState = this.value;
                $("#make_id").html('');
                $.ajax({
                    url: "{{route('job_card.makeModel')}}",
                    type: "POST",
                    data: {
                        make_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#make_id').html('<option value="">Select Model</option>');
                        $.each(res.car_model, function (key, value) {
                            $("#make_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
   $(document).ready(function () {
    $('#form_validation').validate({
     rules: {
      job_id : {
          required: true
       },
       part_id: {
          required: true
       },
       amount: {
          required: true
       },
      
    },
    messages: {
      job_id: {
          required: "Job is required"
       },
       part_id: {
          required: "Part is required"
       },
       amount: {
          required: "Amount is required"
       },
       
    },
   });
   });

   function changeStatus(){
      var status=document.getElementById("labour_charges");
      if(status.value=="fix"){
         var element = document.getElementById("fix_price");
  element.classList.remove("fix_price");
  var element1 = document.getElementById("total_amount");
  element1.classList.remove("total_amount");
  var ele = document.getElementById("labour");
  ele.classList.remove("labour");

  var element = document.getElementById("percentage");
  element.classList.add("percentage");
  var element1 = document.getElementById("total_amount1");
  element1.classList.add("total_amount1");
  
  
      }
      else if(status.value=="percentage"){
         var element = document.getElementById("percentage");
  element.classList.remove("percentage");
  var element1 = document.getElementById("total_amount1");
  element1.classList.remove("total_amount1");
var ele = document.getElementById("labour");
  ele.classList.remove("labour");

  var element = document.getElementById("fix_price");
  element.classList.add("fix_price");
  var element1 = document.getElementById("total_amount");
  element1.classList.add("total_amount");
  
      }
      else{
        
      }
   }

   $(document).ready(function() {
  $('.fix_price1').on('keyup', function(event) {
   var a=document.getElementById("amount").value;
   var b=document.getElementById("fix_price1").value;
   var c=document.getElementById("percentage1").value;
   var total=(parseFloat(a)+parseFloat(b))+((parseFloat(a)+parseFloat(b))*18)/100;
   console.log(total);
   document.getElementById("total").value=total;
   
   var total1=((parseFloat(a)*parseFloat(c))/100)+(((parseFloat(a)*parseFloat(c))/100)*18)/100;
   console.log(total1);
   document.getElementById("total1").value=total1;
  });
});
   
//    function add(){
//    var a=document.getElementById("amount").value;
//    var b=document.getElementById("fix_price1").value;
//    var c=document.getElementById("percentage1").value;
//    var total=(parseFloat(a)+parseFloat(b))+((parseFloat(a)+parseFloat(b))*18)/100;
//    console.log(total);
//    document.getElementById("total").value=total;
   
//    var total1=((parseFloat(a)*parseFloat(c))/100)+(((parseFloat(a)*parseFloat(c))/100)*18)/100;
//    console.log(total1);
//    document.getElementById("total1").value=total1;
// }

 $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" class="form-control" name="field_name[]" value=""/> <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus"></i></a><a href="javascript:void(0);" class="remove_button"> <i class="fa fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
	
	
	  $(wrapper).on('click', '.add_button1', function(e){
        e.preventDefault();
         $(wrapper).append(fieldHTML);  
        x++; 
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

 
</script>
@endsection






