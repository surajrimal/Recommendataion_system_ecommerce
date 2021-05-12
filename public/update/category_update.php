<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_category WHERE id=".$id;
	$result=mysqli_query($link,$sql);
?>
<?php
	include('../templete/header.php');
?>
   	<?php
		while($row=mysqli_fetch_assoc($result)){
	?>
	<form method="post">
    	<table><tr>
    	 <tr><th>Category:</th> <td><input type="text" name="cate" value="<?=$row['category']?>" class="form-control" />
         <tr align="center"><th><input type="submit" name="submit" value="Register"  class="btn btn-success" /></th></tr>
       	</table>
    </form>
    <?php	
		}
		if(isset($_POST['submit'])){
			$newid=$id;
			$category=$_POST['cate'];
			$link=mysqli_connect('localhost','root','','ecommerce');
			$sql="UPDATE tbl_category SET category='$category' WHERE id=".$newid;
			$result=mysqli_query($link,$sql);
			if($result){
				echo "<span style='background-color:green; padding:5px; color:white;'>"."Update Data Successfully !"."</span>";
				}
			
		}
	?>
    <?php
		include('../templete/footer.php');
?>