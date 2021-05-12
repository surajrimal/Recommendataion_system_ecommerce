<?php
	include('../templete/header.php');
?>
                	<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_user";
		$result=mysqli_query($link,$sql);
	?>
	<table border="1" class="table table-striped">
    	<tr><th>id</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Update</th>
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['user_name']?></td>
        <td><?=$row['user_password']?></td>
        <td><a href="../delete/user_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/user_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>	
   <?php
   	include('../templete/footer.php');
	?>