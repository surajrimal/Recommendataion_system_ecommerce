<?php
	include('../templete/header.php');
?>
	<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_category";
		$result=mysqli_query($link,$sql);
	?>            
        <form method="post">
            <tr>
               <td align="justify">
                <select name="category" class="form-control" ><?=$row['category']?>
        <?php
			while($row1=mysqli_fetch_assoc($result)){
		?>
                <option><?=$row1['category']?></option>
        <?php } ?>
         </select>   
         <input type="submit" name="sear" value="Search" class="btn btn-success form-control">    
     </td></tr></form>    
     <?php
	 if(isset($_POST['sear']))
	 {
		 $value = $_POST['category'];
		$sql="SELECT * FROM tbl_category as c INNER JOIN tbl_product as p ON c.id = p.category_id 
		WHERE c.category='$value' ORDER BY p.id DESC";
		$result=mysqli_query($link,$sql);
	?>
         
	<table border="1" class="table table-striped">
    	<tr><th>id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Product Image</th>
        <th>Description</th>
        <th>Status</th>
        <th>Delete</th>
        <th>Update</th>
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['product_name']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['category']?></td>
        <td><img src="../image/<?=$row['image']?>" width="100" height="75" /></td>
        <td><?=$row['description']?></td>
        <td><?=$row['status']?></td>
        <td><a href="../delete/product_delete.php?getid=<?=$row['id']?>">Delete</a></td>
        <td><a href="../update/product_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
	 }
		?>
	</table>
 <?php
		include('../templete/footer.php');
?>