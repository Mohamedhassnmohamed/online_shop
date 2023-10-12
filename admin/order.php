<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'المنتج أضيف بالفعل إلى عربة التسوق!';
   }else{
      mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'المنتج يضاف الى عربة التسوق!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($con, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'تم تحديث كمية سلة التسوق بنجاح!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>عربة التسوق</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <style>
   #aa{
            margin-left: 70px;
            text-decoration: none;
            box-shadow: 1px 1px 1px 3px silver; 
      }
        </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
   <a id="aa" calss="navbar-brand" href="index.php">إلى صفحه إضافه المنتجات</a>
</nav>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">

<div class="user-profile">

<?php
$select_user = mysqli_query($con, "SELECT * FROM `users`") or die('query failed');
$num_users = mysqli_num_rows($select_user);

if ($num_users > 0) {
    echo "عدد المستخدمين: " . $num_users;
    /*
    while ($fetch_user = mysqli_fetch_assoc($select_user)) {
        ?>
        <p>طلب المستخدم: <span><?php echo $fetch_user['name']; ?></span></p>
        <?php
        
    }*/
} else {
    echo "عدد المستخدمين 0.";
}
?>
   
   <div class="flex">
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');" class="delete-btn">تسجيل الخروج</a>
   </div>

</div>




<!--hhhhhhhhhhh-->
<div class="shopping-cart">

   <h1 class="heading"> عربة التسوق</h1>

   <table>
   <thead>
   <th>الصورة</th>
   <th>الاسم</th>
   <th>السعر</th>
   <th>العدد</th>
   <th>السعر الكلي</th>
   <th>العمل</th>
   <th>اسم المستخدم</th>
</thead>
<tbody>
<?php
$select_users = mysqli_query($con, "SELECT * FROM `users`") or die('Query failed');
if (mysqli_num_rows($select_users) > 0) {
    while ($fetch_user = mysqli_fetch_assoc($select_users)) {
        $user_id = $fetch_user['id'];
        $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Query failed');
        $grand_total = 0;
        if (mysqli_num_rows($cart_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                <tr>
                <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" width="100" alt=""></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td><?php echo $fetch_cart['price']; ?>$ </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" name="update_cart" value="تعديل" class="option-btn">
                        </form>
                    </td>
                    <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
                    <td><a href="delcart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('إزالة العنصر من سلة التسوق؟');">حذف</a></td>
                    <td><?php echo $fetch_user['name']; ?></td>
                </tr>
                <?php
                $grand_total += $sub_total;
            }
            ?>
            <tr>
                <td colspan="4" align="right">المجموع الكلي:</td>
                <td><?php echo $grand_total; ?>$</td>
                <td></td>
                <td></td>
            </tr>
            <?php
        } else {
           // echo "<tr><td colspan='7'>No cart items found for this user.</td></tr>";
        }
    }
} else {
    echo "<tr><td colspan='7'>No users found.</td></tr>";
}
?>
</tbody>
   </table>



</div>

</div>
<center>
<h2><a href="../admin/index.php">الرجوع الى الصفحه الرئسيه</a></h2>
</center>


</body>
</html>