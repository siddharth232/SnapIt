<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>SnapIt!!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
	<style type="text/css">
	 *{
	 	margin: 0px;
	 	padding: 0px;
	 }
	 .header{
	 	width: 100%;
	 	height: 110px;
	 	background-color: rgba(236, 240, 241,0.2);
	 	
	 	
	 }
	 .content{
	 	height: 542px;
	 	width: 100%;


	 }
	 body{
	 	background-image: url("IndexWallpaper.jpg");
	 	background-size: cover;
	 }
	 h2{
	 	color:#c7ecee;
	 font-family: 'Cute Font', cursive;
	 	margin-left: 25px;
	 	padding-top: 10px;
        font-size:55px;
	 }
	 h1{
	 	color:#c7ecee;
	 font-family: 'Cute Font', cursive;
	 	margin-left: 50px;
	 	padding-top: 10px;
        font-size:75px;
        opacity: 1;}
        #email{
        	position: absolute;
        	top: 35px;
        	right: 350px;
        }
        #pwd{
        	position: absolute;
        	top: 35px;
        	right: 140px;
        }
        #login{
        	position: absolute;
        	top: 35.5px;
        	right: 70px;
        }
          #button{
           	  border-radius: 5px 5px 5px 5px;
            color:white;
            background-color: black;
            font-weight: bold;
            width:100px;
            height:40px;
            top:500px;
            position: absolute;
            border-color: #3B6E22;
            border-width: 1px;
            box-sizing: border-box;
            font-size: 20px;
            font-family: Helvetica;
            cursor: pointer;
           }
        .inputtextfield{
            height: 44px;
            border-radius: 5px 5px 5px 5px;
            border-style: solid;
            border-width: 1px;
            border-color: black;

            overflow: hidden;
            font-size: 18px;
            padding: 10px;
            
	    }
	    .form-control{
	    	width: 27%;
	    	margin-left: 20px;
	    	height: 50px;
	    }
	    #signup{
	    	margin-left: 20px;
	    	width: 27%;
	    }
	</style>
</head>
<body>
<div class="header">
	<h1>SnapIt!!</h1>
	<form class="form-inline" action="Index.php" method="post">
  <input type="text" class="form-control mb-2 mr-sm-2" id="email" name="username" placeholder="Username..." required>
 
  <input type="password" class="form-control mb-2 mr-sm-2" id="pwd" name="password" required placeholder="Password">
  <button type="submit" name="login" class="btn btn-primary mb-2" id="login">LogIn</button>
</form>



</div>
<div class="content">
<h2>Never Miss A Moment !!</h2>
	<form action="Index.php" method="post">
  <div class="form-group">
  
    <input type="name" name='uname' placeholder="Username..." class="form-control" id="uemail">
  </div>	
  <div class="form-group">
  
    <input type="name" name='bio' placeholder="About U..." class="form-control" id="uemail">
  </div>  	

  <div class="form-group">
  
    <input type="password" placeholder="Password..." name="upass" class="form-control" id="upwd">
  </div>
  <div class="form-group">
  	<input type="password" name="cpass" placeholder="Confirm Password" class="form-control">
  </div>
  <button type="submit" name="signup" class="btn btn-primary" id="signup">SignUp</button>
</form>
</div>
 <?php 
 if (isset($_POST['login'])) {
 	 $name=$_POST['username'];
 	 $pwd=$_POST['password'];
 	 $sql="SELECT * FROM accinfo WHERE username='$name' AND password='$pwd'";
 	 $result=$conn->query($sql);
 	 if ($result) {
 	 	if ($result->num_rows>0) {
 	 		echo"<script>window.open('Home.php','_self');</script>";
 	 	}else{
 	 		echo "<script>alert('Invalid User');</script>";
 	 	}
 	 }
 }
   if (isset($_POST['signup'])) {
   	    $uname=$_POST['uname'];
        $bio=$_POST['bio'];
   	    $upass=$_POST['upass'];
   	    $cpass=$_POST['cpass'];
   	    $sql="SELECT * FROM accinfo WHERE username='$uname'";
   	    $result=$conn->query($sql);
   	    echo "<script>'".$conn->error."'</script>";
   	    if ($result) {
   	    	if ($result->num_rows>0) {
   	    		echo "<script>alert('Username Already Exist');</script>";
   	    	}
   	    	else{
   	    		if ($upass==$cpass) {
   	    			$sql="INSERT INTO accinfo(username,password,bio) VALUES('$uname','$upass','$bio')";
   	    			if($conn->query($sql)==true){
                $_SESSION['username']=$uname;
   	    				echo "<script>alert('You Signed Up successfully');window.open('Home.php','_self');</script>";
   	    			}
   	    		}else{
   	    			echo "<script>alert('Passwords must be same');</script>";
   	    		}
   	    	}
   	    }

   }
 ?>
</body>
</html>