<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Select Offense Record Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['offense_record_id']))
   {

     $offense_record_id = $_GET['offense_record_id'];

     $sql     = "SELECT * FROM tb_offense_record WHERE offense_record_id = $offense_record_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {	 

     	 $offense_record_id = $getData['offense_record_id'];

         //Driver Info
         $first_name          = $getData['first_name'];
         $last_name           = $getData['last_name'];
         $contact_number      = $getData['contact_number'];
         $civil_status        = $getData['civil_status'];
         $nationality         = $getData['nationality'];
         $date_of_birth       = $getData['date_of_birth'];
         $present_address     = $getData['present_address'];
         $parmanent_address   = $getData['parmanent_address'];

         //License Info
         $license_no   = $getData['license_no'];
         $license_type = $getData['license_type'];

         //Ticket Info
         $ticket_no             = $getData['ticket_no'];
         $offense_name          = $getData['offense_name'];
         $total_fine            = $getData['total_fine'];
         $offense_record_status = $getData['offense_record_status'];

         //Officer Info
         $officer_id                = $getData['officer_id'];
         $officer_name              = $getData['officer_name'];
         $officer_contact           = $getData['officer_contact'];
         $thana_name                = $getData['thana_name'];
         $offense_record_added_date = $getData['offense_record_added_date'];
         $offense_record_added_time = $getData['offense_record_added_time'];
         $remarks                   = $getData['remarks'];
   }
}
  ?>








<html>
	<head>
		<title>TrafficOFFENSE - Print Offense Record File</title>
		<!-- Web Fonts  -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Favicon -->
	    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/nav_icon.PNG">
	    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/nav_icon.PNG">
	    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/nav_icon.PNG">
	    <link rel="manifest" href="assets/images/icons/site.html">
	    <link rel="mask-icon" href="assets/img/nav_icon.PNG" color="#666666">
	    <link rel="shortcut icon" href="assets/img/nav_icon.PNG">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />
	</head>
	<body>
		<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">TICKET NO</h2>
											<h4 class="h4 m-none text-dark text-bold"><?php echo $ticket_no; ?></h4>
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												TrafficOffense.gov.bd
												<br/>
												<i class="fa fa-map-marker"></i> Agrabad, Chattogram, Bangladesh
												<br/>
												<i class="fa fa-phone"></i> 16222
												<br/>
												<i class="fa fa-envelope"></i> trafficoffense.bd@gmail.com
											</address>
											<div class="ib">
												<img src="assets/img/nav_icon.PNG" height="35" alt="nav_logo" />
												<span style="font-family: 'Quantico', sans-serif; font-size: 18px; color: #0088CC;"><strong>Traffic<span class="text-warning" style="font-size: 20px;">OFFENSE</span></strong></span>
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">Driver Info</p>
												<address>
													License No: <span class="text-dark"><?php echo $license_no; ?></span>
													<br/>
													License Type: <span class="text-dark"><?php echo $license_type; ?></span>
													<br/>
													Driver Name: <span class="text-dark"><?php echo $first_name; ?> <?php echo $last_name; ?></span>
													<br/>
													Contact Number: <span class="text-dark"><?php echo $contact_number; ?></span>
													<br/>
													DOB: <span class="text-dark"><?php echo date("F j, Y", strtotime($date_of_birth)) ?></span>
													<br/>
													Nationality: <span class="text-dark"><?php echo $nationality; ?></span>
													<br/>
													Present Address: <span class="text-dark"><?php echo $present_address; ?></span>
													<br/>
													Parmanent Address: <span class="text-dark"><?php echo $parmanent_address; ?></span>

												</address>
											</div>
										</div>

										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">Officer Info</p>
												<address>
													Officer Id: <span class="text-dark"><?php echo $officer_id; ?></span>
													<br/>
													Officer Name: <span class="text-dark"><?php echo $officer_name; ?></span>
													<br/>
													Contact Number: <span class="text-dark"><?php echo $officer_contact; ?></span>
													<br/>
													Thana: <span class="text-dark"><?php echo $thana_name; ?></span>
													<br/>
													Remarks: <span class="text-warning">[ <?php echo $remarks; ?> ]</span>
													<br>

													<span class="mb-none">
														<span class="text-dark">Record Date:</span>
														<span class="value"><?php echo date("F j, Y", strtotime($offense_record_added_date)) ?></span>
													</span>
													<br>
													<span class="mb-none">
														<span class="text-dark">Record Time:</span>
														<span class="value"><?php echo $offense_record_added_time; ?></span>
													</span>
													<br>
													<span class="mb-none" >
														<span class="text-dark">Offense Record Status:</span>
														<span class="value text-center text-dark" style="border: 2px solid #ED9C28;"><strong><?php echo $offense_record_status; ?></strong></span>
													</span>
												</address>
											</div>
										</div>
										
									</div>
								</div>
							
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">Record Id</th>
												<th id="cell-item"   class="text-semibold">Offense Name</th>
												<th id="cell-total"  class="text-center text-semibold">Total Fine</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $offense_record_id; ?></td>
												<td class="text-semibold text-dark"><?php echo $offense_name; ?></td>
												<td class="text-center"><?php echo $total_fine.' Tk.'; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left">1000 Tk.</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

		<script>
			window.print();
		</script>
	</body>
</html>