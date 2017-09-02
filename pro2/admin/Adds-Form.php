<?php 

   include 'include/header.php';    
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   
?> 
    <div class="page-title" dir="rtl">
    	
        <div class="container">
        	<center><h1>الرحلات <i class="fa fa-list"></i></h1></center>
        </div>
        
    </div><!-- /page-title -->
         <br>
        <center>
  			<div class="container">       
         
        <form  class="sitting" method="" action="index.html">

       <input type="text"placeholder="مكان الرحلة" class="form-control" /><br>
         
            <label class="input-lg">ارفع صورة الرحلة</label><input type="file" /><br><br>


		<center><button class="btn btn-lg btn-primary" type="submit">اضف رحلة جديدة</button></center>
         </form>

         
    	</div><!-- /container -->
    </center>
       
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    