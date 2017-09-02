<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php  

   
?> 
<?php  
   include 'include/header.php';  

include '../clasess/url.php';

 
 $amra=new url; 
 

$amra->connect();
 
   include '../clasess/teacher.php'; 
   $teacher=new teacher;
  ?>

<?php
    
$id=$_GET['id'];
   $teacher->delete_teacher($id);
              
    ?>
   <center>تم الحذف بنجاح<br><a href='teacher_list.php'>"اضغط هنا للرجوع الى قائمة الطلاب"</a></center>
   <meta http-equiv="Refresh" content="2;URL=teacher_list.php" />



