 <?php  
 include 'pages/header.php';
   
 
	$amr= new exam;

	
	
	
	
	
				$id_exam=$_GET['id'];
				echo $id_exam;
					
				

	?>
	   <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
                 	<div class="section group example">
						
				<center>
				<h1>
					<?php
	if($amr->active_exame($id_exam))
	{
		echo "بتم الان تكوين الامتحان الخاص بك يا استاذ احمد انتظار بضع ثوانى......";
		echo"<meta http-equiv='Refresh' content='5;URL=index.php'/>";
	}
	else {
		echo"خطاء فى تكوين الامتحان من فضلك راجع الادمن او اعاد تكوين الامتحان";
	}
					?>
					
					
					
					
				
					 <br> <br> <br>  <br> <br> <br> 
				</h1>
		 	  	  </center>
           	
           	           
       	  </div>  
       	     
		  	
  </div>

      
       
 <?php  include 'pages/footer.php'; ?>
