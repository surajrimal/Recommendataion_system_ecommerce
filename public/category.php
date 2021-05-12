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


<!-- right side finish -->


<!-- product -->
<?php 
$get=$_GET['cate'];
 // $sql = "SELECT * FROM tbl_product WHERE category='$get' ORDER BY RAND() LIMIT 0,50";
$sql = "SELECT * FROM tbl_category as c INNER JOIN tbl_product as p ON p.category_id = c.id
 WHERE p.status='ON' AND c.category='$get' ORDER BY RAND() LIMIT 0,50";
  $result = mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
?>
	<div class="col-xs-6 col-sm-4 col-lg-4">
<figure  class="prod-box">
	<div class="img-holder">
	<a href="#">
	<img src="image/<?=$row['image']?>" class="item-img-1" alt="<?=$row['product_name']?>">
	</a>
	
	<!-- hover --> 
		<div class="blok-hover">
		<a class="fancybox" href="image/<?=$row['image']?>" data-fancybox-group="gallery">
			<i class="fa fa-plus"></i> Zoom
		</a>
		</div>
	<!-- hover// -->
	
	</div><!-- img-holder// -->
	<figcaption class="anons">
		<p class="title"><a href="#"><?=$row['product_name']?></a></p>
		<p class="price"><?="Rs. ".$row['price']." /-"?></p>
		<hr>
		<span class="info">We can deliver anywhere anytime in Nepal.</span>
		<div class="action">
		<a class="btn  btn-order btn-sm" href="product.php?pid=<?=$row['id']?>"> Order now</a>
		</div>
	</figcaption>
</figure>
	</div>
 <?php } ?>
 <!-- col// -->
<!-- product // -->
</div><!-- row // -->
</div>
<?php include_layout_template('footer.php'); ?>