<?php require_once("../includes/initialize.php"); ?>
<?php include_layout_template('header.php'); ?>
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
  <?php 
  $sql = "SELECT * FROM tbl_slider ORDER BY id DESC LIMIT 0,5";
  $result = mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
  ?>
    <li>
      <img src="slider/<?=$row['image'];?>" /> 
    </li>
	<?php
  	}
  ?>
  </ul>
</div>

</div>
</section>
</div>
</div>
<?php
if(isset($_SESSION['email'])){
	$array1 = cus_recommender();
	if(isset($array1)){
	recommend_frame_cus($array1);
}}
	$array2 = recommender();
	recommend_frame($array2);

?>
<section class="panel panel-default">
<div class="panel-heading cfx">
	<h3 class="title-content pull-left"> Latest items </h3>
</div>
<!-- panel body -->
<div class="panel-body">

<div class="row">
<!-- product -->
<?php 
  $sql = "SELECT * FROM tbl_product WHERE status='ON' ORDER BY id DESC LIMIT 0,4";
  $result = mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
?>
<div class="col-xs-6 col-sm-3 col-lg-3">
<figure  class="prod-box-1">
	<div class="img-holder">
	<a href="product.php?pid=<?=$row['id']?>">
<img src="image/<?=$row['image']?>" class="item-img-1" alt="<?=$row['product_name']?>">
	</a>
	</div> <!-- img-holder// -->
	<figcaption class="anons">
		<p class="product"><?=$row['product_name']?></p>
        <p class="price"><?="Rs. ".$row['price']."-/ only."?></p>
		<p class="deatail"><a href="#"><?=$row['description']?></a></p>	
	</figcaption>
</figure>
	</div>
<?php } ?> 
</div>
</div>

</section>
<?php
		$sql="SELECT * FROM tbl_category";
		$result = mysqli_query($link, $sql);
		while($row=mysqli_fetch_assoc($result)){
			section($row['category'],$row['category']);
		 }
 ?>
<?php include_layout_template('footer.php'); ?>