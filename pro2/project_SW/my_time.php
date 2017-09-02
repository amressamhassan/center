<?php
session_start();
 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
  
    
    $amr=new timetable;
	
	$a=$amr->show_day("day");
	$id=array();
	$day=array();
	$i=1;
	 while($row=mysql_fetch_array($a)){
	 $id[$i]=$row['id'];
	 $day[$i]=$row['day'];
	 $i++; 
	 }

	 ?>			
	 <br><br><br><br><br>      	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
              <?php
	for ($i=1; $i <=7; $i++){
	 
    $num=$amr->number_of_time_tea($id[$i],$_SESSION['id']);
	if(mysql_num_rows($num)>0)
	{
?>	         

	
 <div class="wrap">            
  <div class="section group example">
				 
<h3><?php  echo $day[$i];
?></h3>

<table class="example-table">
<tbody>
<tr>

<th>المرحله الدراسيه </th>

<th>رقم القاعة</th>
<th>من</th>
<th>إلي</th>
<th>نقل المعاد</th>
<th>حذف المعاد</th>
</tr>
<?php }
while ($row=mysql_fetch_array($num)){
		  $t=$amr->show_time_table($row['ID']);
		  if( $t['ID_T']==$_SESSION['id']){
	  ?>
	  
<tr>

<td><?php  echo  $t['level']."<br>";  ?></td>

<td> <?php  echo  $t['hall_num']."<br>";  ?></td>
<td><?php  echo  $t['Start']."<br>";  ?></td>
<td><?php  echo  $t['End']."<br>";  ?></td>
<td><div id="loginContainer"><a href="del_my_time.php?id=<?php echo $row['ID'];?>&&type=<?php echo md5(1);?>" id="loginButton"><span> نقل</span></a></div></td>
<td><div id="loginContainer"><a href="del_my_time.php?id=<?php echo $row['ID'];?>&&type=<?php echo md5(2);?>" id="loginButton"><span> الغاء</span></a></div></td>
</tr>
</tbody>
<?php  }}?>
</table>	
</div>

</div>	<!--- End one Row of timetable ------>     
 <?php }
 ?>

</div>             
</div>  
     </div>    	  
       	<br><br><br><br><br> 	<br><br><br><br><br> 
    

 <?php  include 'pages/footer.php'; ?>
