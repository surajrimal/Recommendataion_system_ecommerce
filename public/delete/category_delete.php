<?php
		include('../templete/header.php');
?>
<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="DELETE FROM tbl_category where id=".$id;
	$result=mysqli_query($link,$sql);
	header('location:../display/category_display.php'); 
?>
<?php
		include('../templete/footer.php');
?>