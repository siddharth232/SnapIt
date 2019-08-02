<?php  
  include 'config.php';
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  session_destroy();
  echo "<script>window.open('index.php','_self');</script>";
  ?>

?>