<?php  
  include 'config.php';
  if (!isset($SESSION['username'])) {
  	echo "<script>alert('AcessDenied');window.open('Index.php','_self');</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Snap A Moment</title>
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
   	border-style: solid;
 
   
   	border-radius: 5px 5px 5px 5px

   	border-width: 1px;
   	margin-top: 5px;
   }
    [class*='mt'] p{
    	font-size: 20px;
    	margin-top: 5px;
    }
     [class*='mt'] textarea{
     	
     		border-style: black;
     		border-width: 1px;
     		border-radius: 5px 5px 5px 5px;
     }
    body{
  background-color: #34495e;
 }
 .row{
 	margin-top: 20px;
 }
 #con{
 	background-color: white;
 	border-radius: 5px 5px 5px 5px;
 }
 h2{
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
<body onload="display()">
<div id="Titlebar">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Never Miss A Moment,Snap It!!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active"  href="Home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userprofile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="Blog.php">Blog</a>
    </li>
     <li class="nav-item">
      <a class="nav-link"  href="Search.php">Search For Friends</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
</div>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8" id="con"></div>
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
				window.open('Home.php','_self');

			}
		}
		var y=document.getElementById('ds'+x).value;
		http.open("GET",'postcomment.php?id='+x+'&comment='+y+'&type='+z,true);
		http.send();
	}
	function display(){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById('con').innerHTML=this.responseText;
			} }
			http.open("GET","display.php",true);
			http.send();
		}
		function like(x){
			var http=new XMLHttpRequest();
			http.onreadystatechange=function(){
				if (this.readyState==4&&this.status==200) {
					document.getElementById(x).innerHTML="";
					document.getElementById(x).innerHTML+=this.responseText;
				}
			}
			http.open("GET","like.php?id="+x,true);
			http.send();
		}
		function dislike(x){
			var http=new XMLHttpRequest();
				http.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200){
		
					document.getElementById(x).innerHTML="";
					document.getElementById(x).innerHTML+=this.responseText;
				}
			}
			http.open("GET","dislike.php?id="+x,true);
			http.send();
		}
</script>
</html>
