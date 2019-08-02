<?php  
  include 'config.php';
  if (!isset($SESSION['username'])) {
  	echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Snap It!!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Grenze&display=swap" rel="stylesheet">

  <style type="text/css">
  	*{
  		margin: 0px;
  		padding: 0px;
  	}
  [class*='mt']{
   	display: none;
   }
    body{
  background-color: #34495e;
 }
 #con{
 	background-color: white;
 	border-radius: 5px 5px 5px 5px;
 }
   [class*='mt']{
   	display: none;
   	border-style: solid;
 
   
   	border-radius: 5px 5px 5px 5px
   	
   	border-width: 2px;
   	margin-top: 5px;
   }
    [class*='mt'] p{
    	font-size: 20px;
    	margin-top: 5px;
    }
     [class*='mt'] textarea{
     	    border-radius: 5px 5px 5px 5px;
     		border-style: black;
     		border-width: 1px;
     }
   button{
   	margin-left: 10px;
   }
   h1{
 	font-family: 'Grenze', serif;
 	margin-left: 10px;
 	margin-top: 5px;
 	font-size: 50px;
 }
 p{
 	font-family: 'Grenze', serif;
 	margin-left: 10px;
 	margin-top: 5px;
 	font-size: 38px;
 }
 textarea{
 	resize: none;
 	width: 100%;
 }
 textarea p{
 	font-family: 'Grenze', serif;
 	font-size: 28px;
 }
  </style>
</head>
<body >
<div id="Titlebar">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Never Miss A Moment,Snap It!!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link"  href="Home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userprofile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="Blog.php">Blog</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " href="Search.php">Search For Friends</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
</div>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8" id="con">
		<div class="container">
			<ul class="list-group list-group-flush">
				<?php 
				  // include 'config.php';
				   $username=$_SESSION['username'];
				 //  $username='kiran';
				   $string="";
				   $sql="SELECT * FROM blog";
				   $result=$conn->query($sql);
				   if ($result) {
				   	while ($row=$result->fetch_assoc()) {
				   		$array=explode(",", $row['likes']);
				   		$string=$string."<li class='list-group-item'  id=".$row['id'].">
                             <h1 class='display-4'>".$row['title']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<small>".$row['reg_date']."</small></h1>
                             <h1 class='display-5'>Author:<i>".$row['username']."</h1>
                             <h1 class='display-5'>".$row['description']."</h1>
                         <button onclick='readmore(".$row['id'].")' class='btn btn-primary'>Readmore</button>";

  	 
                         if (in_array($username, $array)) {
				   		  $string=$string."<button onclick='dislikeblog(".$row['id'].")' class='btn btn-primary'>dislike</button>";	
				   		}else{
				   			$string=$string."<button onclick='likeblog(".$row['id'].")' class='btn btn-primary'>like</button>";
				   		}
				   			$string=$string."<button class='btn btn-primary' onclick='comment(".$row['id'].")'>comment</button>
              <div class='mt".$row['id']."'><textarea name='comment' id='ds".$row['id']."'></textarea><button class='btn btn-primary'onclick='postcomment(".$row['id'].",false)'>post</button>";
              $uid=$row['id'];
              $sql1="SELECT * FROM comments WHERE type='images' AND file='$uid'";
              $result1=$conn->query($sql1);
              while ($row1=$result1->fetch_assoc()) {
               $string=$string."<p>".$row1['username'].":<i>".$row1['comments']."</i></p>";
              }	$string=$string."</div></li>";
				   	}
				   
				   	echo $string;
				   }
				?>
			</ul>
		</div>
	</div>
	<div class="col-sm-2"></div>
</div>
</body>
<script type="text/javascript">
	function comment(x){
		y="mt"+x;
       $("."+y).toggle();
	}
	function postcomment(x,z){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById('con').innerHTML+=this.responseText;
				window.open('Blog.php','_self');

			}
		}
		var y=document.getElementById('ds'+x).value;
		http.open("GET",'postcomment.php?id='+x+'&comment='+y+'&type='+z,true);
		http.send();
	}
	function readmore(x){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById('con').innerHTML=this.responseText;
			}
		}
		http.open("GET","readblog.php?id="+x,true);
		http.send();
	}
	function likeblog(x){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById(x).innerHTML=this.responseText;
			}
		}
		http.open("GET","likeblog.php?id="+x,true);
		http.send();
	}
	function dislikeblog(x){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById(x).innerHTML=this.responseText;
			}
		}
		http.open("GET","dislikeblog.php?id="+x,true);
		http.send();
	}
</script>
</html>
