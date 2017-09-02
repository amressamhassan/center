

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
include '../clasess/interface.php';
 include '../clasess/database.php';



	include '../clasess/exam.php';
	$amr= new exam;
 $amr->connect();
 $q = $_GET['q'];

$sql="SELECT user.name AS name
,user.id AS id
,user.email AS email
,user.phone AS phone
,day.day AS day
,timetable.Start AS Start
,file.Path AS Path
 FROM user INNER JOIN teach ON  teach.ID_st=user.id 
 JOIN user2 ON user.id = user2.id_teacher
 JOIN level  ON level.id = user2.level_id
 JOIN joint_timetable  ON joint_timetable.id_st = user.id
 JOIN timetable  ON joint_timetable.id_time = timetable.ID
 JOIN day  ON day.id = timetable.id_day
 JOIN user_img ON user.id = user_img.id_user
 JOIN file ON file.id = user_img.id_img
 where level.id=$q and teach.ID_T=7";
 mysql_query("set names utf8");
  $result=mysql_query($sql);

?>
<br>
 		<table  class="example-table">
							

<tbody>
<tr>
<th>اسم الطالب </th>
<th>المعاد</th>
<th>البريد الإليكتروني</th>
<th> رقم التلفون </th>
<th>  صوره شخصيه</th>
</tr>
     
<?php
while($row = mysql_fetch_array($result))
 {  ?>

<tr>
<td> <?php echo $row['name']?> </td>
<td><?php echo $row['day']."  ".$row['Start']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['phone']?></td>

<td><img src="images/user.png" width="80" height="50" /></td>
</tr>

 
 <?php }
 
 ?>
  	   
   </tbody>
</table>	   



