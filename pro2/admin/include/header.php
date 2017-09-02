 <?php
 
 if(!isset($_SESSION)){
 session_start(); 
	 include '../clasess/interface.php';
   include '../clasess/user.php';
         include '../clasess/timetable.php';

      include '../clasess/database.php';
  include '../clasess/admin.php';
    include '../clasess/control.php';

      $amr=new timetable;
      $amr->connect();
 }
 ?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 sans BOM" />
<title> نظام اداره مركز ديار التعليمي</title>

    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/metro-bootstrap.css">
    <link rel="stylesheet" href="css/rtl.css">

</head>

<body onload="startTime()">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
        	<center>
        		<li class="menu"><a href="index.php"> الرئيسية  </a> <i class="fa fa-home"></i></li>
        		<li class="menu"><a href="student_list.php">إداره الطلاب  </a> <i class="fa fa-user"></i></i></li>
           
                <li class="menu"><a href="teacher_list.php">  إداره المعلمين </a>  <i class="fa fa-graduation-cap"></i></li>     
               <li class="menu"><a href="control_r.php"> ادارة القاعات </a>  <i class="fa fa-graduation-cap"></i></li>     
              <li class="menu"><a href="att1.php"> الحضور والغياب </a>  <i class="fa fa-graduation-cap"></i></li>     
             
				<li class="menu"><a href="timetable.php"> إداره مواعيد الدروس  </a> <i class="fa fa-clock-o"></i> </li> 
			  <li class="menu"><a href="adds_list.php"> إدارة  الإعلانات  </a>  <i class="fa fa-picture-o"></i></li> 
                <li class="menu"><a href="Trips.php"> إدارة الأنشطه  </a> <i class="fa fa-bell-o"></i> </li> 
                 <li class="menu"><a href="trips_list.php"> إدارة  الرسائل  </a>  <i class="fa fa-envelope-o"></i> </li> 
				   
                  <li class="menu"><a href="sitting.php">  إداره  النظام  </a> <i class="fa fa-cogs"></i></li> 
				  <li class="menu"><a href="statistics.php">     الإحصائيات  </a> <i class="fa fa-chaet"></i></li> 
                 
                  <a href="logout.php" style="width: 100%;" class="btn btn-danger"> <i class="fa fa-sign-out"></i> خروج</a>
                   <div id="time"></div>
        	</center>
        	 
                   
        </div>
<div class="col-sm-10">
	<div class="header_top">
		<a style="float: left; margin-left: 30px;" href="admin_profile.php"><img src="img/user.png" width="50" height="50" /></a>
		<div class="row">
			<div class="col-sm-6"><h4> مرحبا بك  : <a href=""> المدير<?php echo $_SESSION['name'];?></a> || أخر دخول لك علي النظام <?php echo "<br>".$_SESSION['today'];
				?> </h4> </div>
			<div class="col-sm-2"><h4>    </h4> </div>
		</div>
		 
		
	</div>
          
         
     


