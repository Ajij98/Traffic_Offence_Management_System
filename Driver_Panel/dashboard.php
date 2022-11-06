<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>




 <!-- Offense Record table data load -->
 <?php
   $user_name  = $_SESSION['user_name'];
   $db         = new Database();
   $sql        = "SELECT * FROM tb_offense_record WHERE driver_user_name = '$user_name'";
   $read_offense_record = $db->select($sql);
  ?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TrafficOFFENSE  | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/nav_icon.PNG" rel="icon">
  <link href="assets/img/nav_icon.PNG" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fontawsome -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Google Font CDN -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #FFC107;">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center" style="color: white;">
        <i class="fa fa-envelope"></i> <a href="mailto:trana@example.com" style="color: white;">traffioffense.ctg@gmail.com</a>
        <i class="fa fa-phone"></i> +880 1918-839101
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#about" style="color: white;">| About Us |</a> <a href="contact.php" style="color: white;">| Contact |</a> <a onclick="return confirm('Sure to logout?')" href="logout.php" style="color: white;">| Log out |</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <a href="index.php"><img src="assets/img/nav_icon.PNG" height="35" alt="nav_logo" /> <span style="font-family: 'Quantico', sans-serif; font-size: 18px; color: #0088CC;"><strong>Traffic<span class="text-warning" style="font-size: 20px;">OFFENSE</span></strong></span></a>
      </h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">HOME</a></li>
          <li><a class="nav-link scrollto" href="#about">ABOUT US</a></li>
          <li><a class="nav-link scrollto" href="contact.php">CONTACT</a></li>
          <li><a class="nav-link scrollto active" href="dashboard.php">MY OFFENSE RECORDS</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="dashboard.php" class="btn btn-outline-primary btn-sm px-3" style="border-radius: 20px; margin-left: 20px;"><span class="d-none d-md-inline"></span>My Account</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Departments Section ======= -->
    <section id="dashboard" class="dashboard" style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Dashboard</h2>
          <p><strong>HELLO! <?php echo $_SESSION['user_name']; ?>, Your offense records has been given below.</strong></p>
        </div>

        <table class="table table-bordered">
          <thead style="background-color: #FABF0C; color: white;">
            <tr>
              <th>Offense Record Id</th>
              <td>Ticket No.</td>
              <td>License No</td>
              <td>License Type</td>
              <td>Driver Name</td>
              <td>Offense</td>
              <td>Total Fine</td>
              <td>Officer Name</td>
              <td>Officer Contact</td>
              <td>Thana</td>
              <td>Remarks</td>
              <td>Offense Recorded On</td>
            </tr>
          </thead>
          <tbody>

            <?php if($read_offense_record){ $i = 0; ?>
            <?php while($result = $read_offense_record->fetch_assoc()){ $i = $i + 1; ?>
            <tr>
              <td class="text-primary"><?php echo '[ORID-'.$result['offense_record_id'].']'; ?></td>
              <td><?php echo $result['ticket_no']; ?></td>
              <td><?php echo $result['license_no']; ?></td>
              <td><?php echo $result['license_type']; ?></td>
              <td><?php echo $result['first_name']; ?> <?php echo $result['last_name']; ?></td>
              <td class="text-danger"><strong><?php echo $result['offense_name']; ?></strong></td>
              <td><?php echo $result['total_fine'].' Tk.'; ?></td>
              <td><?php echo $result['officer_name']; ?></td>
              <td><?php echo $result['officer_contact']; ?></td>
              <td><?php echo $result['thana_name']; ?></td>
              <td class="text-warning">[ <?php echo $result['remarks']; ?> ]</td>
              <td><?php echo date("F j, Y", strtotime($result['offense_record_added_date'])) ?> | <?php echo $result['offense_record_added_time']; ?></td>
            </tr>
            <?php } ?>
            <?php }else{ ?>
            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                echo $msg; ?>
            <?php } ?>

          </tbody>
        </table>

      </div>
    </section><!-- End Departments Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h1 class="logo me-auto">
              <a href="index.php"><img src="assets/img/nav_icon.PNG" height="35" alt="nav_logo" /> <span style="font-family: 'Quantico', sans-serif; font-size: 18px; color: #0088CC;"><strong>Traffic<span class="text-warning" style="font-size: 20px;">OFFENSE</span></strong></span></a>
            </h1>
            <p>
              Chattogram, Bangladesh <br><br>
              <strong><i class="fa fa-phone fa-fw"></i></strong> +880 1918-839101<br>
              <strong><i class="fa fa-envelope fa-fw"></i></strong> trafficoffense.ctg@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="dashboard.php">My Offense Records</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Account Setting</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="dashboard.php">My Account</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Setting</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Support</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          <?php echo date("Y"); ?> &copy; Copyright <strong><span>PCIU</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Developed by <a href="#">Tazni</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>