   <?php 
 include 'include/header.php';  
  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
   
?> 
   
     <?php include 'subject.php';  ?>  

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

<h1>تسجيل المواد والسنة الدراسية <i class="fa fa-clock-o"></i></h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
        <form action="#" method="post" id="registration_form">
        <table  width="100%">
            <tr>
                <td>اسم الماده</td>
                <td>
              <div class="input-group input">
                <input type="text" name="name">
                 <button class="btn btn-success"  name="new" type="submit">اضافة</button>
             
                    </div>
                </td>
        
            </tr>
            <tr>
                <td>السنة الدراسية</td>
            
            <td>
                <div class="input-group input">
                
                    <select  name="type" width="300" style="width: 100%">
                        <option selected value="">السنة الدراسية
                                       </option>
                        <option value="1">الصف السادس الابتدائي
                        </option>
                         <option value="2">الصف الاول الاعدادي
                        </option>
                         <option value="3">الصف الثاني الاعدادي
                        </option>
                         <option value="4">الصف الثالث الاعدادي
                        </option>
                         <option value="5">الصف الاول الثانوي
                        </option>
                         <option value="6">الصف الثاني الثانوي
                        </option>
                        <option value="7">الصف الثالث الثانوي
                        </option>
               </select>
                    </div>
                </td>
                        
                
                
                </div>
                
                
                </td>
            
            
            
            
            </tr>
             
                   
             </table>
                 <br> <br> <br> <br> <br>
            <div>

            </div>
     </form>
        
<? 
    if(isset($_POST['new']))
{

        $a=new subject;
        $a->add();
}
?>

        
        
      </center>
        </div>
    </div>      
 
        
        
        
      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div>
        
     <?php include 'include/footer.php';  ?>
    