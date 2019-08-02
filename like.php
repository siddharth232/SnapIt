<?php
  
  include 'config.php';
  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }
 
   if (isset($_GET['id'])) {
   	 $id=$_GET['id'];
   	 $username=$_SESSION['username']
    // $username='kiran';
     $sql="SELECT * FROM images WHERE id='$id'";
     $result=$conn->query($sql);
     if ($result) {
     	$row=$result->fetch_assoc();
     	$array=explode(",",$row['likes']);
     	array_push($array, $username);
     	$string=implode(",",$array);
     	$sql="UPDATE images SET likes='$string' WHERE id='$id'";
     	$conn->query($sql);
     	 $sql="SELECT * FROM images WHERE id='$id'";
  $result=$conn->query($sql);
  if ($result) {
  	 
  	 $row=$result->fetch_assoc();
  	 
  	 			echo "
              <h2>".$row['username']."</h2>
              <p>".$row['caption']."</p>
              <img src=".$row['src']." width=400 height=600>
              <button onclick='dislike(".$row['id'].")'>DisLike</button>
  	 		";
  	 		
  	 		
  	 	
  	 }
  }
     }

   
 ?>