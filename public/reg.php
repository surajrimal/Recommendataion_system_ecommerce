<?php
 //require_once("../includes/layouts/db_connection.php"); 
 //require_once("../includes/functions.php"); 
 require_once("../includes/initialize.php");
	if(isset($_POST['submit'])){
		//$cuid=$_POST['cuid'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$encode="abc";
		$cpass= md5($_POST['cpass'],$encode);
		//$cpass = $_POST['cpass'];
		$email= $_POST['email'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		//$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="INSERT INTO tbl_customer(first_name,last_name,password,customer_address,contact,email) VALUES ('$fname','$lname','$cpass','$caddress','$contact','$email')";
		$result=mysqli_query($link,$sql);
		$message = "";
		if($result){
			$message = "User created Successfully!";
			if(isset($_SESSION['customer_name'])){
			session_destroy();
			}
			session_start();
			$_SESSION['customer_name']=$fname." ".$lname;
			$_SESSION['email']=$email;
			$_SESSION['contact']= $contact;
			$_SESSION['address']= $caddress;
			header('location:index.php');
			display($message);
			
			
		}else{
				$message = "This user name has already existed try with another customer name ".mysqli_error($link);
				display($message);
			}
	}
	
?>