<?php
include('../templete/header.php');
?>
                    <form  method="post">
	<table>
        <tr> 
            <th align="justify">User Name:</th><td align="justify"><input type="text" name="uname" value="" required="required" class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Password:</th><td align="justify"><input type="password" name="upass" value="" required="required" class="form-control" /></td>
        </tr>
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
<?php
	if(isset($_POST['submit'])){
		//$uid=$_POST['uid'];
		$uname=$_POST['uname'];
		$password=$_POST['upass'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="INSERT INTO tbl_user(user_name,user_password) VALUES ('$uname','$password')";
		$result=mysqli_query($link,$sql);
	}
?>

<?php
include('../templete/footer.php');
?>              