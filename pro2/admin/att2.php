<?php 
  
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
     

    $control=new control;
    $admin=new admin;

      $type1=md5(1);
      $type2=md5(2);
      $idd=@$_GET['id'];
     
      $amr=new timetable;
      $amr->connect();


      $a=$amr->show_student_time($idd);
$id_att=$admin->att_day($idd);

?> 
        <CENTER>
        <table width="100%" border="5" >
<tbody>
<tr>

<th>اسم الطالب </th>

<th>الحالة</th>


</tr>
<?php 

while ($row=mysql_fetch_array($a)){
$id=$row['id'];
$sql3="select * from  attendance_user where id_user =$id and id_attendance =$id_att";
$query3=mysql_query($sql3);
	if(!(mysql_num_rows($query3)>0)){
  

		
	  ?>
	  
<tr>
<td><?php echo $row['name'];?>
</td>

<td><a href="att3.php?id=<?php echo $row['id'];?>&&id_att=<?php echo $id_att;?>" ><span>حضر</span></a></td>
</tr>
</tbody>
<?php  

}}?>
</table>	

        </CENTER>
    </div><!-- /page-title -->
     
 
        
 <?php include 'include/footer.php';  ?>
   