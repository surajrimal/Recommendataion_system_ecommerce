<?php
		
	if(isset($_POST['submit'])){
		$newid=$_POST['id'];
		$pname=$_POST['pname'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$total=$qty*$price;
		//$total=$_POST['total'];
		$cname=$_POST['cname'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		//$sql="UPDATE tbl_order SET product_name='$pname',quantity='$qty',price='$price',total='$total',customer_name='$cname',customer_address='$caddress',contact='$contact' WHERE sn=".$newid;
		$sql="UPDATE tbl_order SET quantity='$qty', total = '$total',customer_address='$caddress',contact='$contact' WHERE id=".$newid;
		$result=mysqli_query($link,$sql);
		if($result){
		header('location:order_display.php');
		}else{
			echo mysqli_error($link);
		}
	}
?>
