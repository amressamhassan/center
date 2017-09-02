<?php 




   include 'include/header.php';  
  
   
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
  include '../clasess/sitting.php'; 
    include '../clasess/validation.php'; 
   if(isset($_POST['submit'])){
	$sitting= new  sitting;
	$val= new  validation;

	$sitting->set_center_desc( $_POST['des']);
	$sitting->set_center_name( $_POST['center_name'], $val);
	$sitting->set_center_phone( $_POST['center_phone'], $val);
	$sitting->set_center_title( $_POST['Title'], $val);
	$sitting->set_center_url( $_POST['url']);
	$sitting->set_facebook_url( $_POST['face']);
	
  if($sitting->update_info($sitting->get_center_name(), $sitting->get_center_phone(), $sitting->get_center_title(), $sitting->get_center_desc(), $sitting->get_center_url(), $sitting->get_facebook_url()))
  {
  	HEADER ("location:index.php");
  }
	}

  ?>
    <div class="page-title" dir="rtl">
    	
        <div class="container">
        	<center><h1> االاعدادات <a href="users.php" class="btn btn-success lg">اضف مدير جديد  <i class="fa fa-plus"></i></a> </h1></center>
        </div>
        
    </div><!-- /page-title -->
         <br>
        <center>
  			<div class="container" dir="rtl">       
         
        <form  class="sitting"  method="post" action="">
 

   <table class="table" width="100%">
   	<tr>
   		<td><label>ااسم المركز</label>
          <input type="text"  name="center_name"  value="ديار" class="form-control"/></td>
        <td><label>رقم تلفون المركز</label>
         <input type="text"  name="center_phone"  value="01425472" class="form-control" /></td>
   	</tr>
   	  	<tr>
   		<td><label> صفحه المركز على الفيس بوك </label>
          <input type="text"  name="face"  value="www.facebook.com" class="form-control"/></td>
     <td><label> url الخاص بمركز</label>
          <input type="text"  name="url"  value="dyar@helwansoft.com" class="form-control"/></td>
   	</tr>
   	<tr>
   	<td><label>عنوان المركز</label>
         <textarea  name="Title" class="form-control"  rows="4" required   >  3 شارع محمدي علي المتفرع من شارع التحرير العباسه</textarea></td>
   	<td>
          <label>وصف  المركز</label>
               <textarea  name="des" class="form-control"  rows="4" required   > مركز ديار التعليمي  للطلاب يقوم بالعديد من الأنشطه التعليميه</textarea> </td>
   		
   	</tr>
   	
   </table>
			
		
		     
             
         <br><br>


<center><button name="submit" class="btn btn-lg btn-primary" type="submit">تغيير</button></center>
         </form>

         
        
    	</div><!-- /container -->
    </center>
       
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    