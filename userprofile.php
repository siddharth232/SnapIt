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
    #buttond{
     margin-top: 10px;
  width: 10%;
  position: fixed;
  bottom: 60px;
  right: 230px;
  cursor: pointer;
    
    }
 #button{
  display: inline-block;
  margin-top: 10px;
  width: 10%;
  position: fixed;
  bottom: 10px;
  right: 230px;
  cursor: pointer;
 }
 #head{
  padding: 20px;
  margin: 0px;
 }
 #Titlebar{
  background-color: #7f8c8d;
 } 
 body{
  background-color: #34495e;
 }
 #con{
  background-color: white;
  border-radius: 5px 5px 5px 5px;
 }
 *{
      margin: 0px;
      padding: 0px;
    }
   [class*='mt']{
    display: none;
    border-style: solid;
 
   
    border-radius: 5px 5px 5px 5px;
    border-width: 2px;
    margin-top: 5px;
   }
    [class*='mt'] p{
      font-size: 20px;
      margin-top: 5px;
    }
     [class*='mt'] textarea{
      
        border-style: black;
        border-width: 1px;
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
<body>
<div id="Titlebar">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" >
  <a class="navbar-brand" href="#">Never Miss A Moment,Snap It!!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link"  href="Home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"  href="userprofile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="ProfileBlog.php">Blog</a>
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
    <div id="head" class="jumbotron">
      <?php 
            //include 'config.php';
 // $username="kiran";
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
    $bio=$row['bio'];
    echo '<h1>'.$username.'</h1><p>'.$bio.'</p>
 <ul class="nav nav-pills nav-justified">

    <li class="nav-item" >
      <a class="nav-link active "  href="userprofile.php">Photos <span class="badge badge-warning badge-pill">'.(count($result1->fetch_assoc())/4).'</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link "  href="profileBlog.php">Blog<span class="badge badge-warning badge-pill">'.count($result2->fetch_assoc()).'</span></a>
    </li>
  </ul>
  <button class="btn btn-primary" id="buttond" onclick="Delete()"><i class="fa fa-minus" style="font-size:24px;color:white"></i>&nbsp&nbspDelete</button>
  <button class="btn btn-primary" id="button" onclick="Upload()"><i class="fa fa-plus" style="font-size:24px;color:white"></i>&nbsp&nbspUpload</button>';
  }

      ?>
    </div>
      <div class="row">
      <div class="col-sm-10" id="cont"></div>
     
    </div>
  </div>
   <div class="col-sm-2"></div>
  <?php    
      if (isset($_POST['delete'])) {
        $username=$_SESSION['username'];
        //$username='kiran';
              $id=$_POST['name'];
        $sql="SELECT * FROM accinfo WHERE username='$username' ";
        $result=$conn->query($sql);
        if ($result) {
          if ($result->num_rows>0) {
            $sql="DELETE FROM images WHERE id='$id'";
            if ($conn->query($sql)==true) {
              echo"<script>alert('Photo deleted successfully');</script>";
            }else{
              echo "<script>alert('".$conn->error."');</script>";
            }
          }else{
            echo "<script>alert('Invalid Password');</script>";
          }
        }
      }
  ?>
  <script type="text/javascript">
   
    photo();
    function Delete(){
      var http=new XMLHttpRequest();
      http.onreadystatechange=function(){
        if (this.readyState==4&&this.status==200) {
          document.getElementById('cont').innerHTML=this.responseText;

        }
      }
      http.open("GET","selectdelete.php",true);
      http.send();
    }
    function Upload(){
      document.getElementById('cont').innerHTML='<form action="Profile.php" method="post"  enctype="multipart/form-data"><div class="custom-file"><input type="file" class="custom-file-input" id="customFile" name="fileToUpload"><label class="custom-file-label" for="customFile">Choose file</label></div><div class="form-group"><textarea placeholder="Caption" class="form-control" rows="5" id="comment" name="caption" required></textarea></div><button type="submit" class="btn btn-primary" name="Upload">Upload</button></form>';
 $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").html(fileName);
});
    }

    function photo(){
      var http=new XMLHttpRequest();
      http.onreadystatechange=function(){
        if (this.readyState==4&&this.status==200) {
          document.getElementById('cont').innerHTML+=this.responseText;
        }
      }
      http.open("GET","profilephoto.php",true);
      http.send();
    }   

  </script>
  
</div>
<
<?php
if (isset($_POST['Upload'])) {
$username=$_SESSION['username'];
//$username='kiran';
$target_dir = "Imageuploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
   } 
else {
   $sql1='SELECT * FROM images WHERE username="$username" AND src="$target_file"';
        $result1=$conn->query($sql1);
          if ($result1) {
            if ($result1->num_rows<1) {
          echo "<script>alert('File Already Exist .Try Renaming');</script>";
        }else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.');</script>";
        $caption=$_POST['caption'];
       
      
        
     
        $sql="INSERT INTO images(username,src,caption) VALUES('$username','$target_file','$caption')";
        $conn->query($sql);} else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    } }
  
} } } ?>
<?php
 if (isset($_POST['delete'])) {
  //session_start();
  //$pwd=$_SESSION['pwd'];
  $file="Imageuploads/".$_POST['name'];
 // $pwd='123';
 // $upwd=strval($_POST['pwd']);
 // echo "<script>console.log('wwd')</script>";
 // echo "<script>console.log(".$pwd==$upwd.")</script>";
 // echo "console.log(".$upwd.$pwd.");";
 
  
    echo "<script>console.log('asd');</script>";
    $sql="DELETE FROM images WHERE src='$file'";
    if ($conn->query($sql)==true) {
      echo "<script>alert('Your Photo deleted successfully');</script>";
    }else{
      echo "<script>alert('Error Occured In Deleting Photo');</script>";
    }
   }
 
?>
</body>

</html>
