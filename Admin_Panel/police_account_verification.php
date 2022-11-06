<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



  <!--Police Account verify section-->
  <?php
   $db = new Database();

     if(isset($_GET['user_id']))
     {
       $user_id = $_GET['user_id'];

       $sql = "SELECT account_verify_status FROM tb_user WHERE account_verify_status = 0 AND user_id = '$user_id' LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_user SET account_verify_status = 1 WHERE user_id = '$user_id' LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Account Verified.");
             window.location='registered_police.php';

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
