<?php
include('config.php');
$ID=$_GET['remove'];
mysqli_query($con, "DELETE FROM cart WHERE id=$ID");
header('location: index.php')

?>