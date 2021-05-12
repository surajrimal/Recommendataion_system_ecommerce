<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A complete E-commerce solution for your lifestyle.</title>
    <link href="../templete/css/bootstrap.min.css" rel="stylesheet">
    <link href="../templete/css/sb-admin.css" rel="stylesheet">
    <link href="../templete/css/plugins/morris.css" rel="stylesheet">
    <link href="../templete/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a>
                          <?PHP
            session_start();
		if(!isset($_SESSION['user_name'])){
			header('location:blank.php');
			}
?>
                <a class="navbar-brand" href="#"><?=$_SESSION['user_name']?> &nbsp;&nbsp;&nbsp;</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../templete/index.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i>Insert Form: <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../form/user_form.php">User</a>
                            </li>
                            <li>
                                <a href="../form/category_form.php">Category</a>
                            </li>
                            <li>
                                <a href="../form/product_form.php">Product</a>
                            </li>
                            <li>
                                <a href="../form/slider_form.php">Slider</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-table"></i> Display <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="../display/user_display.php">User</a>
                            </li>
                            <li>
                                <a href="../display/category_display.php">Category</a>
                            </li>
                            <li>
                                <a href="../display/product_display.php">Product</a>
                            </li>
                            <li>
                                <a href="../display/slider_display.php">Slider</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="../display/customer_display.php"><i class="fa fa-fw fa-bar-chart-o"></i> Customer Details</a>
                    </li>
                    <li>
                        <a href="../display/order_display.php"><i class="fa fa-fw fa-desktop"></i> Order Received</a>
                    </li>
                </ul>
            </div>
           </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row" style="min-height:1000px;">