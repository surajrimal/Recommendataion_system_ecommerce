<?php
include('../templete/header.php');
?>
                	<form method="post">
    	<table><tr>
    	 <tr><th>Category:</th> <td><input type="text" name="cate" value=""  required="required" class="form-control" />
         <tr align="center"><th><input type="submit" name="submit" value="Register" class="btn btn-success" /></th></tr>
       	</table>
    </form>
    <?php
		if(isset($_POST['submit'])){
			$category=$_POST['cate'];
			$link=mysqli_connect('localhost','root','','ecommerce');
			$sql="INSERT INTO tbl_category(category) VALUES ('$category')";
			$result=mysqli_query($link,$sql);
		}
	?>
                    
<?php
include('../templete/footer.php');
?>