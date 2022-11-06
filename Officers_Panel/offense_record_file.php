<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>





 <!-- Select UserType -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');
   
   $sql = "SELECT * FROM tb_user WHERE user_name = '$user_name'";

   $result  = $db->link->query($sql) or die($this->link->error.__LINE__);

    while($getData = $result->fetch_assoc())
    {
      $user_type = $getData['user_type'];
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












<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>TrafficOFFENSE  - Offense Record File</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Favicon -->
	    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/nav_icon.PNG">
	    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/nav_icon.PNG">
	    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/nav_icon.PNG">
	    <link rel="manifest" href="assets/images/icons/site.html">
	    <link rel="mask-icon" href="assets/img/nav_icon.PNG" color="#666666">
	    <link rel="shortcut icon" href="assets/img/nav_icon.PNG">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

		<!-- Fontawsome -->
	    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

		<!-- Google Font CDN -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="index.php" class="logo" style="text-decoration: none;">
						<img src="assets/img/nav_icon.PNG" height="35" alt="nav_logo" />
						<span style="font-family: 'Quantico', sans-serif; font-size: 18px; color: #0088CC;"><strong>Traffic<span class="text-warning" style="font-size: 20px;">OFFENSE</span></strong></span>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>

					<span class="separator"></span>

					<ul class="notifications">
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<span class="badge">4</span>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="pull-right label label-default">3</span>
									Alerts
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-thumbs-down bg-danger"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-lock bg-warning"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">15 minutes ago</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-signal bg-success"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">10/10/2014</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<div class="profile-info" data-lock-name="" data-lock-email="">
								<span class="name"><?php echo $_SESSION['user_name']; ?></span>
								<span class="role"><?php echo $user_type; ?></span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="user_profile.php"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" onclick="return confirm('Sure to logout?')" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title" style="color: white;">
							MAIN MENU
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="index.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="user_profile.php">
											<i class="fa fa-user-circle-o" aria-hidden="true"></i>
											<span>My Account</span>
										</a>
									</li>
									<li>
										<a href="thana_list.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Thana List</span>
										</a>
									</li>
									<li>
										<a href="offense_list.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Offense List</span>
										</a>
									</li>
									<li>
										<a href="add_offense_records.php">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<span>Add Offense Record</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="offense_record_list.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Offense Record List</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cogs" aria-hidden="true"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-info-circle" aria-hidden="true"></i>
											<span>About Us</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-power-off" aria-hidden="true"></i>
											<span>Logout</span>
										</a>
									</li>

								</ul>
							</nav>

						</div>

					</div>

				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Offense Record File</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Offense Record File</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<section class="panel">
						<div class="panel-body">
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
										<div class="col-md-4">
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

										<div class="col-md-4">
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
												</address>
											</div>
										</div>
										<div class="col-md-4">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Record Date:</span>
													<span class="value"><?php echo date("F j, Y", strtotime($offense_record_added_date)) ?></span>
												</p>
												<p class="mb-none">
													<span class="text-dark">Record Time:</span>
													<span class="value"><?php echo $offense_record_added_time; ?></span>
												</p>
												<p class="mb-none" >
													<span class="text-dark">Offense Record Status:</span>
													<span class="value text-center text-dark" style="border: 2px solid #ED9C28;"><strong><?php echo $offense_record_status; ?></strong></span>
												</p>
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
														<td class="text-left"><?php echo $total_fine.' Tk.'; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">
								<a href="offense_record_file_print.php?offense_record_id=<?php echo $offense_record_id; ?>" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>