

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
include '../clasess/interface.php';
 include '../clasess/database.php';


	include '../clasess/exam.php';
	$amr= new exam;
	
 $amr->connect();
	
 $q = $_GET['q'];
$sql="SELECT 
user.name AS name
,user.id AS id
,user.email AS email
,user.phone AS phone
,level.level AS level
,file.Path AS Path
 FROM user  JOIN joint_timetable ON  user.id=joint_timetable.id_st 
 JOIN teach ON  teach.ID_st=user.id 
 JOIN user2 ON user.id = user2.id_teacher
 JOIN level ON level.id = user2.level_id
 JOIN user_img ON user.id = user_img.id_user
 JOIN file ON file.id = user_img.id_img
 JOIN timetable on timetable.ID=joint_timetable.id_time 
 where timetable.ID=$q";
 //mysql_query("set names utf8");
  $result=mysql_query($sql);



?>
<br>
 		<table  width="100%" class="example-table">
							

<tbody>
<tr>
<th>اسم الطالب </th>
<th> المستوي الدراسي</th>
<th>البريد الإليكتروني</th>
<th> رقم التلفون </th>
<th>  صوره شخصيه</th>
</tr>
     
<?php
while($row = mysql_fetch_array($result))
 {  ?>

<tr>
<td> <?php echo $row['name']?> </td>
<td><?php echo $row['level']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['phone']?></td>

<td><img src="images/user.png" width="80" height="50" /></td>
</tr>

 
 <?php }
 
 ?>
  	   
   </tbody>
</table>	   



