<?php

	include('../templete/header.php');
?>
 	<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_category";
		$result=mysqli_query($link,$sql);
	?>
	<table border="1" class="table table-striped">
    	<tr><th>ID</th>
        <th>Category</th>
        <th>Delete</th>
        <th>Update</th>
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['category']?></td>
        <td><a href="../delete/category_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/category_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>
    <?php
		include('../templete/footer.php');
	?>