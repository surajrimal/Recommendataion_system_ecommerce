
<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="DELETE FROM tbl_customer where id=".$id;
	$result=mysqli_query($link,$sql);
	header('location:../display/customer_display.php'); 
?>
