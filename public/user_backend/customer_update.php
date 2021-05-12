<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Details</title>

<link href="../temp/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../temp/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
<?php
	session_start();
	if(!isset($_SESSION['customer_name'])){
		header('location: index.html');
	}
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_customer WHERE id=".$id;
	$result=mysqli_query($link,$sql);
?>

   	<?php
		while($row=mysqli_fetch_assoc($result)){
	?>
    <form  method="post" >
    <input type="hidden" name="id" value="<?=$row['id']?>" />
	<table>
    	
        <tr> 
            <th align="justify">First Name:</th><td align="justify"><input type="text" name="fname" value="<?=$row['first_name']?>" required class="form-control" /></td>	
        </tr>
		<tr> 
            <th align="justify">Last Name:</th><td align="justify"><input type="text" name="lname" value="<?=$row['last_name']?>" required class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Address:</th><td align="justify"><input type="text" name="caddress" value="<?=$row['customer_address']?> " class="form-control" /></td>
        </tr>
        <tr>
        	<th align="justify">Contact:</th><td align="justify"><input type="text" name="contact" value="<?=$row['contact']?>" required class="form-control" /></td>
        </tr>
		 <tr>
        	<th align="justify">Email:</th><td align="justify"><input type="email" name="email" value="<?=$row['email']?>" required class="form-control" /></td>
        </tr>
		 <tr>
        	<th align="justify">Password:</th><td align="justify"><input type="password" name="pass" value="<?=$row['password']?>" required class="form-control" /></td>
        </tr>
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
<?php
	}
	if(isset($_POST['submit'])){
		$newid=$id;
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		$encode= "abc";
		$pass = md5($_POST['pass'],$encode);
		$email = $_POST['email'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="UPDATE tbl_customer SET first_name='$fname', last_name='$lname',customer_address='$caddress',email='$email', contact='$contact', password='$pass' WHERE id=".$newid;
		$result=mysqli_query($link,$sql);
		if($result){
		header("location: customer_display.php");
		}else{
			echo mysqli_error($link);
		}
	}
?>
</div>
 <script src="../temp/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>	
 