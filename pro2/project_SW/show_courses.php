 <?php 
   session_start();
 if(!@$_SESSION['student'])
 {
 	
HEADER ("location:index.php");
}
 
  include 'pages/header-2.php'; 	
  //echo "<br> <br> <br> <br> <br> <br> <br>";

  $amrrr=new student;
   $amr=new timetable;
  //$r=$amrrr->show_co($amr,$_SESSION['id']);
   $r=$amr->show_coursess($_SESSION['id']);
  ?>
 <script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>	      	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
                       
           <div class="about_desc section" id="section-2"> 
              <div class="wrap">            
             
             	<h1 class="head"> قائمه المواد المسجله للطالب    (<span> <?php echo $_SESSION['name']; ?></span>)  في المركز   </h1>
						<table class="example-table">
<tbody>
<tr>
<th>اليوم</th>
<th>الماده</th>
<th>المدرس</th>
<th>من</th>
<th>إلي</th>
<?php
 while($row=mysql_fetch_array($r))
 {
 ?>
</tr>
<tr>
<td><?php echo $row['day'];?></td>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['Start'];?></td>
<td><?php echo $row['End'];?></td>
</tr>
<?php }?>
</tbody>
</table>	
		 			 
  
                    
       <div id="flip">تغير مواعيد الدروس والمواد المسجله</div>
<div id="panel">برجاء مراجعه المركز في حاله إلغاء تسجبل المواد التعليمية أو المواعيد ... وذلك حفاظا علي سلامه النظام التعليمي بالمركز</div>   
							   
       	  </div>  
       	  
       	 
      </div>
 <?php  include 'pages/footer.php'; ?>
