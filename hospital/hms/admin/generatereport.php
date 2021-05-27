<?php 
ob_start();
 function fetch_data()  
 {  
      $output = '';  
      $con = mysqli_connect("localhost:3399", "root", "", "hms");  
      $vid=$_GET['viewid'];
      $ret=mysqli_query($con,"select bill.*,hospital_charges.Invoice_Number,hospital_charges.Room_Rent,hospital_charges.ICU_services,hospital_charges.Medicine_charges,hospital_charges.Other_Expenses,hospital_charges.Surgical_Appliances,hospital_charges.Patient_Paid_Amount,hospital_charges.Date FROM bill,hospital_charges where bill.PatientEmail=hospital_charges.PatientEmail AND bill.ID='$vid'");
     $cnt=1;

      while($row = mysqli_fetch_array($ret))  
      {       
      $output .= '
       <body>
<table style="width:100%">
<tr>
    
    <td align="right"><b>Date: </b>'.$row['Date'].'</td> 
 </tr>
    <tr>
    <td align="right"><b>Invoice.No: </b>'.$row['Invoice_Number'].'</td> 
  </tr>
 </body>

      <h3 align="right"></h3><br /><br />  
      
  <table id="datatable" border="1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4"  style="background-color:LightGray;"><b>Patient Details</b></th> 
  </tr>
    
    <tr>
    <th scope><b>Patient Name:</b></th>
    <td>'.$row['PatientName'].'</td>
    <th scope><b>Patient Email:</b></th>
    <td>'.$row['PatientEmail'].'</td>
  </tr>
  <tr>
    <th scope><b>Contact:</b></th>
    <td>'.$row['PatientContno'].'</td>
    <th><b>Address:</b></th>
    <td>'.$row['PatientAdd'].'</td>
  </tr>
    <tr>
    <th><b>Gender:</b></th>
    <td>'.$row['PatientGender'].'</td>
    <th><b>Age:</b></th>
    <td>'.$row['PatientAge'].'</td>
  </tr>
  <tr>
    
    <th><b>Medical History:</b></th>
    <td>'.$row['PatientMedhis'].'</td>
     
  </tr>
   <tr align="center">
<td colspan="4" style="font-size:20px;color:red">
 </td></tr>
 
<?php }?>

<h3 align="center"></h3><br /><br />  
</table>

<table id="datatable" border="1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr align="center">
   <th colspan="5"  style="background-color:LightGray;"><b>Medical History</b></th> 
  </tr>
    
  <tr>
    <th WIDTH=10%><b> #</b></th>
<th width=20%><b>BP</b></th>
<th width=20%><b>Weight</b></th>
<th width=20%><b>Blood Sugar</b></th>
<th width=30%><b>Temprature</b></th>


</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td width=10%>'.$cnt.'</td>
 <td width=20%>'.$row['BloodPressure'].'</td>
 <td width=20%>'.$row['Weight'].'</td>
 <td  width=20%>'.$row['BloodSugar'].'</td> 
  <td width=30%>'.$row['Temperature'].'</td>
  
  
</tr>
<body>

<h4 style="color:maroon">DOCTOR PRESCRIPTION:-</h4>

<table style="width:100%">
  <tr>
    <th><b>Doctor ID:</b></th>
    <td>'.$row['Docid'].'</td> 
  </tr>

  <tr>
    <th ><b>Medical Prescription:</b></th>
    <td>'.$row['MedicalPres'].'</td>
  </tr>

  <tr>
   <th><b>Next Visit Date:</b></th>
    <td>'.$row['Next_Visit_Date'].'</td> 
  </tr>


</table>

</body>




 <body>
 <table style="width:100%">
 <h4 style="color:maroon">BILLING HEADS:-</h4> 
  <tr>
    <th><b>Total Room Rent Services:</b></th>
    <td>'.$row['Room_Rent'].'</td> 
  </tr>
  <tr>
    <th><b>Total ICU Services:</b></th>
    <td>'.$row['ICU_services'].'</td> 
  </tr>
  <tr>
    <th><b>Medicines and Drugs:</b></th>
    <td>'.$row['Medicine_charges'].'</td> 
  </tr>
  <tr>
    <th><b>Total of Other Expenses:</b></th>
    <td>'.$row['Other_Expenses'].'</td> 
  </tr>
  <tr>
    <th><b>Surgical Appliances(Blood,...):</b></th>
    <td>'.$row['Surgical_Appliances'].'</td> 
  </tr>

</table>

</body>

<body>

<h1> </h1>
<h3 style="color:maroon">AMOUNT PAID:-               </h3>
<h5 align="right" style="color:maroon">SIGNATURE       </h5>
</body>






<?php $cnt=$cnt+1;} ?>
</table>
                          
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>   
         
                          ';    
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
       
      $pdf->setPrintHeader(true);  
      $pdf->setPrintFooter(true);  
      $pdf->SetFont('helvetica', '', 12);   
 

// set document information

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Team-III');
$pdf->SetTitle('Hospital Report');
$pdf->SetSubject('E-HEALTH CARE SYSTEM');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "E-HEALTH CARE SYSTEM".'', "Developed by 19BCE0202 19BCE2203 19BCI0245 19BCI0195 19BCI0214 19BCE2239", array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">E</span><span style="color:white;">HCS</span>&nbsp;</a>!</h1>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);









      $content .= fetch_data();  
      $content .= '</table>';  
      $pdf->writeHTML($content);  
      ob_end_clean();
      $pdf->Output('sample.pdf','I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>HOSPITAL REPORT</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                  
                     <table id="datatable" border="1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 

              
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post" align="center" >  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Generate Report" />  
                     </form>  
                </div>  
           </div>  


      </body>  
 </html>  