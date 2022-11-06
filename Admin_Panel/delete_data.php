<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


  <!-- Delete Area Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['area_id']))
    {
      $area_id = $_GET['area_id'];

      $sql = "DELETE FROM tb_area WHERE area_id = $area_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Area details deleted successfully.");
          window.location='add_area.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Thana -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['thana_id']))
    {
      $thana_id = $_GET['thana_id'];

      $sql = "DELETE FROM tb_thana WHERE thana_id = $thana_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Thana details deleted successfully.");
          window.location='thana_list.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



    <!-- Delete Police Offier -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['police_id']))
    {
      $police_id = $_GET['police_id'];

      $sql = "DELETE FROM tb_user WHERE user_id = $police_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Police details deleted successfully.");
          window.location='registered_police.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>





    <!-- Delete Traffic Offense -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['offense_id']))
    {
      $offense_id = $_GET['offense_id'];

      $sql = "DELETE FROM tb_offense WHERE offense_id = $offense_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Offense details deleted successfully.");
          window.location='offense_list.php';
        </script>
        <?php
      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
        echo $msg;
        return false;
      }
    }
    ?>



