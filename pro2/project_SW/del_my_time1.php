<?php
 session_start();

 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';


   $amrr=new teacher;
   $amr=new timetable;
	
	$a=$amr->show_day("day");
	$id=array();
	$day=array();
	$i=1;
	$idd=$_POST['id'];
	if($_POST['right']==1)
	{
	$amr->update_te_time($idd);
	echo "<meta http-equiv='Refresh' content='0;URL=my_time.php' />";
	}	
if($_POST['right']==2){	
	if(isset($_POST['submit1'])){
$r=$amr->show_student_time($idd);

$rowm=mysql_num_rows($r);

while($row1=mysql_fetch_array($r)){
	$id_t="time".$row1['id'];
	echo $_POST[$id_t];
	$id_l_t=$idd;
	if(isset($_POST[$id_t])){
	$amrr->updat_st_r($amr,$row1['id'],$_POST[$id_t],$id_l_t);
	}
}
$amr->update_te_time($idd);
echo "<meta http-equiv='Refresh' content='0;URL=my_time.php' />";
}

	 ?>			      	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
    
<div class="about_desc section" id="section-2"> 
	
 <div class="wrap">            
  <div class="section group example">
				 
<h3>
</h3>
 <form action="" method="post" id="registration_form">
<table class="example-table"  width="100%" >
<tbody>
<tr>
<th>التسلسل</th>
<th>اسم الطالب </th>

<th>المواعيد التى تصلح له</th>

</tr>
<?php
$r=$amr->show_student_time($idd);
$i=1;
$rowm=mysql_num_rows($r);
//echo $rowm;
while($row1=mysql_fetch_array($r)){
	
?>
	  
<tr >
<th><?php echo $i?> </th>
<td><?php echo $row1['name'] ; ?>
 
</td>

<td> <select name="time<?php echo $row1['id'] ; ?>" id="hall" style="width: 100%;">
                      <option>المواعيد</option>
					 <?php
$rr=$amr->show_teaher_time($_SESSION['id']);

while($row2=mysql_fetch_array($rr)){
if($rrr=$amr->check_time_stud($row1['id'],$row2['Start'],$row2['End'],$row2['id_day']))
{
?>	
         <option value="<?php echo $row2['ID'];?>" ><?php echo $row2['Start']."  ".$row2['day']?></option>
                 <?php
}}?>
     </select></td>


</tr>
<?php
$i++;
 }?>
</tbody>

</table>	
<input type="hidden" name="id" value="<?php echo $idd; ?>"  />
<input type="hidden" name="right" value="<?php echo $_POST['right']; ?>"  />
 <input type="submit"  class="btn btn-success" name="submit1" value="تنفيذ" /> 
  </form>
</div>

</div>	<!--- End one Row of timetable !-->     


</div>             
</div>  
       	  
       	 
      </div>
<?php

}
	
if($_POST['right']==3){	
$r=$amr->show_student_time($idd);
$id_stud=array();
$id_time=array();
$num1=mysql_num_rows($r);
$i=0;
while($row1=mysql_fetch_array($r)){
	$id_stud[$i]=$row1['id'];
$i++;
}
$rr=$amr->show_teaher_time($_SESSION['id']);
$j=0;
$num2=mysql_num_rows($rr);
while($row2=mysql_fetch_array($rr)){
	$id_time[$j]=$row2['ID'];
	$j++;
}

$j=0;
$i=0;
while($i<$num1){
	if (isset($id_time[$j])&&isset($id_stud[$i])){
if($t=$amr->show_time_table($id_time[$j])){
if($rrr=$amr->check_time_stud($id_stud[$i],$t['Start'],$t['End'],$t['id_day']))
{
	
$amrr->updat_st_r($amr,$id_stud[$i],$id_time[$j],$idd);
   $i++;
}
	if($j==$num2){
		$j=-1;
	}
    $j++; 
}}

}

?>

</div>

</div>	<!--- End one Row of timetable -->     


</div>             
</div>  
       	  
       	 
 </div>
<?php
$amr->update_te_time($idd);
echo "<meta http-equiv='Refresh' content='0;URL=my_time.php' />";
}
?>
 <?php  include 'pages/footer.php'; ?>
