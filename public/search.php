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
<div class="row">
<!-- product -->
<?php 
  $search = $_POST['search'];
  $sql = "SELECT DISTINCT * FROM tbl_category as c INNER JOIN tbl_product as p ON c.id= p.category_id WHERE p.product_name LIKE '%$search%' OR p.description LIKE '%$search%' OR c.category LIKE '%$search%' ORDER BY RAND() LIMIT 0,50";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result);
  if($count!=0){
  while($row=mysqli_fetch_assoc($result)){
?>
	<div class="col-xs-6 col-sm-4 col-lg-3">
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
 <?php 
 }
  }else
  { echo "Result doesn't found !";}?>
 <!-- col// -->
<!-- product // -->
</div><!-- row // -->




</section>
</div>
<!-- right side finish -->
</div> <!-- row// -->
<?php include_layout_template('footer.php'); ?>