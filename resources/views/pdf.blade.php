<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
    <title>Document</title>
<head>
<style>
  @page {
            margin: 0;
            padding:0;
        }
table tr td{
  text-align:left;
}
table tr th{
  text-align:left;
}
</style>
</head>

<body>

 
<table>
<tbody>
<tr>
<td style="" >
<img src="{{public_path('images/logo.jpg') }}" height="auto" width="100px">
</td>
<td style="padding-left:100px;font-size:12px">
<h3 style="text-align:center">SHREE RAM AUTOMOBILES</h3>
      <p style="text-align:center">(Bosch Multi-Brand Car Solutions)</p>
      <p style="text-align:center">D-8, SECTOR-80, NOIDA, Gautam Buddha Nagar, Uttar Pradesh, 201306</p>
      <p style="text-align:center">Tel. : 7428977001/2/3/4/5/6/7, Fax : , Email: shreeramautobosch@gmail.com</p>
</td>
</tr>

</tbody>
</table>
<table>
<tbody>
<tr>
<td style="padding-left:340px" ><h3>Tax Invoice</h3></td>
<td style="padding-left:80px;font-size:12px;" ><p>CIN:abc<br>GST No. : 09CPSPD9059P1ZR</p></td>
</tr>
</tbody>
</table>
<hr style="border: 1px solid black;border-radius: 5px;">



  <table style="font-size:15px;">
    <tbody>
    <tr>
    <td>   
        <tr ><th style="text-align:left">Bill No</th><td>:</td><td style="padding-left:100px;">20-21/8075000191</td></tr>
        <tr ><th style="text-align:left">Customer ID</th><td>:</td><td style="padding-left:100px;">{{$id}}</td></tr>
        <tr ><th style="text-align:left">Customer Name</th><td>:</td><td style="padding-left:100px;">{{$customer_name}}</td></tr>
        <tr ><th style="text-align:left">Customer Address</th><td>:</td><td style="padding-left:100px;">{{$address}}</td></tr>
        </td>
       
        <td>
        <tr><th style="text-align:left">Bill Date</th><td>:</td><td style="padding-left:100px;">{{$created_at}}</td></tr>
        <tr><th style="text-align:left">Reg. No.</th><td>:</td><td style="padding-left:100px;">{{$registration_number}}</td></tr>
        <tr ><th style="text-align:left">Job No.</th><td>:</td><td style="padding-left:100px;">6075000197</td></tr>
        <tr ><th style="text-align:left">Job. Date</th><td>:</td><td style="padding-left:100px;">{{$created_at}}</td></tr>
         <tr ><th style="text-align:left">Model</th><td>:</td><td style="padding-left:100px;">{{$model_id}}</td></tr>
          <tr ><th style="text-align:left">VIN NO.</th><td>:</td><td style="padding-left:100px;">{{$VIN_No}}</td></tr>
           <tr ><th style="text-align:left">Service Type</th><td>:</td><td style="padding-left:100px;">{{$work_type}}</td></tr>
            <tr ><th style="text-align:left">Policy No</th><td>:</td><td style="padding-left:100px;">{{$policy_no}}</td></tr>
             <tr ><th style="text-align:left">Claim No</th><td>:</td><td style="padding-left:100px;">{{$claim_no}}</td></tr>
              <tr ><th style="text-align:left">Mileage</th><td>:</td><td style="padding-left:100px;">{{$mileage}}</td></tr>
        </td>
        </tr>
    </tbody>
</table>

<table  style="font-size:12px; border-spacing: 20px;">
<thead style="border-top:1px solid black;border-bottom:1px solid black;">
  <tr>
    <th style="text-align:left">Sr. No.</th>
    <th style="text-align:left">Part Description</th>
    <th style="text-align:left">UNT</th>
    <th style="text-align:left">HSN/SACCode</th >
    <th>MRP</th>
    <th style="text-align:left">Tax %</th>
    <th style="text-align:left">Qty.</th>
    <th style="text-align:left">Rate</th>
    <th style="text-align:left">Taxable Amt</th>
    <th style="text-align:left">Taxable Labor Amt. </th>
  </tr>
</thead>
    <h3>Parts</h3>
    <tr>
    <td>1</td>
    <td> {{$part_name}}</td>
    <td>{{$UNT}}</td>
    <td>{{$HSN_code}}</td>
    <td>1367.98 </td>
    <td>18%</td>
    <td>{{$part_quantity}}</td>
    <td>{{$amount}}</td>
   <td>{{ $fix_total_amount == null ? $percentage_total_amount : $fix_total_amount  }}</td>



    <td></td>
  </tr>
  <h3>Labour</h3>
   <tr>
    <td>1</td>
    <td> paid service 50% discount offer</td>
    <td></td>
    <td>2710</td>
    <td>1367.98 </td>
    <td>18</td>
    </tr>
</table>

<table  style="font-size:12px; border-spacing: 28px;">
<thead  style="border-top:1px solid black;border-bottom:1px solid black;">
  <tr>
    <th style="text-align:left">GST %</th>
    <th style="text-align:left">Amount</th>
    <th style="text-align:left">Discount</th>
    <th style="text-align:left">Taxable Amt</th>
    <th style="text-align:left">SGST</th>
    <th style="text-align:left">CGST</th>
   
    <th style="text-align:left">Sub Total</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>GST@ 28% on Parts</td>
    <td> 3258.59 </td>
    <td></td>
    <td>3258.59</td>
    <td>456.00</td>
    <td>456.00 </td>
   
    <td>4170.59 </td>
    </tr>
   <tr>
    <td>GST@ 28% on Parts</td>
    <td> 3258.59 </td>
   
    <td>3258.59</td>
    <td>456.00</td>
    <td>456.00 </td>
    <td></td>
    <td>4170.59 </td>
    </tr>
  <tbody>
 <tfoot  style="border-bottom:1px solid black;">
            <tr>
                <th style="text-align:left" colspan="7">Total Parts Amount</th>
                <td style="text-align:right">₹160</td>
            </tr>
        </tfoot>
 <tbody  style="border-bottom:1px solid black;">
  <tr>
    <td>GST@ 28% on Parts</td>
    <td> 3258.59 </td>
    <td></td>
    <td>3258.59</td>
    <td>456.00</td>
    <td>456.00 </td>
    <td></td>
    <td>4170.59 </td>
    
  </tr>
  </tbody>     
</table>

<table>
<thead style="border-bottom:1px solid black;">
<tr>
<th style="width:430px;"></th>
<th style="font-size:13px">Net Bill Amount (Rounded off) : 8015.00</th>
</tr>

</thead>
</table>

<table>
<tbody>
<tr>
<td><tr><p style="font-size:12px;">Amt. in words : Rupees Eight Thousand Fifteen Only </p></tr></td>
</tr>
<tr>
<td style="width:430px;"></td>
<td style="font-size:12px">ALL DISPUTES SUBJECT TO JURISDICTION</td>
</tr>
<tr>
<td style="width:430px;"></td>
<td style="font-size:12px">FOR SHREE RAM AUTOMOBILES</td>
</tr>
<tr>
<td><p style="font-size:13px">Bank : Kotak Mahindra Bank <br>Ac : 4145130332<br>Ac : IFSC : KKBK0005030 <br>IFSC : KKBK00050301</p>

</td>
</tr>
</tbody>
</table>
<table>
<tbody>
<tr>
<td style="width:520px;">
</td>
<td>
<p style="font-size:13px;">Authorised Signatory</p>
</td>
</tr>
</tbody>
</table>
<hr>
<table>
<tbody>
<tr>
<td>
<p>
<spam style="font-size:14px;font-weight:bold;"><u>Remark:-</u></spam>
<spam style="font-size:13px;">suspencion arm,link rod,jr 
bush,rear shocker,frnt or rear rhs wheel 
bearing,rhs engine mounting,ac adjuster noise 
inform to customer</spam>
</p>
</td>
</tr>
</tbody>
</table>

<table>
<tbody>
<tr>
<td style="width:520px;">
</td>
<td>
<p style="font-size:13px;">Customer Signature</p>
</td>
</tr>
</tbody>
</table>

  
</body>
</html>