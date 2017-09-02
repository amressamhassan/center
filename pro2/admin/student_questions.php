<?php 

   include 'include/header.php';  
  include '../clasess/control.php'; 
 
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   

  ?>
    
<div class="page-title" dir="rtl">
        
        <div class="container">
                  <center>

<h1> قائمة اسأله الطلاب بالمركز <i class="fa fa-list"></i></h1>
        </center>
        </div>
        </div>
        <table class="table" dir="rtl">
          <thead>
            <tr >
            <td><h4>رقم السؤال</h4></td>
                <td><h4>حالة السؤال</h4></td>
            <td><h4>اسم الطالب</h4></td> 
            <td><h4>السؤال</h4></td>
            <td><h4>اداره</h4></td>
            </tr>
          </thead>


     
          <tr>
          <td >1</td>
         <td>منشور</td>
            <td><a href='student_profile.php'>محمد</a> </td>
          <td> السؤال ؟</td>
             
    <td><button type='button' class='btn btn-warning'>رد</button>
            <button type='button' name='delete' class='btn btn-danger'>حذف</button></td>
             <tr>
          <td >2</td>
         <td>مخفى</td>
            <td><a href='student_profile.php'>احمد</a> </td>
          <td> السؤال ؟</td>
             
    <td><button type='button' class='btn btn-warning'>رد</button>
            <button type='button' name='delete' class='btn btn-danger'>حذف</button></td>
          </tr>
          </tr>
        </table>
    </body>
</html>
