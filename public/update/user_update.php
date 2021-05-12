<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_user WHERE id=".$id;
	$result=mysqli_query($link,$sql);
?>
<?php
	include('../templete/header.php');
?>
    <?php
		while($row=mysqli_fetch_assoc($result)){
	?>
	<form  method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>" />
	<table>
        <tr> 
            <th align="justify">User Name:</th><td align="justify"><input type="text" name="uname" value="<?=$row['user_name']?>" required class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Password:</th><td align="justify"><input type="password" name="upass" value="<?=$row['user_password']?>"" required="required" class="form-control" /></td>
        </tr>
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
<?php
		}
	if(isset($_POST['submit'])){
		$newid=$_POST['id'];
		//$uid=$_POST['uid'];
		$uname=$_POST['uname'];
		$password=$_POST['upass'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="UPDATE tbl_user SET user_name='$uname',user_password='$password' WHERE id=".$newid;
		$result=mysqli_query($link,$sql);
			if($result){
				echo "<span style='background-color:green; padding:5px; color:white;'>"."Update Data Successfully !"."</span>";
				}
	}
?>
  <?php
		include('../templete/footer.php');
	?>