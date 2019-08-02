<?php
 
  include 'config.php';
  if (!isset($SESSION['username'])) {
  	echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

 // include 'config.php';
  if (isset($_GET['id'])) {
  	 $id=$_GET['id'];
  	 //$username='kiran';
  	 $username=$_SESSION['username'];
  	 $sql="DELETE FROM blog WHERE id='$id' AND username='$username'";
  	 if($conn->query($sql)==true){
  	 	echo "<script>alert('Blog Successfully Deleted');</script>";
  	 }
  	 else{
  	 	echo $conn->error;

  	 }

  }
?>