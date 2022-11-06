<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



  <!--Offense Record verify section-->
  <?php
   $db = new Database();

     if(isset($_GET['offense_record_id']))
     {
       $offense_record_id = $_GET['offense_record_id'];

       $sql = "SELECT record_verify_status FROM tb_offense_record WHERE record_verify_status = 0 AND offense_record_id = '$offense_record_id' LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_offense_record SET record_verify_status = 1 WHERE offense_record_id = '$offense_record_id' LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Offense Record Verified.");
             window.location='offense_record_list.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
