<?php 

   include 'include/header.php';  
   
if(!isset( $_SESSION['emil']))
{
HEADER ("location:../project_SW/");
} 
   
?> 
    <style type="text/css">



    </style>

    <?php  

    include '../clasess/user.php'; 
   $user=new user;

   include '../clasess/student.php'; 
   $student=new student;
  ?> 
<div class="page-title" dir="rtl">
      
        <div class="container">
                <center>

<h1>نموذج الاستمارة</h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
   <?php 

if(isset($_POST['submit'])){

$user->set_name($_POST[ 'name' ]);
$user->set_email($_POST[ 'mail' ]);
$user->set_phone($_POST[ 'phone' ]);
$student->set_pphone($_POST[ 'pphone' ]);
$student->set_school($_POST[ 'school' ]);
$student->set_language($_POST[ 'language']);
$student->set_level($_POST[ 'level' ]);
$user->set_address_id($_POST[ 'address' ]);

$student->add_student($user->get_name(),$user->get_email(),$student->get_language(),$student->get_level(),$user->get_phone(),$student->get_pphone(),$student->get_school(),$user->get_address_id());

}

  ?>    	
        	
        	
        <form action="" method="post" id="registration_form">
        <table  width="70%" class="table">
            <tr>
                
                <td>
              <div class="input-group input">
                <input type="text" name="name" class="form-control" placeholder="اسم الطالب" required>
            </div></td>
               
                <td><div class="input-group input">
                <input type="text" class="form-control" name="mail" placeholder="البريد الالكترونى">
            </div></td>
            </tr>


             
               <tr>
                 
                <td><div class="input-group input">
                <input type="text" class="form-control" name="phone" placeholder="ت/الطالب">
            </div></td>
              
                <td><div class="input-group input">
                <input type="text" class="form-control" name="pphone" placeholder="ت/ولى الامر" required>
            </div></td>
            </tr>

            <tr>
                
                <td><div class="input-group input">
                <input type="text" class="form-control" name="school" placeholder="مدرسة الطالب" required>
            </div></td>
            
               <td><div class="input-group input">
               <select name="language" width="300" style="width: 150px" required>
                  <option  value="1">عربى
                        </option>
                         <option value="2">لغات
                        </option>
                        <option value="3">ازاهرى
                        </option>
               </select>
            </div></td>
            </tr>
            
             <tr>
             	 
        
                <td><div class="input-group input">
                <select name="level" width="300" style="width: 150px" required>
         <?php
         	$sql = "SELECT id,level FROM level";
		$qu  = mysql_query($sql);
		 
          while($dnn=mysql_fetch_array($qu)){
 ?>
 
 	 <option value="<?php echo $dnn['id']; ?> "> <?php echo $dnn['level']; ?></option> 
 <?php
		  }
         ?>       	 
  
               </select>
            </div></td>
          </tr>
             <tr>
                <td>العنوان</td>
             <td><div class="input-group input">
               <textarea  class="form-control" placeholder="العنوان" name="address" rows="4" required cols="60" ></textarea>     
            </div>
            </td>
            </tr>
           </table>
                 <br> <br> 
            <div>
                  <center>
                 <input type="submit"  class="btn btn-success" name="submit" value="تسجيل" /> 
                  </center>
            </div>
     </form>
      </center>
        </div>
    </div>      

      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div>
<? 
include 'include/footer.php'; 
 