<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login</title>
<link href="../templete/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<div class="col-md-4"></div>
	<div class="col-md-4 thumbnail">
    <div class="col-md-12 well text-center">
    <h2>Login Panel</h2>
   	</div>
    <form method="post" class="form-group">
    User Name:
    	<input type="text" name="username" value="" placeholder="Enter your name" class="form-control" />
        <br />
    Password:
        <input type="password" name="password" value="" class="form-control" />
        <br />
        <center>
        <input type="submit" name="submit" value="Login" class="btn btn-success" />
        </center>
    </form>
<?php
if(isset($_POST['submit'])){
	$link = mysqli_connect('localhost','root','','ecommerce');
	$name=$_POST['username'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM tbl_user where user_name='$name' AND user_password='$pass'";
	$result=mysqli_query($link,$sql);
	$count=mysqli_num_rows($result);
	if($count == 1){
		session_start();
		$_SESSION['user_name']=$name;
		header('location:../templete/index.php');
		}else{
			echo "<p class='alert-danger'>Incorrect username or password try again!</p>";
			}
	}
?>
  </div>
</div>
<script src="../templete/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>