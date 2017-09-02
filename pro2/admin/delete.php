<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php  
 /*
if(!isset( $_SESSION['emil']))
{
  
  HEADER ("location:login.php");
} 
   */
?> 
<?php  


include '../clasess/database.php';
include '../clasess/url.php';

 
 $amra=new url; 

$amra->connect();
 include '../clasess/user.php'; 
 
   include '../clasess/student.php'; 
   $student=new student;
  ?>

<?php
    
$id=$_GET['id'];
   $student->delete_student($id);
               

    ?>
   <center>تم الحذف بنجاح<br><a href='teacher_list.php'>"اضغط هنا للرجوع الى قائمة الطلاب"</a></center>
   <meta http-equiv="Refresh" content="2;URL=teacher_list.php" />



