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
	    <link rel="stylesheet" href="assets/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example3').DataTable();
} );
$(document).ready(function() {
    $('#dataTables-example4').DataTable();
} );

</script>
	<script>



</script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
                                            

        
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->

         <div class="nav-left-sidebar sidebar-dark">

        </div>
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
                                <h1 class="pageheader-title" style="text-align:center;font-size:35px;background-color: #f8d7da;border: 5px solid transparent;border-radius: .25rem;color: MediumSeaGreen;font-family: 'Circular Std Book';line-height: 40px;;font-weight: bold;" >صفحة الأعضاء</h1>
                               
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                       
                        <div class="row">

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                         
		
		         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" dir=rtl>
                        
                          <div class="card" dir=rtl>
                           <h1 class="card-header" style="text-align:center;color:red;font-style: normal;font-family: 'Circular Std Book';font-weight: bold;">بيانات كافة الأعضاء</h2>
                              <div class="table-responsive" dir=rtl>       
                                <table id="dataTables-example3" class="table table-striped table-bordered table-hover"  dir=rtl>
                                    <thead style="background-color: DodgerBlue;font-size:20px; ">
                                        <tr>
											<th style="text-align: center;">الأسم</th>
										    <th style="text-align: center;">الإيميل</th>
											<th style="text-align: center;">الرقم السري</th>	
											<th style="text-align: center;">نوع الحساب</th>
											<th style="text-align: center;">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									include_once("config.php");
                                    $sql = "SELECT * FROM users order by type";
                                    $result = mysqli_query($con,$sql);
if($result){



										while($row = mysqli_fetch_array($result))
										{
										$id=$row["id"];
										$name=$row['name'];	
										$email = $row['email'];
                                        $password = $row['password'];
                                        $type = $row['type'];

												if($type=="admin")
												$type="Admin";
												else if($type=="student")
												$type="student";
											
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
												    <td style='text-align: center;'>".$name."</td>
													<td 'text-align: center;'> ".$email ."</td>
													<td 'text-align: center;'> ".$password ."</td>
<td 'text-align: center;'> ".$type."</td><td style='text-align: center;'><a href=editmember.php?eid=".$id ." <button class='btn btn-primary' > <i class='fa fa-edit' ></i> تعديل</button></td>";


												
													echo "</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td style='text-align: center;'>".$name."</td>
													<td 'text-align: center;'> ".$email ."</td>
													<td 'text-align: center;'> ".$password ."</td>
<td 'text-align: center;'> ".$type."</td><td style='text-align: center;'><a href=editmember.php?eid=".$id ." <button class='btn btn-primary' > <i class='fa fa-edit' ></i> تعديل</button></td>";


												
													echo "</tr>";
											}
										}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            
                            </div>
                    </div>
					
					
					
					
					
		
					<br><br><br>


	

<!-- Modal -->

        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
	
	

   
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
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

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery-3.5.1.js"></script>
</body>
 
</html>