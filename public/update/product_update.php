<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	//$sql="SELECT * FROM tbl_product WHERE id=".$id;
	$sql="SELECT * FROM tbl_category as c INNER JOIN tbl_product as p ON c.id = p.category_id WHERE p.id=".$id;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo mysqli_error($link);
	}
?>
<?php
	include('../templete/header.php');
?>
     <?php
		while($row=mysqli_fetch_assoc($result)){
	?>
    <form method="post" enctype="multipart/form-data">
    	<input type="hidden" name="id" value="<?=$row['id']?>" />
    	<table>
            <tr>
                <th align="justify">Product Name:</th><td align="justify"><input type="text" name="pname" value="<?=$row['product_name']?>" class="form-control" /></td>
            </tr>
            <tr>
                <th align="justify">Price:</th><td align="justify"><input type="number" name="price" value="<?=$row['price']?>" class="form-control" /></td>
            </tr>
	<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_category";
		$result=mysqli_query($link,$sql);
	?>            
            <tr>
                <th align="justify">Category:</th><td align="justify">
                <select name="category" class="form-control" >
                <!---<option><?=$row['category']?></option> -->
        <?php
			while($row1=mysqli_fetch_assoc($result)){
		?>
                <option><?=$row1['category']?></option>
        <?php } ?>
         </select>       
                </td>
            </tr>
            <tr>
                <th align="justify">Image:</th><td><br><br><input type="file" name="img" value="" /><br>
                <img src="../image/<?=$row['image']?>" width="100" height="75" alt="Product Image" /></td>
            </tr>
            <tr>
                <th align="justify">Description:</th><td align="justify"><textarea rows="10" cols="75" name="descr" class="form-control" /><?=$row['description']?></textarea></td>
            </tr>
            <tr>
                <th align="justify">Status:</th><td align="justify"><input type="radio" name="status" value="ON" checked />ON <input type="radio" name="status" value="OFF" />OFF</td>
            </tr>
            <tr align="justify">
            	<td><input type="submit" name="submit" value="Register" class="btn btn-success" /></td>
            </tr>
        </table>
    </form>
    <?php
		}
		if(isset($_POST['submit'])){
			$newid=$id;
			$pname=$_POST['pname'];
			$price=$_POST['price'];
			$category=$_POST['category'];
			
			$image=$_FILES['img']['name'];
			$tmp_name=$_FILES['img']['tmp_name'];
			$prm_name='../image/'.$image;
			move_uploaded_file($tmp_name,$prm_name);
			$description=$_POST['descr'];
			$status=$_POST['status'];
			$link=mysqli_connect('localhost','root','','ecommerce');
			$sql = "SELECT * FROM tbl_category where category = '$category'"; 
			$result1 = mysqli_query($link,$sql);
			if($result1){
			$row = mysqli_fetch_assoc($result1);
			$cid = $row['id'];
			}else{
				echo mysqli_error($link);
			}
			if(!empty($image)){
				$sql="UPDATE tbl_product SET product_name='$pname',price='$price',category_id='$cid',image='$image',description='$description',status='$status' WHERE id=".$newid;
			}
			else{
				$sql="UPDATE tbl_product SET product_name='$pname',price='$price',category_id='$cid', description='$description', status='$status' WHERE id=".$newid;
			}
			$result=mysqli_query($link,$sql);
					if($result){
				echo "<span style='background-color:green; padding:5px; color:white;'>"."Update Data Successfully !"."</span>";
				}else {
					echo mysqli_error($link);
				}
		}
	?>   
     <?php
		include('../templete/footer.php');
	?>