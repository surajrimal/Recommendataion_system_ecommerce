<?php
include('../templete/header.php');
?>
<form  method="post">
	<table>
    	<tr> 
            <th align="justify">Product Name:</th><td align="justify"><input type="text" name="pname" value="" required="required" class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Quantity:</th><td align="justify"><input type="number" name="qty" value="" required="required" class="form-control" /></td>
        </tr>
        <tr>
        	<th align="justify">Price:</th><td align="justify"><input type="number" name="price" value="" required="required" class="form-control" /></td>
        </tr>
        <!--<tr>
        	<th align="justify">Total:</th><td align="justify"><input type="number" name="total" value="" required="required" class="form-control" /></td>
        </tr>-->
        <tr> 
            <th align="justify">Customer Name:</th><td align="justify"><input type="text" name="cname" value="" required="required" class="form-control" />
            </td></tr>
		<tr> 
            <th align="justify">Customer Address:</th><td align="justify"><input type="text" name="caddress" value="" required="required" class="form-control" />
            </td></tr>
         <tr>
        
			<th align="justify">Contact:</th><td align="justify"><input type="text" name="contact" value="" required="required" class="form-control" /></td>
        </tr>   	
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success"/></td>
        </tr>
     </table>
</form>
<?php
	if(isset($_POST['submit'])){
		//$oid=$_POST['oid'];
		$pname=$_POST['pname'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$total=$qty*$price;
		//$total=$_POST['total'];
		$cname=$_POST['cname'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="INSERT INTO tbl_order(product_name,quantity,price,total,customer_name,customer_address,contact) VALUES ('$pname','$qty','$price','$total','$cname','$caddress','$contact')";
		$result=mysqli_query($link,$sql);
	}
?>

<?php
include('../templete/footer.php');
?>