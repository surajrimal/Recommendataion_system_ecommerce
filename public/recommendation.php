<?php 
function recomend_frame($id){
?>
<section class="panel panel-default">
<div class="panel-heading cfx">
	<h3 class="title-content pull-left"> Recomended For You </h3>
</div>
<!-- panel body -->
<div class="panel-body">

<div class="row">
<!-- product -->
<?php 
  $sql = "SELECT * FROM tbl_product WHERE status='ON',id= $id";
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
}