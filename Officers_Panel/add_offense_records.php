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
      $user_id   = $getData['user_id'];
      $name      = $getData['name'];
      $phone     = $getData['phone'];
      $thana     = $getData['thana'];
    }
  ?>





 <!-- Add Offense Record -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   $success_msg = '';

   if(isset($_POST['submit']))
   {
   		 //Driver Info
   		 $offense_record_code = rand(100000, 999999);
         $first_name          = $_POST['first_name'];
         $last_name           = $_POST['last_name'];
         $contact_number      = $_POST['contact_number'];
         $civil_status        = $_POST['civil_status'];
         $nationality         = $_POST['nationality'];
         $date_of_birth       = $_POST['date_of_birth'];
         $present_address     = $_POST['present_address'];
         $parmanent_address   = $_POST['parmanent_address'];
         $driver_user_name    = $_POST['driver_user_name'];
         $driver_password     = $_POST['driver_password'];

         //License Info
         $license_no   = $_POST['license_no'];
         $license_type = $_POST['license_type'];

         //Ticket Info
         $ticket_no             = $_POST['ticket_no'];
         $offense_name          = $_POST['offense_name'];
         $total_fine            = $_POST['total_fine'];
         $offense_record_status = $_POST['offense_record_status'];

         //Officer Info
         $officer_id                = $_POST['officer_id'];
         $officer_name              = $_POST['officer_name'];
         $officer_contact           = $_POST['officer_contact'];
         $thana_name                = $_POST['thana_name'];
         $offense_record_added_date = $_POST['offense_record_added_date'];
         $offense_record_added_time = $_POST['offense_record_added_time'];
         $remarks                   = $_POST['remarks'];

         $offense_recorded_by = $user_name;

         $sql_1 = "INSERT INTO tb_offense_record(offense_record_code,first_name,last_name,contact_number,civil_status,nationality,date_of_birth,present_address,parmanent_address,driver_user_name,license_no,license_type,ticket_no,offense_name,total_fine,offense_record_status,officer_id,officer_name,officer_contact,thana_name,offense_record_added_date,offense_record_added_time,remarks,offense_recorded_by,entry_time)values('$offense_record_code','$first_name','$last_name','$contact_number','$civil_status','$nationality','$date_of_birth','$present_address','$parmanent_address','$driver_user_name','$license_no','$license_type','$ticket_no','$offense_name','$total_fine','$offense_record_status','$officer_id','$officer_name','$officer_contact','$thana_name','$offense_record_added_date','$offense_record_added_time','$remarks','$offense_recorded_by','$entry_time')";
         $insert_row_1 = $db->insert($sql_1);


         $sql_2 = "INSERT INTO          tb_user(name,email,phone,address,thana,user_name,password,user_type,account_verify_status,entry_time)values('$first_name $last_name','','$contact_number','$parmanent_address','','$driver_user_name','$driver_password','Driver',1,'$current_datetime')";
          $insert_row_2 = $db->insert($sql_2);

         if($insert_row_1 AND $insert_row_2)
         {
           $success_msg = '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="fa fa-check"></i> <strong>Success.</strong> Offense Record details saved.
							</div>';
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }
  ?>



  

  <!-- Offense Record select box data load -->
 <?php
   $user_name    = $_SESSION['user_name'];
   $db           = new Database();
   $sql          = "SELECT * FROM tb_offense";
   $read_offense = $db->select($sql);
  ?>










<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>TrafficOFFENSE  | Offense Records</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

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
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />

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
									<li class="nav-active">
										<a href="add_offense_records.php">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<span>Add Offense Record</span>
										</a>
									</li>
									<li>
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
						<h2>Add Offense Records</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add Offense Records</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- data saved success msg print -->
					<?php echo $success_msg; ?>


					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Add Offense Record</h2>
									</header>
									<div class="panel-body">
										<div class="wizard-progress wizard-progress-lg">
											<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
											<ul class="wizard-steps">
												<li class="active">
													<a href="#w4-account" data-toggle="tab"><span>1</span>Driver Info</a>
												</li>
												<li>
													<a href="#w4-profile" data-toggle="tab"><span>2</span>License Info</a>
												</li>
												<li>
													<a href="#w4-billing" data-toggle="tab"><span>3</span>Offense Info</a>
												</li>
												<li>
													<a href="#w4-confirm" data-toggle="tab"><span>4</span>Officer Info</a>
												</li>
											</ul>
										</div>
						
										<form class="form-horizontal" novalidate="novalidate" method="post" enctype="multipart/form-data" autocomplete="off">
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="first_name">* First Name :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="first_name" id="first_name" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="last_name">* Last Name :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="last_name" id="last_name" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="contact_number">* Contact Number :</label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-phone"></i>
																</span>
																<input id="contact_number" data-plugin-masked-input data-input-mask="99999-999999" id="contact_number" name="contact_number" class="form-control" required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="civil_status">* Civil Status :</label>
														<div class="col-sm-9">
															<select data-plugin-selectTwo class="form-control populate" name="civil_status" id="civil_status" required>
																<option selected>Select one..</option>
																<option>Single</option>
																<option>Married</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="nationality">* Nationality :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="nationality" id="nationality" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="date_of_birth">* DOB :</label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" data-plugin-datepicker class="form-control" name="date_of_birth" required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="present_address">* Present Address :</label>
														<div class="col-sm-9">
															<textarea class="form-control" rows="4" name="present_address" required></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="parmanent_address">* Parmanent Address :</label>
														<div class="col-sm-9">
															<textarea class="form-control" rows="4" name="parmanent_address" required></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="driver_user_name">* Driver User Name :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="driver_user_name" id="driver_user_name" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="driver_password">* Driver Password :</label>
														<div class="col-sm-9">
															<input type="password" class="form-control" name="driver_password" id="driver_password" required>
														</div>
													</div>
												</div>
												<div id="w4-profile" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="license_no">* License No :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="license_no" id="license_no" value="LN-" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="license_type">* License Type :</label>
														<div class="col-sm-9">
															<select data-plugin-selectTwo class="form-control populate" name="license_type" id="license_type" required>
																<option selected>Select one..</option>
																<option>Student</option>
																<option>Professional</option>
																<option>Non-Professional</option>
																<option>PSV</option>
																<option>Instructor</option>
																<option>Don't have license</option>
															</select>
														</div>
													</div>
												</div>
												<div id="w4-billing" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="ticket_no">* Ticket No :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="ticket_no" id="ticket_no" value="TN-" required>
														</div>
													</div>

													<div class="form-group">
														<label class="col-sm-3 control-label" for="offense_name">* Offense Name :</label>
														<div class="col-sm-9">
															<div class="input-group btn-group">
																<span class="input-group-addon">
																	<i class="fa fa-warning"></i>
																</span>
																<select class="form-control" multiple="multiple" name="offense_name" id="offense_name" data-plugin-multiselect id="ms_example4" required>
																	<?php if($read_offense){ $i = 0; ?>
			                            							<?php while($result = $read_offense->fetch_assoc()){ $i = $i + 1; ?>
																		<option><?php echo $result['offense_name']; ?></option>
																	<?php } ?>
										                            <?php }else{ ?>
										                            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
										                               echo $msg; ?>
										                            <?php } ?>
																</select>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="total_fine">* Total Fine :</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="total_fine" id="total_fine" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="offense_record_status">* Offense Record Status :</label>
														<div class="col-sm-9">
															<select data-plugin-selectTwo class="form-control populate" name="offense_record_status" id="offense_record_status" required>
																<option selected>Select one..</option>
																<option>Paid</option>
																<option>Pending</option>
															</select>
														</div>
													</div>
												</div>
												<div id="w4-confirm" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="officer_id">* Officer Id :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="officer_id" id="officer_id" value="<?php echo $user_id; ?>" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="officer_name">* Officer Name :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="officer_name" id="officer_name" value="<?php echo $name; ?>" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="officer_contact">* Contact Number :</label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-phone"></i>
																</span>
																<input id="officer_contact" data-plugin-masked-input data-input-mask="99999-999999" id="officer_contact" name="officer_contact" class="form-control" value="<?php echo $phone; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="thana_name">* Thana :</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="thana_name" id="thana_name" value="<?php echo $thana; ?>" readonly>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="offense_record_added_date">* Offense Record Added On :</label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar"></i>
																</span>
																<input type="text" data-plugin-datepicker class="form-control" id="offense_record_added_date" name="offense_record_added_date" required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="offense_record_added_time">* Offense Record Added Time</label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-clock-o"></i>
																</span>
																<input type="text" data-plugin-timepicker class="form-control" id="offense_record_added_time" name="offense_record_added_time"
																required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label" for="remarks">* Remarks :</label>
														<div class="col-sm-9">
															<textarea class="form-control" rows="4" id="remarks" name="remarks" required></textarea>
														</div>
													</div>

													<div class="text-center">
														<input  type="submit" id="shadow-success" class="btn btn-primary" name="submit" value="Add Record">

														<a href="offense_records.php" type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
													</div>
											
												</div>
											</div>
										</form>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled">
												<a><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<a>Finish</a>
											</li>
											<li class="next">
												<a>Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</section>
							</div>
						</div>
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
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="assets/vendor/fuelux/js/spinner.js"></script>
		<script src="assets/vendor/dropzone/dropzone.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="assets/vendor/codemirror/lib/codemirror.js"></script>
		<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="assets/vendor/codemirror/mode/css/css.js"></script>
		<script src="assets/vendor/summernote/summernote.js"></script>
		<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="assets/vendor/ios7-switch/ios7-switch.js"></script>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.advanced.form.js" /></script>

		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		<!-- Examples -->
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/javascripts/forms/examples.wizard.js"></script>
	</body>
</html>