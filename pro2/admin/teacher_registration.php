<?php 

   include 'include/header.php';  
 
if(!isset( $_SESSION['emil']))
{
  
HEADER ("location:../project_SW/");
} 

   
?> 
<?php  
   include '../clasess/teacher.php'; 
   $teacher=new teacher;
  ?> 

<?php 

if(isset($_POST['submit'])){
  $table="teacher";
$teacher->set_name($_POST[ 'name' ]);
$teacher->set_mail($_POST[ 'mail' ]);
$teacher->set_phone($_POST[ 'phone' ]);
$teacher->set_language($_POST[ 'language']);
$teacher->set_address($_POST[ 'address' ]);
}
if ($teacher->get_error() && $teacher->get_error1() && $teacher->get_error2()){
$teacher->add_teacher($table,$teacher->get_name(),$teacher->get_mail(),$teacher->get_language(),$teacher->get_phone(),$teacher->get_address());
  echo " <script>alert(' تم التسجيل بنجاح ')</script>" ;

}
echo $teacher->get_error();
echo $teacher->get_error1();
echo $teacher->get_error2();


  ?>
    <style type="text/css">

  #registration_form  input,select{
      width: 250px;
      height: 50px;
      padding: 15px;
      margin: 15px;
    }

    </style>
<div class="page-title" dir="rtl">
      
        <div class="container">
                <center>

<h1>مدرس جديد <i class="fa fa-user"></i></h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
        <form action="" method="post" id="registration_form">
        <table  width="80%">
            <tr>
                <td>اسم مدرس</td>
                <td>
              <div class="input-group input">
                <input type="text" name="name" class="form-control" placeholder="اسم مدرس" required>
            </div></td>
            </tr>


                 <tr>
                <td>البريد الالكترونى</td>
                <td><div class="input-group input">
                <input type="text" name="mail" class="form-control" placeholder="البريد الالكترونى" required>
            </div></td>
            </tr>
               <tr>
                <td>ت/المدرس</td>
                <td><div class="input-group input">
                <input type="text" name="phone" class="form-control" placeholder="ت/مدرس" required>
            </div></td>
              
 
            
               <td><div class="input-group input">
               <select name="language" width="300" style="width: 150px" required>
                  <option  value="1">عربى
                        </option>
                         <option value="2">لغات
                        </option>
               </select>
            </div></td>
            </tr>
          
         
             <tr>
                <td>العنوان</td>
                <td><div class="input-group input">
                  <textarea  class="form-control" name="address" placeholder="العنوان" rows="4" cols="50" required ></textarea>
               
            </div></td>
            </tr>
             </table>
                 <br>
            <div>
                  <center>
                 <input type="submit"  class="btn btn-success"  name="submit" value="تسجيل" /> 
                  
                  </center>
            </div>
     </form>
      </center>
        </div>
    </div>      
 
        
        
        
      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div> 
        
     <?php include 'include/footer.php';  ?>
    