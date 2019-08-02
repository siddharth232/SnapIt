<?php 

   if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

  include 'config.php';
 // $username="kiran";
  $username=$_SESSION['username'];
  $sql="SELECT * FROM accinfo WHERE username='$username'";
  $result=$conn->query($sql);
  $sql1="SELECT * FROM images WHERE username='$username'";
  $result1=$conn->query($sql1);
  $sql2="SELECT * FROM blog WHERE username='$username'";
  $result2=$conn->query($sql2);
  echo $conn->error;
  if ($result) {
  	$row=$result->fetch_assoc();
  	echo '<h1>'.$username.'</h1><p>'.$row['bio'].'</p>
      <ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
      <a class="nav-link active"  href="Profile.php">Photos <span class="badge badge-primary badge-pill">'.$result1->num_rows.'</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="profileBlog.php">Blog<span class="badge badge-primary badge-pill">'.$result2->num_rows.'</span></a>
    </li>
  </ul>';
  }

 ?>