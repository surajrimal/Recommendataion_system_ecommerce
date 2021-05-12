<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_slider WHERE id=".$id;
	$result=mysqli_query($link,$sql);
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
                <th align="justify">Image:</th><td><br><br><input type="file" name="img" value="" /><br>
                <img src="../slider/<?=$row['image']?>" width="100" height="75" alt="Product Image" /></td>
            </tr>
            <tr>
                <th align="justify">Description:</th><td align="justify"><textarea rows="10" cols="75" name="descr" class="form-control" /><?=$row['description']?></textarea></td>
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
			$image=$_FILES['img']['name'];
			$tmp_name=$_FILES['img']['tmp_name'];
			$prm_name='../slider/'.$image;
			move_uploaded_file($tmp_name,$prm_name);
			$description=$_POST['descr'];
			$link=mysqli_connect('localhost','root','','ecommerce');
			if(!empty($image)){
				$sql="UPDATE tbl_slider SET image='$image',description='$description' WHERE id=".$newid;
			}
			else{
				$sql="UPDATE tbl_slider SET description='$description' WHERE id=".$newid;
			}
			$result=mysqli_query($link,$sql);
					if($result){
				echo "<span style='background-color:green; padding:5px; color:white;'>"."Update Data Successfully !"."</span>";
				}
		}
	?>   
     <?php
		include('../templete/footer.php');
	?>