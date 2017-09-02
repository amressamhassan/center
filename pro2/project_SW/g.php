
 <?php  
    session_start();
 if(!$_SESSION['student'])
 {
  
HEADER ("location:index.php");
}
 	
  
  include 'pages/header-2.php';
 


	 $id_exam=$_POST['id'];
	$amr= new exam;




	$amrr= new teacher;
		
		$g;

	

	

	
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
                      $g="";
					   $sum=0;
              			$r=	$amr->show($id_exam,"id","exam");
                       while ($q=mysql_fetch_array($r)){
                       	//	echo $_POST["a141"];
                       	$g= $q['score'];
                       echo  $q['name_exam'];
                        }
              			?> )
              			</font>
              	     </center>
            <div id="exame">
            	
            	<table width="100%">
            
            	 	<?php
            				 	$r=	$amr->show($id_exam,"id_exam","questions");
                                  $i=1;
                                 while ($q=mysql_fetch_array($r)){
            				 	 $s="";
								 $ss="";
            				 	
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
            				
            			<div class="choose"><?php 	echo $qq['order']."."; ?>
         <input type="radio" name="" value="" />
          	<font color="green">
         <?php echo " <br> ".$qq['answer']."  "; ?>	
          			</font>
          			
            			</div>
            			
            			<?php
            			$rrr=$amr->show($qq['id'], "id_an","corrct");
							while ($qqq=mysql_fetch_array($rrr)){
			
			              $ss="a".$qq['qu_id'];
	                      $s=$qqq['id_an'];
	                    }}?>
		                  
	<?php
	$vall=0;
	 //   echo $ss;
	if($s==$_POST[$ss])
	{
		
		
	
	?>
	
	<div class="counter"><?php 
	$vall=$q['score'];
     $sum+=$q['score'];
	
	 
	echo $q['score']; ?></div>	
    <?php }
    else {
        
    
    ?>
    
     <div class="counterr">0</div>		
    <?php
  //  echo $ss;
	}
	$amr->set_score($vall);

	$amrr->crr_qq($amr,$_SESSION['id'],$q['id'],$id_exam);
	
    ?>        		
            				
            			
            				
            				 	 	
            			</td>
            				 
            			
            			</tr>
            				 </table>
            			</td>
            		</tr>
            		
            		<?php
//echo "<br>".$sh."  ".$s;;
	$i++;
	//echo "<br> <br> <br>";
}

?>
            	
            		
            	</table>
           <?php
    $amr->set_score($sum);
	$p=($sum*100)/$g;

 $amrr->crr_ee($amr,$_SESSION['id'],$id_exam,$p);///id usre
 echo "درجتك".$sum."من".$g;
            	?>
          
               
            	  <a href="pdf.php?id_exam=<?php echo $id_exam;?>" id="login" name="login" >pdf</a>
                
           
            </div>
           </div>
            </div>
           
           </div>
      
 <?php  include 'pages/footer.php'; ?>
