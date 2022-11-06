<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Select Thana Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['thana_id']))
   {

     $thana_id = $_GET['thana_id'];

     $sql     = "SELECT * FROM tb_thana WHERE thana_id = $thana_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
         $thana_area       = $getData['thana_area'];
         $thana_name       = $getData['thana_name'];
         $thana_contact    = $getData['thana_contact'];
         $thana_address_details = $getData['thana_address_details'];
         $area_gmap_link   = $getData['area_gmap_link'];
         $thana_added_on   = $getData['thana_added_on'];
         $thana_added_time = $getData['thana_added_time'];
     }
   }
  ?>



<!--Update Thana Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    $success_msg = '';

   if(isset($_POST['update']))
   {
         $thana_id = $_GET['thana_id'];

         $thana_area       = $_POST['thana_area'];
         $thana_name       = $_POST['thana_name'];
         $thana_contact    = $_POST['thana_contact'];
         $thana_address_details = $_POST['thana_address_details'];
         $area_gmap_link   = $_POST['area_gmap_link'];
         $thana_added_on   = $_POST['thana_added_on'];
         $thana_added_time = $_POST['thana_added_time'];

         $sql = "UPDATE tb_thana SET thana_area='$thana_area',thana_name='$thana_name',thana_contact='$thana_contact',thana_address_details='$thana_address_details',area_gmap_link='$area_gmap_link',thana_added_on='$thana_added_on',thana_added_time='$thana_added_time' WHERE thana_id = $thana_id";

         $update_row = $db->update($sql);

         if($update_row)
         {
	         $success_msg = '<div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="fa fa-check"></i> <strong>Updated.</strong> Thana details updated.
							</div>';
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
           echo $msg;
           return false;
         }
   }
   ?>




 <!-- Area select box data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db        = new Database();
   $sql       = "SELECT * FROM tb_area WHERE area_name != '$thana_area'";
   $read_area = $db->select($sql);
  ?>












<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>TrafficOFFENSE  - Update Thana Details</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

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
								<span class="role">Administration</span>
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
										<a href="add_area.php">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<span>Add Area</span>
										</a>
									</li>
									<li>
										<a href="add_thana.php">
											<i class="fa fa-plus" aria-hidden="true"></i>
											<span>Add Thana</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="thana_list.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Thana List</span>
										</a>
									</li>
									<li>
										<a href="registered_police.php">
											<i class="fa fa-user-secret" aria-hidden="true"></i>
											<span>Registered Police</span>
										</a>
									</li>
									<li>
										<a href="registered_traffic_police.php">
											<i class="fa fa-male" aria-hidden="true"></i>
											<span>Registered Traffic Police</span>
										</a>
									</li>
									<li>
										<a href="add_offense.php">
											<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
											<span>Add Offense</span>
										</a>
									</li>
									<li>
										<a href="offense_list.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Offense List</span>
										</a>
									</li>
									<li>
										<a href="offense_record_list.php">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
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
						<h2>Update Thana Details</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Update Thana Details</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- data update success msg print -->
					<?php echo $success_msg; ?>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title">Thana Details</h2>
									</header>
									<div class="panel-body">

										<form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">							

											<div class="form-group">
												<label class="col-md-3 control-label">* Area</label>
												<div class="col-md-6">
													<div class="input-group btn-group">
													<span class="input-group-addon">
															<i class="fa fa-map-marker"></i>
													</span>
													<select data-plugin-selectTwo class="form-control populate" name="thana_area" required>
															<option selected><?php echo $thana_area; ?></option>
															<?php if($read_area){ $i = 0; ?>
	                            							<?php while($result = $read_area->fetch_assoc()){ $i = $i + 1; ?>
																<option><?php echo $result['area_name']; ?></option>
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
													<label class="col-md-3 control-label" for="Thana">* Thana Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="thana_name" placeholder="Enter thana name" value="<?php echo $thana_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="thana_contact">* Thana Contact</label>
												<div class="col-md-6 control-label">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-phone"></i>
														</span>
														<input id="phone" data-plugin-masked-input data-input-mask="99999-999999" name="thana_contact" placeholder="Enter thana contact" value="<?php echo $thana_contact; ?>" class="form-control">
													</div>
												</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="address_details">* Thana Address Details :</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="4" name="thana_address_details" placeholder="Type thana address details here.." required><?php echo $thana_address_details; ?></textarea>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="area_gmap_link">* Google Map Link :</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="4" name="area_gmap_link" placeholder="Put thana google map link here.." required><?php echo $area_gmap_link; ?></textarea>
													</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label">* Thana Added On :</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker class="form-control" name="thana_added_on" value="<?php echo $thana_added_on; ?>" required>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label">* Thana Added Time</label>
												<div class="col-md-6">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" data-plugin-timepicker class="form-control" name="thana_added_time" value="<?php echo $thana_added_time; ?>"
														required>
													</div>
												</div>
											</div>

											<div class="text-center">
												<input  type="submit" class="btn btn-warning" name="update" value="Save Changes">

												<a href="update_thana_details.php?thana_id=<?php echo $thana_id; ?>" type="button" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
											</div>

										</form>

									</div>
								</section>
							</div>
						</div>

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

	</body>
</html>
