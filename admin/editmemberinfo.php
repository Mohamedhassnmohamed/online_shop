<?php
session_start();
include_once("config.php");

$id=$_POST["sid"];
$name = $_POST["name"];
$password=$_POST["password"];
$email=$_POST["email"];
$type=$_POST["type"];

$query = "UPDATE `users` SET `name` = '".$name."',`password` = '".$password."' , `email` = '".$email."' ,type= '".$type."' WHERE `id` = '".$id."' ;";

if ($con->query($query ) === TRUE) {
	
  echo "<script>alert('تم تعديل بياناتك بنجاح')</script>;";
  echo "<script>window.location='roles.php';</script>;";
} 

$con->close();
?>


