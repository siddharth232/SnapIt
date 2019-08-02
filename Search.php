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
  	input{
  		margin-top: 20px;

  	}
  	button{
  		margin-top: 10px;
  	}
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
 #content{
 	overflow-x: auto;
 }
 #con{
 	background-color: white;
 	border-radius: 5px 5px 5px 5px;

 }
 h1{
 	font-family: 'Grenze', serif;
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
<body >
<div id="Titlebar">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Never Miss A Moment,Snap It!!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link "  href="Home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userprofile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="Blog.php">Blog</a>
    </li>
     <li class="nav-item">
      <a class="nav-link active"  href="Search.php">Search For Friends</a>
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
		<div class="container-fluid">
			<div class="form-group">
	 <form method="post" action="Search.php">
     <input type="text" class="form-control" name="fusername" placeholder="FriendsUsername">
     <button class="btn btn-primary" name="search">Search</button></form>
</div>
   <div class="container-fluid" id="content">
   	  <?php
           if (isset($_POST['search'])) {
           	 $string="";
           	 $fname=$_POST['fusername'];
           	 $sql="SELECT * FROM images WHERE username='$fname'";
           	 $result=$conn->query($sql);
           	 $sql1="SELECT * FROM blog WHERE username='$fname'";
           	 $result1=$conn->query($sql1);
           	 if ($result) {
 					if ($result1->num_rows>0) {
           	 	 echo "<h1 class='display-3'>Images:</h1>";
           	 	 while ($row=$result->fetch_assoc()) {
           	 	   echo " <h2>".$row['username']."</h2>
              <p>".$row['caption']."</p>
              <img class='mx-auto d-block rounded' src=".$row['src']." width=500 height=500>";
           	 	 }
           	 	 echo "<h1 class='display-3'>Blogs:</h1>";
           	 	 while ($row=$result1->fetch_assoc()) {
           	 	 	$string=$string."<li class='list-group-item'  id=".$row['id'].">
                             <h1 class='display-4'>".$row['title']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<small>".$row['reg_date']."</small></h1>
                             <h1 class='display-5'>Author:<i>".$row['username']."</h1>
                             <h1 class='display-5'>".$row['description']."</h1>
                         <button onclick='readmore(".$row['id'].")' class='btn btn-primary'>Readmore</button>";
                        
           	 	 }
           	 	 echo $string;
           	 }else{
           	 	echo "<script>alert('Invalid Username')</script>";
           	 }
           	 }
          	 
         
           }
   	  ?>
   </div>
		</div>
	</div>
	<div class="col-sm-2"></div>
</div>
</body>
<script type="text/javascript">
	
	function readmore(x){
		var http=new XMLHttpRequest();
		http.onreadystatechange=function(){
			if (this.readyState==4&&this.status==200) {
				document.getElementById('content').innerHTML=this.responseText;
			}
		}
		http.open("GET","readblog.php?id="+x,true);
		http.send();
	}
</script>
</html>
