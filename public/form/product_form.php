<?php		
include('../templete/header.php');
?>
                	<form method="post" enctype="multipart/form-data">
    	<table>
            <tr>
                <th align="justify">Product Name:</th><td align="justify"><input type="text" name="pname" value="" /></td>
            </tr>
            <tr>
                <th align="justify">Price:</th><td align="justify"><input type="number" name="price" value="" /></td>
            </tr>
<?php
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_category";
		$result=mysqli_query($link,$sql);
	?>            
            <tr>
                <th align="justify">Category:</th><td align="justify">
                <select name="category">
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
                <option><?=$row['category']?></option>
        <?php } ?>
         </select>       
                </td>
            </tr>
            <tr>
                <th align="justify">Image:</th><td align="justify"><input type="file" name="img" value="" /></td>
            </tr>
            <tr>
                <th align="justify">Description:</th><td align="justify"><textarea rows="10" cols="75" name="descr"></textarea></td>
            </tr>
            
            <tr>
                <th align="justify">Status:</th><td align="justify"><input type="radio" name="status" value="ON" />ON <input type="radio" name="status" value="OFF" />OFF</td>
            </tr>
            <tr align="justify">
            	<td><input type="submit" name="submit" value="Register" /></td>
            </tr>
        </table>
    </form>
    <?php
		if(isset($_POST['submit'])){
			//$pid=$_POST['pid'];
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
			$sql="INSERT INTO tbl_product(product_name,price,category_id,image,description,status) VALUES ('$pname','$price','$cid','$image','$description','$status')";
			$result=mysqli_query($link,$sql);
		}
	?>           
<?php
include('../templete/footer.php');
?>               