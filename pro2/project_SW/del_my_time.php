<?php
 session_start();

 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
 

	$id=$_GET['id'];	
	$type=$_GET['type'];
	$type1=md5(1);
	$type2=md5(2);
    $amr=new timetable;

	$a=$amr->show_day("day");

$r=$amr->show_student_time($id);

$rowm=mysql_num_rows($r);
if($type==$type2){
	

	 ?>			      	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
         
<div class="about_desc section" id="section-2"> 
	
 <div class="wrap">            
  <div class="section group example">
		<font color=red>		 
<h2>
برجاء العلم ان هناك<?php echo $rowm; ?> طالب فى هذا المعاد 
<br>
عليك ان تاختار من الاختيارات الاتية لاتتمام عملية الحذف</h2></font>


					<!--- Start Form ---->	 
 <form action="del_my_time1.php" method="post" id="exam-form" novalidate="novalidate" > 
   	<center>
   <table class="example-table">
<tbody>
<tr>
<th>1 </th>
<td> <input type="radio" name="right" value="1" /> </td>
<td>  <font color=#000><h2>الغاء المعاد وحذف جميع الطالبة من هذا المعاد</h2></font> </td></tr>
<tr>
<th>2 </th>
<td> <input type="radio" name="right" value="2" /> </td>
<td> <font color=#000><h2>حذف المعاد ونقل جميع الطالبة يدويا فى مواعيد اخر لحضرتك يدويا</h2></font> </td></tr>
<tr>
<th>3 </th>
<td> <input type="radio" name="right" value="3" /> </td>
<td>  <font color=#000><h2>حذف المعاد ونقل جميع الطالبة يدويا فى مواعيد اخر لحضرتك تلقائيا</h2></font> </td></tr>
<input type="hidden" name="id" value="<?php echo $id; ?>"  />

</tbody>
</table>
</center>	
		<font color=red>
  <h2>برجاء العمل ان الاختيار التلات سوف يتم توزيع الطلاية فى مواعيد اخر لحضرتك والتى لا تنشاء تعارض مع بقى مواعيد كل طالب وحصرر الطالب الذين ا تعارضات </h2></font>
<br><br><br><br>
	<center>
 <input type="submit" name="submit" id="login" value="حذف"></center>
   </form> 	
 
</div>
</div>
</div>
</div>	<!--- End one Row of timetable ------>     
 </div>

<?php
}
elseif($type==$type1){
	

	 ?>			      	
     <div class="main" id="container">
	 	<div class="content">	
	 	 
         
<div class="about_desc section" id="section-2"> 
	
 <div class="wrap">            
  <div class="section group example">
		<font color=red>		 
<h2>
برجاء العلم ان هناك<?php// echo $rowm; ?> طالب فى هذا المعاد 
<br>
عليك ان تاختار من الاختيارات الاتية لاتتمام عملية الحذف</h2></font>


					<!--- Start Form ---->	 
 <form action="up_date_time.php" method="post" id="exam-form" novalidate="novalidate" > 
   	<center>
   <table class="example-table">
<tbody>
<tr>
<th>1 </th>
<td> <input type="radio" name="right" value="1" /> </td>
<td>  <font color=#000><h2>نقل دائم </h2></font> </td></tr>
<tr>
<th>2 </th>
<td> <input type="radio" name="right" value="2" /> </td>
<td> <font color=#000><h2>نقل موقت </h2></font> </td></tr>
<input type="hidden" name="id" value="<?php echo $id; ?>"  />

</tbody>
</table>
</center>	

	<center>
 <input type="submit" name="submit" id="login" value="نقل"></center>
   </form> 	
 
</div>
</div>
</div>
</div>	<!--- End one Row of timetable ------>     
 </div>

<?php
}

else {
	?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
</div></div>	<!--- End one Row of timetable ------>     
</div></div>
<?php
echo"<meta http-equiv='Refresh' content='0;URL=index.php' />";
}

?>


 <?php  include 'pages/footer.php'; ?>
