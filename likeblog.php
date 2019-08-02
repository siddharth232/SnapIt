<?php
  
  include 'config.php';
  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

    if(isset($_GET['id'])){
    	$id=$_GET['id'];
    	include 'config.php';
    	$username=$_SESSION['username'];
      // $username='kiran'; 
       $sql="SELECT * FROM blog WHERE id=$id";
       $result=$conn->query($sql);
       if ($result) {
       	  $row=$result->fetch_assoc();
       	  $array=explode(",", $row['likes']);
       	  array_push($array, $username);
       	  $string=implode(",", $array);
       	  $sql="UPDATE blog SET likes=$string WHERE id='$id'";
       	  $conn->query($sql);
       	  $sql="SELECT * FROM blog WHERE id='$id'";
       	  $string="";
       	  $result=$conn->query($sql);
       	  if ($result) {
       	  	$row=$result->fetch_assoc();
       	  	$string=$string."
                             <h1 class='display-4'>".$row['title']."<small>".$row['reg_date']."</small></h1>
                             <h1 class='display-5'>Author:<i>".$row['username']."</h1>
                             <h1 class='display-5'>".$row['description']."</h1>
                         <button onclick='readmore(".$row['id'].")' class='btn btn-primary'>Readmore</button>";
                          $string=$string."<button onclick='dislikeblog(".$row['id'].")' class='btn btn-primary'>dislike</button>";	
       	  }
       }echo $string;
    }

?>