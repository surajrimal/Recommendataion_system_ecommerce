<?php require_once("db_connection.php"); ?>
<?php
function section($title, $category){
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	?>
<section class="panel panel-default">
<div class="panel-heading">
	<h3 class="title-content"> <?=$title ?> </h3>
</div>

<!-- panel body -->
<div class="panel-body">

<!-- flexslider -->
<div class="slide-items-top">
	<div class="flexslider">
<ul class="slides">
<?php 
$sql = "SELECT * FROM tbl_category as c INNER JOIN tbl_product as p ON p.category_id = c.id
 WHERE p.status='ON' AND c.category='$category' ORDER BY RAND() LIMIT 0,5";
  $result = mysqli_query($link,$sql);
  while($row=mysqli_fetch_assoc($result)){
  ?>
		<li>
<figure  class="prod-box prod-slide">
	<div class="img-holder">
	<a href="#">
	<img src="image/<?=$row['image']?>" alt="<?=$row['product_name']?>">
	</a>

		<div class="blok-hover">
		<a class="fancybox" href="image/<?=$row['image']?>" data-fancybox-group="gallery">
			<i class="fa fa-plus"></i> Zoom
		</a>
		</div>
	
	</div><!-- img-holder// -->
	<figcaption class="anons">
		<p class="product"><a href="#"><?=$row['product_name']?></a></p>
		<hr>
		<p class="price"><?="Rs.".$row['price']."/-"?></p>
		<a href="product.php?pid=<?=$row['id']?>" class="btn  btn-order btn-sm">Order now</a>
	</figcaption>
</figure>
		</li>
    <?php } ?>
</ul>
</div>

</div>

</div>

<div class="panel-footer"> 
<a href="category.php?cate=<?=$category ?>" class="btn btn-default">See more </a></div>
</section>
<?php
}

function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}
?>








<?php 
function recommend_frame($id){
?>
<section class="panel panel-default">
<div class="panel-heading cfx">
	<h3 class="title-content pull-left"> Recommended</h3>
</div>
<!-- panel body -->
<div class="panel-body">

<div class="row">
<!-- product -->
<?php 
	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  $sql = "SELECT DISTINCT * FROM tbl_product WHERE status='ON' AND id in ($id) ORDER BY RAND() LIMIT 0,8";
  $result = mysqli_query($link,$sql);
  if(!$result){
	  echo mysqli_error($link);
  }
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
 <?php }
 ?>
 
 
 
 <?php 
function recommend_frame_cus($id){
?>
<section class="panel panel-default">
<div class="panel-heading cfx">
	<h3 class="title-content pull-left"> Recommended products for you</h3>
</div>
<!-- panel body -->
<div class="panel-body">

<div class="row">
<!-- product -->
<?php 
	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  $sql = "SELECT DISTINCT * FROM tbl_product WHERE status='ON' AND id in ($id) ORDER BY RAND() LIMIT 0,4";
  $result = mysqli_query($link,$sql);
  if(!$result){
	  echo mysqli_error($link);
  }
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
 <?php }
 ?>