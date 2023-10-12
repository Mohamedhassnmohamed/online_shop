<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope online | اضافة منتجات</title>
    <link rel="stylesheet" href="index.css">
    <style>
            #aa{
            margin-left: 70px;
            text-decoration: none;
            box-shadow: 1px 1px 1px 3px silver; 
            
            }
    </style> 
</head>
<body>


<a id="aa" calss="navbar-brand" href="../login.php">إلى صفحه تسجيل الدخول </a>
<br>
<a id="aa" calss="navbar-brand" href="roles.php">إلى صفحه الإعضاء</a>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>موقع تسويقي اونلاين</h2>
                <img src="logo.png" alt="logo" width="450px">
                <input type="text" name='name' placeholder="أدخل اسم المنتج" dir=rtl>
                <br>
                <input type="text" name='price' placeholder="أدخل سعر المنتج" dir=rtl>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file" style="background-color:#3E529C;"> اختيار صورة للمنتج</label>
                <button name='upload'>رفع المنتج ✅</button>
                <br><br>
                <a href="order.php" style="font-weight: bolder; border: 2px solid gray;">الطلبات</a>
                <br>
                <br>
                <a href="products.php" style="font-weight: bolder; border: 2px solid gray">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developer By Mohamed & Shahd</p>
    </center>
</body>
</html>