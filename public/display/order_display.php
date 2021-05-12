<?php
	include('../templete/header.php');
?>
<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_product as p INNER JOIN tbl_order as o ON o.product_id = p.id ORDER BY o.id DESC";
		$result=mysqli_query($link,$sql);
		if($result){
?>
	<table border="1" class="table table-striped">
    	<tr><th>ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Total</th>
		<th>Ordered Date</th>
        <th>Cutomer Name</th>
        <th>Customer Address</th>
        <th>Contact</th>
        <th>Delete</th>
		<th>Update</th>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['product_name']?></td>
        <td><?=$row['quantity']?></td>
        <td><?=$row['total']?></td>
		<td><?=$row['order_date']?></td>
        <td><?=$row['customer_name']?></td>
        <td><?=$row['customer_address']?></td>
        <td><?=$row['contact']?></td>
        <td><a href="../delete/order_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/order_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		}else{
			echo mysqli_error($link);
		}
		?>
	</table>
    <?php
		include('../templete/footer.php');
	?>