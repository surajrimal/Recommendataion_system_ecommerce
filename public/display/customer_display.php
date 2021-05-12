<?php
	include('../templete/header.php');
?>
                	<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_customer";
		$result=mysqli_query($link,$sql);
	?>
	<table border="1" class="table table-striped">
    	<tr><th>Id</th>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Delete</th>
        <th>Update</th>
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['first_name']." ".$row['last_name']?></td>
        <td><?=$row['customer_address']?></td>
        <td><?=$row['contact']?></td>
        <td><a href="../delete/customer_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/customer_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>
    <?php
		include('../templete/footer.php');
	?>