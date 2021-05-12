<?php require_once("../includes/initialize.php"); ?>
<?php include_layout_template('header.php'); ?>

<!-- topbar -->
<section>
<!-- container start -->
<div class="container">
<div class="row">
<div class="col-sm-3">
<h3 class="title-sidebar"> <i class="glyphicon glyphicon-list"></i> Categories</h3>
</div>
</div><!-- //row -->
</div><!-- container //  -->
</section>
<!-- topbar // -->

<!-- content start -->
<div class="content">

<!-- container start -->
<div class="container">

<div class="row">
<!-- left side start -->
<div class="col-sm-3">
<aside>

<section class="blok">

<div class="left-menu">
		<ul>
        <?php
		$sql="SELECT * FROM tbl_category";
		$result = mysqli_query($link, $sql);
		while($row=mysqli_fetch_assoc($result)){
		?>
			<li><a href="category.php?cate=<?=$row['category'];?>"><?=$row['category'];?></a> </li>
			<?php } ?>
		</ul>
</div>
    
</section>
</aside>
</div>
<!-- left side finish -->

<!-- right side start -->
<div class="col-sm-9">

<section class="blok mt7">

<!-- flex slider  -->
<div class="slide-top">

<div class="flexslider">
  <ul class="slides relative">
  <?php if(!isset($_POST['submit'])){ ?>
  <?php 
  $get=$_GET['pid'];
  $sql = "SELECT * FROM tbl_product where id=".$get;
	//$sql = "SELECT * FROM tbl_category as c INNER JOIN tbl_product as p ON p.category_id = c.id
 //WHERE where c.id=".$get;
  
  $result = mysqli_query($link,$sql);
  $row=mysqli_fetch_assoc($result);
  ?>
    <div class="col-lg-4 thumbnail">
      <img src="image/<?=$row['image'];?>" /> 
    </div>
      <div class="panel-body">
      <h1><?=$row['product_name'];?></h1><br>
      <h3>Rs. <?=$row['price'];?></h3><br>
      <h3>Product Details:</h3>
      <p><?=$row['description'];?></p>
      <hr>
      </div>
      <form method="post">
      <table>
		<tr> 
            <th align="justify"></th><td align="justify"><input type="hidden" name="cid" value="<?=$row['category_id'];?>" class="form-control" /></td>	
        </tr>
    	<tr> 
            <th align="justify"></th><td align="justify"><input type="hidden" name="pid" value="<?=$row['id'];?>" class="form-control" /></td>	
        </tr>
		<tr> 
            <th align="justify"></th><td align="justify"><input type="hidden" name="pname" value="<?=$row['product_name'];?>" class="form-control" /></td>	
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
            
            </td>
        </tr>
        <tr>
        	<th align="justify"></th><td align="justify"><input type="hidden" name="price" value="<?=$row['price'];?>" class="form-control" /></td>
        </tr>
        <tr> 
            <?php
			if(isset($_SESSION['customer_name'])){
			?>
            <th align="justify">Name:</th><td align="justify"><input type="text" name="cname" value="<?=$_SESSION['customer_name'];?>" class="form-control" /></td>
            <?php
			}else{
				?>
            <th align="justify">Name:</th><td align="justify">
			
			<input type="text" name="cname" value="" placeholder="Type your name" class="form-control" /></td>
				<?php
				}
			?>
            </tr>
		<tr> 
            <th align="justify">Delivery Address:</th><td align="justify">
			<?php
			if(isset($_SESSION['address'])){
			 ?>
			<input type="text" name="caddress" value="<?=$_SESSION['address'];?>" required class="form-control" />
            <?php
			}else{
				?>
                <input type="text" name="caddress" value="" required class="form-control" />
                <?php
				}
			?>
			</td></tr>
         <tr>
			<th align="justify">Contact</th><td align="justify">
			<?php
			if(isset($_SESSION['contact'])){
			 ?>
             <input type="text" name="contact" value="<?=$_SESSION['contact'];?>" required class="form-control" />
             <?php
			}else{
				?>
                <input type="text" name="contact" value="" required class="form-control" />
                <?php
				}
			?>
            </td>
        </tr>   	
        <tr>
        	<td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-success"/></td>
        </tr>
     </table>
      </form>
  <?php } ?>
<?php
if(isset($_POST['submit'])){
		$pid=$_POST['pid'];
		$product_name=$_POST['pname'];
		$_SESSION['pid'] = $pid;
		$cid= $_POST['cid'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$total=$qty*$price;
		$cname=$_POST['cname'];
		$_SESSION['customer_name']=$cname;
		$caddress=$_POST['caddress'];
		$_SESSION['address']=$caddress;
		$contact=$_POST['contact'];
		$_SESSION['contact']=$contact;
		$sesid= $_SESSION['session_id'];
		$cusid= $_SESSION['cus_id'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="INSERT INTO `tbl_order`(`quantity`, `total`, `product_id`, `category_id`,`session_id`, `customer_id`, `customer_name`, `customer_address`, `contact`)
		VALUES ('$qty','$total','$pid','$cid','$sesid','$cusid','$cname','$caddress','$contact')";
		$result=mysqli_query($link,$sql);
		if($result){
			echo "<span style='background-color:green; color:white;'>"."{$product_name} has been Successfully Ordered!"."</span>";
			//$message = "Successfully Ordered";
			//display($message);
			$array1 = recommender();
			if(!isset($array1)){
				echo "Product has not successive pattern";
			}else{
				
				recommend_frame($array1);
			}
			
		}else{
			echo "<span style='background-color:green; color:white;'>"."not Ordered!"."</span>";
			
		$message =  mysqli_error($link);
		$message .= "Not Ordered";
		display($message);
		}


	}
  ?>
  </ul>
</div>
</div>
</section>
</div>
<!-- right side finish -->
</div> <!-- row// -->
<div class="row">
</div>
<?php include_layout_template('footer.php'); ?>