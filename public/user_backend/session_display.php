<?php require_once("../../includes/initialize.php"); ?>
<?php include('header.php'); ?>
<body>
<div class="container">
<ul class="nav navbar nav-justified navbar-inverse">
	<li class="active"><a href="session_display.php">My Order Details</a></li>
 
</ul>
    <?php
		//session_start();
	if(!isset($_SESSION['session_id'])){
			header('location:index.html');
		}
		$sesid = $_SESSION['session_id'];
		//$email=$_SESSION['email'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_product as p INNER JOIN tbl_order as o ON o.product_id = p.id where o.session_id = '$sesid'";
		$result=mysqli_query($link,$sql);
		if(!$result){
			echo "NO RESULT".mysqli_error($link);
		}
	?>
	<table border="1" class="table table-striped">
    	<tr><th>SN</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
		<th>Order Date</th>
        <!--<th>Cutomer Name</th>
        <th>Customer Address</th>
        <th>Contact</th>-->
        <th>Delete</th>
        <th>Update</tr>
        <?php
		$i=1;
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$i++;?></td>
        <td><?=$row['product_name']?></td>
        <td><?=$row['quantity']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['total']?></td>
		<td><?=$row['order_date']?></td>
        <!--<td><?=$row['first_name']." ".$row['last_name']?></td>
        <td><?=$row['customer_address']?></td>
        <td><?=$row['contact']?></td>-->
        <td><a href="order_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="order_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>
    <script src="../temp/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
<?php include_layout_template('footer.php'); ?>