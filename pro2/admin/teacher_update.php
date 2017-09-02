  <?php 

   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
  
HEADER ("location:../project_SW/");
} 
   
?> 
<?php  
   include '..\clasess\teacher.php'; 
   $teacher=new teacher;
  ?>
    
 <?php
  $id=$_GET['id'];

$teacher->active_user($id);
  echo " <script>alert('done')</script>" ;
echo "<meta http-equiv='Refresh' content='1;URL=teacher_list.php' />";

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

<h1>تعديل المدرس <i class="fa fa-user"></i></h1>
  
        </center>
        </div>
        
    </div><!-- /page-title -->
        
    <div class="h-recent-work">
    <div class="container" dir="rtl"> 
    <div class="row">
        <div class="col-md-12">
        <center>
      
      </center>
        </div>
    </div>      
 
        
        
        
      </div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->

</div> 
        
     <?php include 'include/footer.php';  ?>
    