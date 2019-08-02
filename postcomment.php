<?php

  include 'config.php';
  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }
  if (isset($_GET['id'])) {
  	 $id=$_GET['id'];
  	 $username=$SESSION['username'];
  	 //$username='Kiran';
  	 $comment=$_GET['comment'];
  	 if ($_GET['type']==true) {
  	 	$type='images';
  	 }else{
  	 	$type='blog';
  	 }
  	 $sql="INSERT INTO comments(username,comments,type,file) VALUES('$username','$comment','$type','$id')";
  	 if($conn->query($sql)==true){
  	 	echo "";
  	 }

  }
 ?>