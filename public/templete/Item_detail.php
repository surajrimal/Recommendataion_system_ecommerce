<?php
$link=mysqli_connect('localhost','root','','ecommerce');
$sql="SELECT * FROM tbl_product";
$result=mysqli_query($link,$sql);
?>
<html>
<head>
<title>
	Item Detail
</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
    	<div class="row well">
        	<h3>Item Details</h3>
        </div>
        <div class="col-md-6">
        	<img src="<"