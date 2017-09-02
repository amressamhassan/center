<?php 
 include '../clasess/database.php';
 
    include '../clasess/admin.php';
	  include '../clasess/validation.php'; 
	   session_start();
if(isset($_SESSION['emil']))
{
	
	HEADER ("location:index.php");
} 
   //include 'include/header.php';  

	if(isset($_POST['submit'])){
	$log= new  admin;
			$val= new  validation;
	$log->connect();
	$log->set_email($_POST['email'],$val);
	$log->set_password($_POST['password'],$val);
	$logg=$log->login($log->get_email(),$log->get_password());

  if($logg==1)
  {
  	HEADER ("location:index.php");

  }
  else if($logg==2){
    HEADER ("location:../user/teacher/index.php");
  }
  else if($logg==3){
                 HEADER ("location:../user/student/index.php");
  }
	}
?> 
 <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/metro-bootstrap.css">
    <link rel="stylesheet" href="css/rtl.css">

 <div class="page-title">
        <CENTER>
             <h1> نظام اداره مركز ديار التعليمي </h1>
        </CENTER>
    </div><!-- /page-title -->
     
  <div class="page-title" dir="rtl">
        <div class="container">
        <center>	<h1> تسجيل الدخول </h1></center>
        </div>
    </div>
         <br>
        <center>
  			<div class="container" dir="rtl"> 
			<form   class="form-signin" role="form" action="" method="post">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="email" id="username" placeholder="البريد الإليكتروني"   />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="كلمة المرور" autocomplete="off" />
          </div>
        </div
        </label>
    <input name="submit" class="btn btn-lg btn-primary" value="دخول" type="submit">
          </form>
    	</div>
       </center> 
        </div>

        
 <?php include 'include/footer.php';  ?>
   