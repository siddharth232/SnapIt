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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  	.list-group-item{
  		cursor: pointer;
  	}
    #button{
  display: inline-block;
  margin-top: 10px;
  width: 10%;
  position: fixed;
  bottom: 10px;
  right: 10px;
  cursor: pointer;
 }
 button{
  margin-left: 10px;

 } 
 .btn{
  margin-top: 10px;
 }
 body{
   background-color: #34495e;
 }
 #con{
  background-color: white;
  border-radius: 5px 5px 5px 5px;
  margin-top: 10px;
 }
 h1{
    font-family: 'Grenze', serif;
 }
 p{
    font-family: 'Grenze', serif;
 }

  </style>
</head>
<body>
<div id="Titlebar">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top ">
  <a class="navbar-brand" href="#">Never Miss A Moment,Snap It!!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
  <ul class="navbar-nav d">
    <li class="nav-item">
      <a class="nav-link" href="Home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"  href="userprofile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "  href="Blog.php">Blog</a>
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
	<div class="col-sm-8" id="con">
		<div class="jumbotron" id="head" >
			<?php 
            //include 'config.php';
  //$username="kiran";
  $username=$_SESSION['username'];
  $sql="SELECT * FROM accinfo WHERE username='$username'";
  $result=$conn->query($sql);
  $sql1="SELECT * FROM blog WHERE username='$username'";
  $result1=$conn->query($sql1);
  $sql2="SELECT * FROM images WHERE username='$username'";
  $result2=$conn->query($sql2);
  
  echo $conn->error;
  if ($result) {
  	$row=$result->fetch_assoc();
	echo '<h1>'.$username.'</h1><p>'.$row['bio'].'</p>

    
        <ul class="nav nav-pills nav-justified">

    <li class="nav-item" >
      <a class="nav-link "  href="userprofile.php">Photos <span class="badge badge-warning badge-pill">'.(count($result1->fetch_assoc())/4).'</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"  href="profileBlog.php">Blog<span class="badge badge-warning badge-pill">'.(count($result2->fetch_assoc())).'</span></a>
    </li>
  </ul> <button class="btn btn-primary" id="button" onclick="UploadB()"><i class="fa fa-plus" style="font-size:24px;color:white"></i>&nbsp&nbspUpload</button>';
  }

			?>
			
		</div>
		<div class="row">
			<div class="col-sm-10" id="cont">
				<div class="container">
			<ul class="list-group list-group-flush">
				<?php 
				 //  include 'config.php';
				   $username=$_SESSION['username'];
				  // $username='kiran';
				   $string="";
				   $sql="SELECT * FROM blog WHERE username='$username' ";
				   $result=$conn->query($sql);
				   if ($result) {
				   	while ($row=$result->fetch_assoc()) {
				   		$array=explode(",", $row['likes']);
				   		$string=$string."<li class='list-group-item'  id=".$row['id'].">
                             <h1 class='display-4'>".$row['title']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<small>".$row['reg_date']."</small></h1>
                             <h1 class='display-5'>Author:<i>".$row['username']."</h1>
                             <h1 class='display-5'>".$row['description']."</h1>
                         <button onclick='readmore(".$row['id'].")' class='btn btn-primary'>Readmore</button><button onclick='deleteb(".$row['id'].")' class='btn btn-primary'>Delete</button></li>";
				   	}
				   	echo $string;
				   }
				?>
			</ul>
		</div>
			</div>
			<div class="col-sm-2"><div class="list-group">
				
			</div></div>
		</div>
	</div>

  <script type="text/javascript">
  
  </script>
	<script type="text/javascript">
    function readmore(x){
      var http=new XMLHttpRequest();
      http.onreadystatechange=function(){
      //  console.log('sd');
        if (this.readyState==4&&this.status==200) {
          document.getElementById('cont').innerHTML=this.responseText;
        }
      }
      http.open("GET",'readblog.php?id='+x,true);
      http.send();
    }
    function deleteb(x){
    var http=new XMLHttpRequest();
    //console.log('in');
    http.onreadystatechange=function(){
    if (this.readyState==4&&this.status==200) {
      //console.log('innn');
      document.getElementById('cont').innerHTML+=this.responseText;
      window.open('profileBlog.php','_self');
    }
    }
    http.open("GET","deleteblog.php?id="+x,true);
    http.send();
    
    }
		function UploadB(){
         document.getElementById('cont').innerHTML='<form action="profileBlog.php" method="post" enctype="multipart/form-data"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="Title"></div><div class="form-group"><input type="text" name="description" class="form-control" placeholder="Description"></div><div class="form-group"><textarea name="content" row="50" cols="50" class="form-control" placeholder="Content"></textarea></div> <div class="custom-file"><input type="file" class="custom-file-input" id="customFile" name="fileToUpload"><label class="custom-file-label" for="customFile">Choose file(Optional)</label></div><input class="btn btn-primary" type="submit" name="submit"></form>';
        $(".custom-file-input").on("change", function() {
    console.log('asd');
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
}); }
</script>
<div class="col-sm-2"></div>
</div>
 <?php 
   if (isset($_POST['submit'])) {
     $title=$_POST['title'];
     $username=$_SESSION['username'];
    // $username='kiran';
     $description=$_POST['description'];
     $content=$_POST['content'];
     $sql3="SELECT * FROM blog WHERE username='$username' AND title='$title'";
     $result3=$conn->query($sql3);
     if ($result3) {
       
     
     if ($result3->num_rows<1) {
       echo "<script>alert('Already Title Exist');</script>";
     }else{
     $target_file="";
  $target_dir = "ImageUploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
       if ($target_file!=$target_dir){
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if($imageFileType != "jpg" && $imageFileType != "png" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
   } else {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
     }
 
     $sql="INSERT INTO blog(content,username,src,description,title) VALUES('$content','$username','$target_file','$description','$title')";
     if($conn->query($sql)==true){
      echo "<script>alert('Your Blog Posted Successfully')</script>";
     }
   } }
   }
 ?>
</body>

</html>
