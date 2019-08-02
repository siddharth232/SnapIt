<?php

 
  if (!isset($SESSION['username'])) {
    echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }

  include 'config.php'; 
  $username=$_SESSION['username'];
  //$username='kiran';
  $sql="SELECT * FROM images";
  $result=$conn->query($sql);
  $string="";
  if ($result) {
  	 if ($result->num_rows>0) {
  	 	while($row=$result->fetch_assoc()){
  	 		$array=explode(",",$row['likes']);
  	 		if (in_array($username, $array)) {
  	 		   $string=$string."<div id=".$row['id'].">
              <h2>".$row['username']."</h2>
              <p>".$row['caption']."</p>
              <img class='mx-auto d-block rounded' src=".$row['src']." width=400 height=500>
              <button onclick='dislike(".$row['id'].")' class='btn btn-primary'>Dislike</button>
              <button onclick='comment(".$row['id'].")' class='btn btn-primary'>comment</button>
              <div class='mt".$row['id']."'><textarea name='comment' id='ds".$row['id']."'></textarea><button onclick='postcomment(".$row['id'].",true)' class='btn btn-primary'>post</button>";
              $uid=$row['id'];
              $sql1="SELECT * FROM comments WHERE type='images' AND file='$uid'";
              $result1=$conn->query($sql1);
              while ($row1=$result1->fetch_assoc()) {
               $string=$string."<p>".$row1['username'].":<i>".$row1['comments']."</i></p>";
              }

  	 	$string=$string."</div>";
  	 		}else{
  	 		   $string=$string."<div id=".$row['id'].">
              <h2>".$row['username']."</h2>
              <p>".$row['caption']."</p>
              <img  class='mx-auto d-block rounded' src=".$row['src']." width=500 height=500>
              <button onclick='like(".$row['id'].")' class='btn btn-primary')'>Like</button>
  	 		<button onclick='comment(".$row['id'].")' class='btn btn-primary'>comment</button>
              <div class='mt".$row['id']."'><textarea name='comment' id='ds".$row['id']."'></textarea><button onclick='postcomment(".$row['id'].",true)' class='btn btn-primary'>post</button>";
              $uid=$row['id'];
              $sql1="SELECT * FROM comments WHERE type='images' AND file='$uid'";
              $result1=$conn->query($sql1);
              while ($row1=$result1->fetch_assoc()) {
               $string=$string."<p>".$row1['username'].":<i>".$row1['comments']."</i></p>";
              }

      $string=$string."</div>";
  	 		}
  	 		
  	 	}
  	 	echo $string;
  	 }
  }
 ?>
