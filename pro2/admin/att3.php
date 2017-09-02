<?php 
  
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
    

    $control=new control;
    $admin=new admin;
      $idd=@$_GET['id'];
      $id_att=@$_GET['id_att'];
     
      $amr=new timetable;
      $amr->connect();


    $a=$admin->show_time_table($idd);
  if($admin->add_att($idd,$id_att))
 {
 echo " <script>alert('لقد تم حضور الطالب ')</script>" ;
 echo "<meta http-equiv='Refresh' content='2;URL=att1.php'/>";
 }

 else
 {
 echo " <script>alert('خطاء فى قيد الطالب فى الموعاد')</script>" ;
 }
?> 
        <CENTER>


        </CENTER>
    </div><!-- /page-title -->
     
 
        
 <?php include 'include/footer.php';  ?>
   