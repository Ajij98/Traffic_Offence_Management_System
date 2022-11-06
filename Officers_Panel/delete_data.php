<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


  <!-- Delete Offense Record Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_GET['offense_record_id']))
    {
      $offense_record_id = $_GET['offense_record_id'];

      $sql = "DELETE FROM tb_offense_record WHERE offense_record_id = $offense_record_id";
      $delete_row = $db->delete($sql);
      if($delete_row)
      {
        ?>
        <script type="text/javascript">
          window.alert("Offense Record details deleted successfully.");
          window.location='offense_record_list.php';
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





