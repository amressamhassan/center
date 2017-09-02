<?php 
 
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	HEADER ("location:../project_SW/");
} 
   
?> 
    <div class="page-title" dir="rtl">
    	
        <div class="container">
     <center>   <h1> بحث عن مدرس <i class="fa fa-search"></i></h1></center> 
        </div>
        
    </div><!-- /page-title -->
         
        
  			<div class="container" dir="rtl">       
         
        	<br><br>
          <center>
          <div class="col-md-12">
              <div class="form-group">
                <font size="9" >ادخل كود المدرس</font>  
                <form action="" method="">
                    <input type="text" class="form-control search_input" placeholder="كود المدرس" required>
                     </div>
                            <input type="submit" class="btn btn-info" name="search" value="بحث"> 
                        </div>
                </form>
              
              
             
              <br><br><br> 
            
          </center>
      
        
        
        
        
    	</div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    