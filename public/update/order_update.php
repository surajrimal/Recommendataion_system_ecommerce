<?php
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_product as p INNER JOIN tbl_order as o ON p.id = o.product_id WHERE o.id=".$id;
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
            <th align="justify"></th><td align="justify"><input type="hidden" name="pname" value="<?=$row['product_name']?>" required="required" class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Quantity:</th><td align="justify"><input type="number" name="qty" value="<?=$row['quantity']?>" required class="form-control" /></td>
        </tr>
       
        <tr>
        	<th align="justify"></th><td align="justify"><input type="hidden" name="total" value="<?=$row['total']?>" required class="form-control" /></td>
        </tr>
        <tr> 
            <th align="justify">Customer Name:</th><td align="justify"><input type="text" name="cname" value="<?=$row['customer_name']?>" required class="form-control" />
            </td></tr>
		<tr> 
            <th align="justify">Customer Address:</th><td align="justify"><input type="text" name="caddress" value="<?=$row['customer_address']?>" required class="form-control" />
            </td></tr>
         <tr>
        
			<th align="justify">Contact:</th><td align="justify"><input type="text" name="contact" value="<?=$row['contact']?>" required class="form-control" /></td>
        </tr>   	
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
<?php
		}
	if(isset($_POST['submit'])){
		$newid=$id;
		//$pname=$_POST['pname'];
		$qty=$_POST['qty'];
		//$price=$_POST['price'];
		//$total=$qty*$price;
		//$total=$_POST['total'];
		$cname=$_POST['cname'];
		$caddress=$_POST['caddress'];
		$contact=$_POST['contact'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="UPDATE tbl_order SET quantity='$qty',customer_name='$cname',customer_address='$caddress',contact='$contact' WHERE id=".$newid;
		$result=mysqli_query($link,$sql);
			if($result){
				echo "<span style='background-color:green; padding:5px; color:white;'>"."Update Data Successfully !"."</span>";
				}else{
					echo mysqli_error($link);
				}
	}
?>
 <?php
		include('../templete/footer.php');
?>