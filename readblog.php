<?php 


  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

  include 'config.php';
  if(isset($_GET['id'])){
  $id=$_GET['id'];
  $string="";
  $sql="SELECT * FROM blog WHERE id='$id'";  
  $result=$conn->query($sql);
  if ($result) {
  	$row=$result->fetch_assoc();
    $string=$string."<h1>".$row['title']."</h1><h2>".$row['username']."</h2><h3>".$row['reg_date']."</h3><h4>".$row['description']."</h4>";
    if ($row['src']!="") {
    	$string=$string."<img class='mx-auto d-block rounded' src=".$row['src']." width=500 height=500>";
    }
    $string=$string."<p>".$row['content']."</p>";
    echo $string;
    echo $conn->error;
  }
  }
  

?>