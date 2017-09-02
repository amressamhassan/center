<?php
session_start();
 if(!$_SESSION['student'])
 {
  
HEADER ("location:index.php");
}
 	
  if(@$_SESSION['student']){
  include 'pages/header-2.php';
 }
else {
    include 'pages/header.php';
}
//echo "<br> <br> <br> <br> <br>";
//echo "<br> <br> <br> <br> <br>";


$amrr=new control;
$amr=new exam;
$c=$amr->show_information_exame($_SESSION['id_level'],"exam.active=1 and level.id");
	 while($row=@mysql_fetch_array($c)){

if(!($control->dateline_calu($row['id_data_line'])))
{
$amrr->update_active($row['id'],"exam",0);
}

 }





	$a=$amr->show_information_exame($_SESSION['id_level'],"exam.active=1 and level.id");
	

	 ?>	      	
	  
	
     <div class="main" id="container">
	 	<div class="content">	
	  <div class="about_desc section" id="section-2"> 
              <div class="wrap">  
              	
              	<div class="section group example">
              		<form method="post" action="" id="reservation">
              			<div class="col_1_of_2 span_1_of_2"> 
              		

<?php
$i=1;
	 while($row=@mysql_fetch_array($a)){
	
	 
	 ?>		
  <a href="show-exam.php?id=<?php echo $row['id'];?>" id="login" name="login" >
  <?php  echo $i.".".$row['name_exam']." المادة  ".$row['subject']."<br>";?>
	 </a>
			<?php
	 $i++;
	 }
	
	
			?>
 </div> 
</div>  

       	 </div>
  

 <?php  include 'pages/footer.php'; ?>
