<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   $row = mysqli_fetch_array($select);
   //$count = mysqli_num_rows($select);



   if(mysqli_num_rows($select) > 0){
      $type1=$row["type"];
   
	   $_SESSION["name"]=$row["name"];
		$_SESSION["type"]=$row["type"];
		$_SESSION["user_id"]=$row["id"];
			
			 
			if($type1=='student'){  
			   header("location: index.php");
            exit();
         }else if($type1=='admin'){ 
		      header("location:admin/index.php");	
            exit();
  //header("location:../User/Reports.php");
	      }
     
   }else{
      echo "<script>alert('الرجاء التاكد من بيانات');</script>";
      
     }


}







?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      input{
         text-align: center;
      }
   </style>
</head>
<body>


<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">


   <form action="" method="post" style="width: 600px;border-radius: 5px; border: 1px solid black; padding: 20px; text-align: center; background-color: lightgray;">
      <h1>"مرحبا بك فى المتجر الالكترونى"</h1>
      <h3>تسجيل الدخول</h3>
      <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn" value="تسجيل الدخول">
      <p>هل تملك حساب بالفعل؟ <a href="register.php"> حساب جديد</a></p>
   </form>

</div>

</body>
</html>