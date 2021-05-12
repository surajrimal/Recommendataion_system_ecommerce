<?php

	$link = mysqli_connect('localhost','root','','ecommerce');
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$encode="abc";
	$pass1 = md5($pass,$encode);
	$sql="SELECT * FROM tbl_customer where email='$email' AND password='$pass1'";
	$result=mysqli_query($link,$sql);
	while($row = mysqli_fetch_assoc($result)){
		$name= $row["first_name"]." ".$row["last_name"];
		$contact= $row["contact"];
		$address= $row["customer_address"];
		$cid= $row["id"];
		
	}
	
	$count=mysqli_num_rows($result);
	if($count == 1){
		
			session_start();
			$_SESSION['customer_name']=$name;
			$_SESSION['email']=$email;
			$_SESSION['contact']=$contact;
			$_SESSION['address']=$address;
			$_SESSION['cus_id']=$cid;
			
			header('location:../index.php');
		}else{
			echo "<p class='alert-danger'>Incorrect username or password try again!</p>";
			}

?>