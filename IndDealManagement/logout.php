<?php
  // *** Logout the current user.
   $logoutGoTo = "../index.php";
   if (!isset($_SESSION)) {
   session_start();
   }
   unset($_SESSION["LoginStatus"]);
   unset($_SESSION["CustId"]);
   unset($_SESSION["UserName"]);
   unset($_SESSION["UserEmailId"]);
   //unset($_SESSION["TotalCartItems"]);
   //unset($_SESSION['TotalCartValue']);
   echo 'You have being logged out successfully.';
   if ($logoutGoTo != "") { 
   header("Refresh: 2; URL = $logoutGoTo");
   exit;
   }
  
?>
