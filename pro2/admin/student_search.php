<?php 

 
if(!isset( $_SESSION['emil']))
{
	
	HEADER ("location:../project_SW/");
} 
   
?> 
   <?php include 'include/header.php';  ?>
 
    <div class="page-title" dir="rtl">
    	
        <div class="container">
     <center>   <h1> بحث عن طالب <i class="fa fa-search"></i></h1> </center> 
        </div>
        
    </div><!-- /page-title -->
         
        
  			<div class="container" dir="rtl">       
         
        	<br><br>
          <center>
          <div class="col-md-12">
           
              <div class="form-group">
                <font size="9" >ادخل كود الطالب</font>  
                <form action="" method="">
                <input type="text" class="form-control search_input" placeholder="كود الطالب" required>
                     </div>
                            <input type="submit" class="btn btn-info" name="search" value="بحث" > 
                        </div>
                </form>
              <br> 
            
          </center>
      
        
        
        
        
    	</div><!-- /container -->
    
        
        </div><!-- /.h-recent-work -->
        
     <?php include 'include/footer.php';  ?>
    