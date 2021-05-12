<?php		
include('../templete/header.php');
?>
         <form method="post" enctype="multipart/form-data">
    	<table>
            <tr>
                <th align="justify">Image:</th><td align="justify"><input type="file" name="img" value="" /></td>
            </tr>
            <tr>
                <th align="justify">Description:</th><td align="justify"><textarea rows="10" cols="75" name="descr"></textarea></td>
            </tr>
             <tr align="justify"><td><input type="submit" name="submit" value="Register" /></td>
            </tr>
        </table>
    </form>
    <?php
		if(isset($_POST['submit'])){
			//$pid=$_POST['pid'];
			//$pname=$_POST['pname'];
			//$price=$_POST['price'];
			//$category=$_POST['category'];
			$image=$_FILES['img']['name'];
			$tmp_name=$_FILES['img']['tmp_name'];
			$prm_name='../slider/'.$image;
			move_uploaded_file($tmp_name,$prm_name);
			$description=$_POST['descr'];
			//$status=$_POST['status'];
			$link=mysqli_connect('localhost','root','','ecommerce');
			$sql="INSERT INTO tbl_slider(image,description) VALUES ('$image','$description')";
			$result=mysqli_query($link,$sql);
		}
	?>           
<?php
include('../templete/footer.php');
?>               