<?php 
session_start();
if(isset($_SESSION['customer_name'])){
session_destroy();
header('location:../index.php');
}

?>