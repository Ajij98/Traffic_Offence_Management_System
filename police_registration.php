<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--Police/Traffic Police registration section-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $email     = $_POST['email'];
          $phone     = $_POST['phone'];
          $nid       = $_POST['nid'];
          $address   = $_POST['address'];
          $thana     = $_POST['thana'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];
          $user_type = $_POST['user_type'];

          $sql = "INSERT INTO          tb_user(name,email,phone,nid,address,thana,user_name,password,user_type,entry_time)values('$name','$email','$phone','$nid','$address','$thana','$user_name','$password','$user_type','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            ?>

           <script type="text/javascript">
             window.alert("Successfully Registered.");
             window.location='login.php';
           </script>

           <?php

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error !</strong> Something went wrong !</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! This email already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! This username already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_password'])
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! Password and Confirm password should match.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
 ?>










<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>TrafficOFFENSE  | Police/Traffic Police SIGN UP</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Favicons -->
	    <link href="assets/img/nav_icon.PNG" rel="icon">
	    <link href="assets/img/nav_icon.PNG" rel="apple-touch-icon">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="login_registration_assets/assets/vendor/modernizr/modernizr.js"></script>

		<!-- Fontawsome -->
    	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    	<!-- Google Font CDN -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="index.php" class="btn logo pull-left mb-0" style="background-color: white;">
					<img src="assets/img/nav_icon.PNG" height="35" alt="nav_logo" /> <span style="font-family: 'Quantico', sans-serif; font-size: 18px; color: #0088CC;"><strong>Traffic<span class="text-warning" style="font-size: 20px;">OFFENSE</span></strong></span>
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group mb-lg">
								<label>Name</label>
								<input name="name" type="text" class="form-control" required/>
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Address</label>
								<input name="email" type="email" class="form-control" required/>
							</div>

							<div class="form-group mb-lg">
								<label>Phone</label>
								<input name="phone" type="number" class="form-control" required/>
							</div>

							<div class="form-group mb-lg">
								<label>NID</label>
								<input name="nid" type="text" class="form-control" required/>
							</div>

							<div class="form-group mb-lg">
								<label>Address</label>
								<textarea rows="3" name="address" class="form-control" required></textarea>
							</div>

							<div class="form-group">
			  					<label>Thana</label>
			  					<select class="form-control" id="thana" name="thana" required>
			  						<option selected>Choose Thana..</option>
			  						<option>Chawkbazar Thana</option>
			  						<option>Khulshi Thana</option>
			  						<option>Panchlaish Thana</option>
			  					</select>
			  				</div>

							<div class="form-group mb-lg">
								<label>User Name</label>
								<input name="user_name" type="text" class="form-control" required/>
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input name="password" type="password" class="form-control" required/>
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Password Confirmation</label>
										<input name="confirm_password" type="password" class="form-control" required />
									</div>
								</div>
							</div>

							<div class="form-group">
			  					<label>User Type</label>
			  					<select class="form-control" id="user_type" name="user_type" required>
			  						<option selected>Choose...</option>
			  						<option>Police Officer</option>
			  						<option>Traffic Police</option>
			  					</select>
			  				</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox" required/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<input type="submit" class="btn btn-primary" name="submit" value="Sign Up" required>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							

							<p class="text-center">Already have an account? <a href="login.php">Sign In</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo date("Y"); ?>. All rights reserved to <a href="index.php">TrafficOFFENSE</a>.</p>

			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="login_registration_assets/assets/vendor/jquery/jquery.js"></script>
		<script src="login_registration_assets/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="login_registration_assets/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="login_registration_assets/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="login_registration_assets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="login_registration_assets/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="login_registration_assets/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="login_registration_assets/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="login_registration_assets/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="login_registration_assets/assets/javascripts/theme.init.js"></script>

	</body>
</html>