<?php require_once("../../includes/initialize.php"); ?>
<?php include('header.php'); ?>
<body>
<div class="container">
<ul class="nav navbar nav-justified navbar-inverse">
	<li><a href="order_display.php">My Order</a></li>
    <li><a href="customer_display.php">My Profile</a></li>
</ul>
	<?php
		//session_start();
	if(!isset($_SESSION['email'])){
			redirect_to('index.html');
		}
		$ses=$_SESSION['email'];
		$link=mysqli_connect('localhost','root','','ecommerce');
		$sql="SELECT * FROM tbl_customer where email='$ses'";
		$result=mysqli_query($link,$sql);
	?>
	<table border="1" class="table table-striped">
    	<tr><th>SN</th>
        <th>Customer Name</th>
		<th>Email</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Update</th>
       <!--<th>Update</th>-->
      	</tr>
        <?php
			while($row=mysqli_fetch_assoc($result)){
		?>
		<tr><td><?=$row['id']?></td>
        <td><?=$row['first_name']." ".$row['last_name']?></td>
		<td><?=$row['email']?></td>
        <td><?=$row['customer_address']?></td>
        <td><?=$row['contact']?></td>
        <!--<td><a href="file:///C|/xampp/htdocs/ecommerce project/delete/customer_delete.php?getid=<?=$row['sn']?>">Delete</a></td>-->
        <td><a href="customer_update.php?getid=<?=$row['id']?>">Update</a></td>
		</tr>
        <?php
			}
		?>
	</table>
  </div>
  
  <script src="../temp/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
<?php include_layout_template('footer.php'); ?>