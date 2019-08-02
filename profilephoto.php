<?php 
    if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

  include 'config.php';
   $username=$_SESSION['username'];
   //$username="kiran";
   $sql="SELECT * FROM images WHERE username='$username'";

   $result=$conn->query($sql);

   if ($result) {
     while ($row=$result->fetch_assoc()) {
     	echo "<h2>".$row['caption']."</h2>"."
     	<img class='mx-auto d-block rounded' src=".$row['src']." width=500 height=500>";
     }
   }

 ?>