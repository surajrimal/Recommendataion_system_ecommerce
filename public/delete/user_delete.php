<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="DELETE FROM tbl_user where id=".$id;
	$result=mysqli_query($link,$sql);
	header('location:../display/user_display.php'); 
?>