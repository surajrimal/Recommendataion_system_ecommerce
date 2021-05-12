
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="firm, product, company, tashkent" />
<meta name="description" content="Something about comp" />  
<meta name="author" content="Muslim V">
<META name="ROBOTS" content="INDEX,FOLLOW" />

<title>Welcome to E-commerce Site </title>

<script src="temp/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script src="temp/js/html5.js" type="text/javascript"></script>
<script src="temp/js/script.js" type="text/javascript"></script>
<link href="temp/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="temp/plugins/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<script src="temp/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="temp/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<link href="temp/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="temp/plugins/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="temp/plugins/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="temp/plugins/flexslider/jquery.flexslider.min.js" type="text/javascript" ></script>
<link href="temp/plugins/flexslider/flexslider.css" rel="stylesheet" type="text/css">
<link href="temp/css/default.css" rel="stylesheet" type="text/css">
<link href="temp/css/buttons-links.css" rel="stylesheet" type="text/css">
<link href="temp/css/forms.css" rel="stylesheet" type="text/css">
<link href="temp/css/mystyle.css" rel="stylesheet" type="text/css">
<link href="temp/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" >
<script type="text/javascript">
$(document).ready(function() {
	
});
</script>

</head>
<body>

<!-- main wrap start -->
<div class="main-wrap">
<!-- header start --> 
<header id="header">
<!-- container start -->
<div class="container">
<div class="row">
	<div class="col-xs-4">
<div class="brand">	
	<a href="index.php"> 
	<img src="temp/img/logo.png" class="logo" alt="Site home page" title="Site logo" /></a>
	<div class="band-text">
	<h1>E-commerce World</h1>
		<!--slogan-->
        <h6>Shop to satisfaction & feel the difference..</h6>
	</div>
</div>
	</div>
	<div class="col-xs-4">
		
<!-- search -->
<form method="post" action="search.php" class="mt15">
<div class="input-group">
<input type="text" placeholder="I am shopping for..." class="form-control" name="search">
<span class="input-group-btn"> <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button> </span>

</div>
</form>
	</div>
		<div class="col-xs-4">
	
<div class="pull-right dropdown blok-user">
<?php
	session_start();
	$link=mysqli_connect('localhost','root','','ecommerce');
	if(!isset($_SESSION['session_id'])){
		//include("../function.php");
		//include(SITE_ROOT.DS.'includes'.DS.'function.php');
		$ip= get_ip_address();
		$_SESSION['ip_address']= $ip;
		$sql="INSERT INTO `tbl_session`(`ip_address`) VALUES ('$ip')";
		//$result=mysqli_query($link,$sql);
		if (mysqli_query($link, $sql)) {
		$session_id = mysqli_insert_id($link);
		$_SESSION['session_id']= $session_id;
		$_SESSION['cus_id'] = 1;
		echo "ID: " . $session_id;
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}

		
	}
	if(!isset($_SESSION['email'])&&isset($_SESSION['customer_name'])){
			echo $_SESSION['customer_name']."<br>";
?>
		<a href="user_backend/order_display.php" target="_blank">View My Ordered item</a><br>
		<!---<a href="login/cust_logout.php"><b>Session out</b></a>      --> 
<?php
		}


	if(isset($_SESSION['email'])){
			echo $_SESSION['customer_name']."<br>";
?>
		<a href="user_backend/order_display.php" target="_blank">View My Ordered item</a><br>
		<a href="login/cust_logout.php"><b>Logout</b></a>       
<?php
		}else{ ?>
	<p class="clearfix"> <!--<img src="temp/img/reg.png" alt="" class="fl p3">-->  <a href="register.php">Sign Up Now</a>
	 <!--  dropdown form start -->
		<p class="dropdown-toggle" data-toggle="dropdown"> <img src="temp/img/login.png" alt="" class="fl p3"> <a href="cabinet.php" >Log In <strong class="caret"></strong> </a></p>
		<div class="dropdown-menu"  style="padding:10px; margin-top:-7px; border-top:0; border-left:0; border-top-left-radius:0; width:220px;">
			<form method="post" action="login/cust_login.php" accept-charset="UTF-8">
			<div class="form-group">
				<input class="form-control" type="email" placeholder="example@mail.com" id="email" name="email">
			</div>
			<div class="form-group">
				<input class="form-control"  type="password" placeholder="password" id="password" name="password">
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-block" type="submit" name="login" id="sign-in" value="Log In">
				</div>
			</form>
		</div>
<?php
			}
?>
</div> 	  <!--  //blok-user -->

	
	</div>

</div><!-- row //  -->
    
</div><!-- container //  -->
 
</header>