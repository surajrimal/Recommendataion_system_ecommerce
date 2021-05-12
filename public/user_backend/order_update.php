

<?php
	session_start();
	if(!isset($_SESSION['customer_name'])){
			header('location: ../index.php');
		}
	$id=$_GET['getid'];
	$link=mysqli_connect('localhost','root','','ecommerce');
	$sql="SELECT * FROM tbl_product as p INNER JOIN tbl_order as o ON o.product_id = p.id WHERE o.id=".$id;
	$result=mysqli_query($link,$sql);
?>
<?php
		while($row=mysqli_fetch_assoc($result))
		{
?>
    <form  action= "update.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>" />
	<table>
    	<tr> 
            <th align="justify"></th><td align="justify"><input type="hidden" name="pname" value="<?=$row['product_name']?>" class="form-control" /></td>	
        </tr>
       	<tr>
        	<th align="justify">Quantity:</th><td align="justify">
            <select name="qty">
            <?php
			$i=1;
				while($i<51){
			?>
				<option><?=$i; $i++; ?></option>            
            <?php } ?>
            </select>
        </tr>
        <tr>
        	<th align="justify"></th><td align="justify"><input type="hidden" name="price" value="<?=$row['price']?>" class="form-control" /></td>
        </tr>
        <!--<tr>
        	<th align="justify">Total:</th><td align="justify"><input type="number" name="total" value="<?=$row['total']?>" class="form-control" /></td>
        </tr>-->
        <tr> 
            <th align="justify"></th><td align="justify"><input type="hidden" name="cname" value="<?=$row['customer_name']?>" class="form-control" />
            </td></tr>
		<tr> 
            <th align="justify">Delivery Address:</th><td align="justify"><input type="text" name="caddress" value="<?=$row['customer_address']?>" required class="form-control" />
            </td></tr>
         <tr>
        
			<th align="justify">Contact:</th><td align="justify"><input type="number" name="contact" value="<?=$row['contact']?>" class="form-control" /></td>
        </tr>   	
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success" /></td>
        </tr>
     </table>
</form>
		<?php } ?>