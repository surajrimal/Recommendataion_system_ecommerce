<?php
include('../templete/header.php');
?>
                	
<form  method="post">
	<table>
    	
        <tr> 
            <th align="justify">Customer Name:</th><td align="justify"><input type="text" name="cname" value="" required  class="form-control"/></td>	
        </tr>
        <tr> 
            <th align="justify">Password:</th><td align="justify"><input type="password" name="cpass" value="" required  class="form-control"/></td>	
        </tr>
       	<tr>
        	<th align="justify">Address:</th><td align="justify"><input type="text" name="caddress" value="" required class="form-control"/></td>
        </tr>
        <tr>
        	<th align="justify">Contact:</th><td align="justify"><input type="text" name="contact" value="" required class="form-control"/></td>
        </tr>
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
<?php
	if(isset($_POST['submit'])){
		//$cuid=$_POST['cuid'];
		$cname=$_POST['cname'];
		$cpass=$_POST['cpass'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="INSERT INTO tbl_customer(customer_name,password,customer_address,contact) VALUES ('$cname','$cpass','$caddress','$contact')";
		$result=mysqli_query($link,$sql);
	}
?>
<?php
include('../templete/footer.php');
?>