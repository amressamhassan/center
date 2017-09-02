 <?php 
 include '../clasess/interface.php';
include '../clasess/user.php';
 include '../clasess/admin.php';
 session_start();
	$log= new  admin;
    $log->logout();
	
  ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8 sans BOM" />

   <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/metro-bootstrap.css">
    <link rel="stylesheet" href="css/rtl.css">
     <div class="page-title">
   <center>
  			<div class="container">
  				<h1>لقد تم تسجيل خروجك من النظام </h1>
  				</div>
  	</center>
  	</div>
  	<meta http-equiv="Refresh" content="2;URL=../project_SW/" />