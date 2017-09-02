<!--A Design by Helwansoft
Author: Eng- Ahmed Khaled
Author URL: http://helwansofts.com
 
-->
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
 $timetable=new timetable;
 $control=new control; 
 $amra=new url; 
  $admin=new admin; 

$amra->connect();

$a=$admin->alrt($_SESSION['id']);
while($row=mysql_fetch_array($a)){
	$alrt=$row['alert'];
	   echo " <script>alert('".$alrt."')</script>" ;
	   if(!($row['id_alert']==4)){
	  $admin->alrt_d($row['id']);
	   }
	   
}

$re=$control->show_day("reserve_teacher");
while($row=@mysql_fetch_array($re)){

if(!($control->dateline_calu($row['id_data_line'])))
{
 if($timetable->set_Start($row['start']))
 {
 	//echo $row['start'] ; 
    if($timetable->set_End_sa($row['end']))
    {
    	//echo $row['end'] ; 
      if($timetable->set_hall_num($row['hall']))
      {
      	//echo $row['hall'] ; 
         if($timetable->set_id_day($row['day']));
      }
    }
 }
 $timetable->Re_Scheduling_up($row['id_time']);
 $timetable->dele_Re_Scheduling_($row['id_time']);
 
}

 }

?>
<html>
<head>
<title>مركز ديار التعليمي</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 
 
 
 

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
							<?php
							$r=$amra->show_url($_SESSION['type'],1);
							while($row=mysql_fetch_array($r)){
											if(!($row['id']==4)){
							?>
				<li><a href="<?php echo $row['url'];?>"><?php echo $row['link_play'];?></a></li>
								<?php
							}}
							?>
							
								<li><a href="contact.php" >أتصل بنا</a></li>
								<li class="login" >
									<div id="loginContainer"><a href="#" id="loginButton"><span> <?php echo $_SESSION['name']; ?> </span></a>
						                  <div id="loginBox">                
						                    <form id="loginForm">
						                        <fieldset id="body">
						     	<?php
							$r=$amra->show_url($_SESSION['type'],4);
							while($row=mysql_fetch_array($r)){
								if(!($row['id']==13)){
							?>
						                            <fieldset>
						                               <span><a href="<?php echo $row['url'];?>"><?php echo $row['link_play'];?></a></span>
						                                 
						                            </fieldset>
													
															<?php
							}}
							?>
													
						                           
						                            <a href="logout.php" id="login" name="login" >تسجيل الخروج </a>
						                          
						                        </fieldset>
						                       
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
     