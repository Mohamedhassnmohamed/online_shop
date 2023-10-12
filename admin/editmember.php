<!doctype html>
<?php
session_start();
if(!isset($_SESSION['user_id']))  
     header("Location:../index.php");  
if($_SESSION['type']=="user") 
     header("Location:../index.php");

  
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
                      

		</div>
			</div>
				</div>
					</div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="text-center" style="background-color: #cce5ff;border-color: #b8daff;border: 5px solid transparent;border-radius: .25rem;color:black;font-size: 30px;line-height: 40px;    font-family: 'Circular Std Book';font-weight: bold;'">صفحة تعديل بيانات حساب </h2>
                                
                            </div>
                        </div>
                    </div>
					<hr/>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
<?php

include_once("config.php");
$id_staff=$_GET["eid"];
$sql = "SELECT * FROM users WHERE id='$id_staff'";
$result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);
 $name=$row['name'];						
$email = $row['email'];
$password = $row['password'];
$type = $row['type'];
  
?>
                       
                        <div class="row">
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" dir=rtl>
                               <form enctype="multipart/form-data" method="post" action="editmemberinfo.php" autocomplete="off">
    <div class="card" dir="rtl">
    <h5 class="card-header" class="text-right" style="text-align: right;color: #004085; font-family: 'Circular Std Book'; font-style: italic; border: 1px solid transparent; background-color: #f8d7da; border-color:#f5c6cb; border-radius: .25rem; font-weight: bold;">
            تعديل معلومات العضو &#1575;&#1604;&#1575;&#1578; &#1575;&#1604;&#1575;&#1578;&#1610;&#1607;
        </h5>
        <div class="card-body" style="text-align: right;">

            <div class="form-group" dir="rtl" style="text-align: right;">
                <label for="inputText3" class="col-form-label">اسم العضو:</label>
                <input id="inputText3" style="text-align: right;" name="name" value="<?php echo $name; ?>" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="inputText3" class="col-form-label">البريد الإلكتروني:</label>
                <input id="inputText3" style="text-align: right;" name="email" type="text" class="form-control" value="<?php echo $row["email"]; ?>">
            </div>

            <div class="form-group">
                <label for="inputText3" class="col-form-label">كلمة المرور:</label>
                <input id="inputText3" style="text-align: right;" name="password" type="text" class="form-control" value="<?php echo $row['password']; ?>">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label" style="text-align: right;">نوع الحساب</label>
                <select class="form-control form-control-sm" name="type" required>
                    <option value="<?php echo $type; ?>" selected><?php echo $type; ?></option>
                    <option value="student">مستخدم</option>
                    <option value="admin">أدمن</option>
                </select>
            </div>
            <input type="hidden" name="sid" value="<?php echo $id_staff; ?>">
            <button type="submit" class="btn btn-space btn-primary" style="height: 53px; width: 140px; margin-top: 20px; margin-right: 500px;">تعديل</button>
        </div>
    </div>
</form>
							
							
							
							
							
							
                            <!-- ============================================================== -->
                            <!-- end alignment  -->
                            <!-- ============================================================== -->
                           
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
	
	  </div>
	 </div>
	  </div>
	 </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>