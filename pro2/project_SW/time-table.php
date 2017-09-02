<?php
session_start();
if(@$_SESSION['techer']||@$_SESSION['student'])
{
  include 'pages/header-2.php';
 }
else {
	  include 'pages/header.php';
}
//echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";

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
     <div class="main" id="container">
	 	<div class="content">	
	 	 <br><br><br><br><br><br>
              <?php
	for ($i=1; $i <=7; $i++){
	 
    $num=$amr->number_of_time($id[$i]);
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
<th>اسم الماده</th>
<th>المرحله الدراسيه </th>
<th>اسم المدرس</th>
<th>رقم القاعة</th>
<th>من</th>
<th>إلي</th>
</tr>
<?php }
while ($row=mysql_fetch_array($num)){
		  $t=$amr->show_time_table($row['ID']);
	  ?>
<tr>
<td><?php   echo  $t['sub']."<br>";   ?> </td>
<td><?php  echo  $t['level']."<br>";  ?></td>
<td> <?php  echo  $t['name']."<br>";  ?></td>
<td> <?php  echo  $t['hall_num']."<br>";  ?></td>
<td><?php  echo  $t['Start']."<br>";  ?></td>
<td><?php  echo  $t['End']."<br>";  ?></td>
</tr>
</tbody>
<?php  }?>
</table>	
</div>

</div>	<!--- End one Row of timetable ------>     
 <?php }
 ?>

</div>             

       	  
       	 
      </div>
 <br><br><br><br>
 <?php  include 'pages/footer.php'; ?>
