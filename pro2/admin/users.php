<?php 
   include 'include/header.php';  
   include '../clasess/admin.php';
    include '../clasess/validation.php'; 
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   	if(isset($_POST['submit'])){
	$add= new  admin;
	$val= new  validation;	
	$add->connect();
	$add->set_name($_POST['username'], $val);
	$add->set_mail($_POST['email'], $val);
	$add->set_password($_POST['password'], $val);
  if($add->add_new_admin($add->get_name(), $add->get_mail(), $add->get_password()))
  {
  	HEADER ("location:index.php");
  }
	}
?> 
    <div class="page-title" dir="rtl">
    	
        <div class="container">
        	<center><h1> اضافه مدير جديد <i class="fa fa-plus"></i></h1></center>
        </div>
        
    </div><!-- /page-title -->
         <br>
        <center>
  			<div class="container" dir="rtl">       
         
        <form  class="sitting"  method="post" action="">

       <input type="text"  name="username" id="username" placeholder="اسم المستخدم" class="form-control" />
			<input type="text"  name="email"  placeholder="البريد الإليكتروني " class="form-control" />
          <input type="password"  name="password" id="password" placeholder="كلمة المرور" class="form-control" />
          <input type="password"  name="con_password" id="password" placeholder="تأكيد كلمه المرور" class="form-control" />

        

          


<center><input type="submit"  value="اضافة جديد " class="btn btn-lg btn-primary" name="submit"> </center>
         </form>

         
        
    	</div><!-- /container -->
    </center>
       
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    