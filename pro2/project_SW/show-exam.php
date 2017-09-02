
 <?php  

 	  session_start();
 if(!$_SESSION['student'])
 {
 	
HEADER ("location:index.php");
}
 include 'pages/header-2.php';

	
	$amr= new exam;
    $id_exam=$_GET['id'];
  ?>	
   <script type="text/javascript" src="loading/jquery.validate.min.js"></script>  
    <link rel="stylesheet" href="css/style-registration.css">	
         	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">  
              	<div id="exame-info">
              	     <table>
              	<tr>
              		<td>اللغه العربيه </td>
              		<td> الصف الأول القانوي</td>
              		<td>  عبد الرحمن محمد حسن</td>
              	
              	</tr>
              </table>
        
         	
            
               	</div>   
            
                <center>
                	<font color="red" size="500px">(
                      <?php
              			$r=	$amr->show($id_exam,"id","exam");
                       while ($q=mysql_fetch_array($r)){
                       echo  $q['name_exam'];
                        }
              			?> )
              			</font>
              	     </center>
            <div id="exame">
            	
            	<table width="100%">
            	<form action="g.php" method="post">
            	 	<?php
            				 	$r=	$amr->show($id_exam,"id_exam","questions");
                                  $i=1;
                                 while ($q=mysql_fetch_array($r)){
            				 	
            				 	
            				 	?>
            		<tr>  <!-- first Question --->
            	 
            			<td>
            				 <table class="qq">
            				
            				 	<tr>
            				 		
            				 		<td>
            				 			 	<font color="blue" size="50px">
            				 			<?php
	
	echo $i." : ". $q['Questions']."<br>";///q
	$type=$q['type_id'];
	$rr=$amr->show($q['id'], "qu_id","answers");
	$s="";
    $sh="";
            				 			
            ?>	</font>
            				 		<div class="counter"><?php echo $q['score']; ?></div>	
            				 		</td></tr>
            				 		
            			<tr><td>
            			<?php
            			
	        while ($qq=mysql_fetch_array($rr)){
		
	
			
            			
            			?>	
            				
            			<div class="choose"><?php 	echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$qq['order']."."; ?>
         <input type="radio" name="a<?php echo $q['id'];?>" value="<?php echo $qq['id'];?>" />
          
          	<font color="green"> 
         <?php echo " <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ".$qq['answer']."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  "; ?>
          			</font>
            			</div>
            			<?php
            			$rrr=$amr->show($qq['id'], "id_an","corrct");
							while ($qqq=mysql_fetch_array($rrr)){
			
			             if($qq['id']==$qqq['id_an']){
	                      $s=$qq['answer'];
	                      $sh=$qq['order'];	
		                  }}}
            			?>	 	
            				 		
            				 	 	
            			</td></tr>
            				 </table>
            			</td>
            		</tr>
            		
            		<?php
//echo "<br>".$sh."  ".$s;;
	$i++;
	//echo "<br> <br> <br>";
}?>
            	
            		<input type="hidden" name="id" value="<?php echo $id_exam; ?>"  />
            	</table>
            	 <input type="submit" name="submit" value="تصحيح الإجابات"  class="btn"/> 
            		
            	</form>	
            	
            	
            </div>
           
           </div>
            </div>
             </div>
      
 <?php  include 'pages/footer.php'; ?>
