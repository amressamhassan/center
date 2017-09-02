<!--A Design by Helwansoft
Author: Eng- Ahmed Khaled
Author URL: http://helwansofts.com
 
-->
<?php

 //echo"<br><br><br><br><br><br><br><br><br><br><br><br><br>";
 ?>
<!DOCTYPE HTML>
<?php
include '../clasess/interface.php';
include '../clasess/user.php';
include '../clasess/database.php';
include '../clasess/url.php';
include '../clasess/admin.php';
include '../clasess/control.php';
include '../clasess/timetable.php';
include '../clasess/exam.php';
include '../clasess/teacher.php';
include '../clasess/question.php'; 
include '../clasess/mail.php';
include '../clasess/validation.php'; 
include '../clasess/student.php';
include '../clasess/upload.php';
  include '../clasess/info.php'; 
 $amra=new url; 
$amra->connect();
?>
<html>
<head>
<title>مركز ديار التعليمي</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 
 
 

<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="js/script.js"></script>
 <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
 <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
 <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
 
 <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
   <link href='loading/app.css' rel='stylesheet' />
   
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>    
</head>
<body>

  <div class="header" id="home">
  	
  	  <div class="header_top">
	   <div class="wrap">
	   	
		 	     <div class="logo">
						<a href="index.php"><img src="images/logo.png" alt="" /></a>
					</div>	
						<div class="menu">
						    <ul>
						    	<li class="current"><a href="index.php">الرئيسيه</a></li>
								<li><a href="teachers.php" >المدرسين</a></li>
								<li><a href="time-table.php" >مواعيد الدروس</a></li>
								<li><a href="contact.php" >أتصل بنا</a></li>
								<li class="login" >
									<div id="loginContainer"><a href="#" id="loginButton"><span> نسجيل الدخول</span></a>
						                <div id="loginBox">                
						                    <form action="login.php" method="post" id="loginForm">
						                        <fieldset id="body">
						                         
						                            <fieldset>
						                                <label for="email">البريد الإليكتروني</label>
						                                <input type="text" name="email"  value="">
						                            </fieldset>
						                            <fieldset>
						                                <label for="password">كلمة المرور</label>
						                                <input type="password" name="user_password" value="">
						                            </fieldset>
						                          
						                            <input type="submit" id="login" name="submit" value="تسجيل الدخول">
						                            <label for="checkbox"><input type="checkbox"> <i> تذكر دخولي</i></label>
						                        </fieldset>
						                        <span><a href="registration.php">أريد الحصول علي حساب جديد</a></span>
						                    </form>
						                </div>
						               </div>
								   </li>
								<div class="clear"></div>
							</ul>
						</div>							
	    		 <div class="clear"></div>
	        </div>
	    </div>
	 </div>			      	
