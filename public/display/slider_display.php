<?php
	include('../templete/header.php');
?>
     <?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_slider ORDER BY id DESC";
		$result=mysqli_query($link,$sql);
	?>
	<table border="1" class="table table-striped">
    	<tr>
        <th>id</th>
        <th>Product Image</th>
        <th>Description</th>
        <th>Delete</th>
        <th>Update</th>
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        
        <td><img src="../slider/<?=$row['image']?>" width="100" height="75" /></td>
        <td><?=$row['description']?></td>
        
        <td><a href="../delete/slider_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/slider_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>
 <?php
		include('../templete/footer.php');
?>