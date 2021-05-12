<?php		
include('header.php');
$username = $_SESSION['user_name'];
echo "<h2>WELCOME {$username} </h2>";
include('footer.php');
?>