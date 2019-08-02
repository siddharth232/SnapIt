<?php 

//  include 'config.php';
  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

  include 'config.php';
  $username=$_SESSION['username'];
 // $username='kiran';
  $string="<form action='Profile.php' method='post'><select name='name' class='custom-select mb-3'>";
  $sql="SELECT * FROM images WHERE username='$username'";
  $result=$conn->query($sql);
  if($result){
    while ($row=$result->fetch_assoc()) {
    	$file=substr($row['src'],13);
    	$string=$string."<option value=".$row['id'].">".$file."</option>";

    }
  }
  $string=$string."</select><button type='submit' class='btn btn-primary' name='delete' >Delete</button></form>"; 
  echo $string;
?>