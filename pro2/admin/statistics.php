<?php 

   include 'include/header.php';  
 
  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
   

?> 
 <div class="page-title">
        <CENTER>
             <h1> الاحصائيات </h1>
        </CENTER>
    </div><!-- /page-title -->
     
 
            <div class="container" dir="rtl">       
                <br>
                <div class="col-md-4">
                      <div id="canvas-holder">
      <canvas id="chart-area" width="300" height="300"/>
    </div>
                </div>
                    <div class="col-md-4">
                   
                </div>
                    <div class="col-md-4">
                     
                </div>
                </div><!-- /container -->
                
         <br>
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    <script src="js/Chart_lib.js" type="text/javascript"></script>
    <script src="js/Chart_fun.js" type="text/javascript"></script>