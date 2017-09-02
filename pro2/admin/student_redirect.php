<?php 

   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   
?> 
    
    <div class="page-title" dir="rtl">
    	
        <div class="container">
        	 <center><h1>إعادة توجية </h1> </center>
        </div>
        
    </div><!-- /page-title -->
        
        <div class="h-recent-work">
        
  			<div class="container" dir="rtl">       
        
        <center>
        <div class="container">
            <div class="row">
              <div class="col-md-6">

          <div class="thumbnail tile tile-wide tile-orange">
    <a href="#" > <h1 class="tile-text"> طالب عادي</h1></a>
        </div>
              </div>

               <div class="col-md-6">
               <div class="thumbnail tile tile-wide tile-teal">
    <a href="#" > <h1 class="tile-text"> طالب عادي</h1></a>
        </div>
               </div>
            </div>
         </div>
        </center>
               

        </div>
        
        
        
    	</div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    