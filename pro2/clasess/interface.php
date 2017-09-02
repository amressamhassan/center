<?php

// Declare the interface 'iTemplate'
interface show
{
    public function show_day($name);
	public function show($id,$id_p,$table);
	public function date_line($id_m,$tod);
    
}

// Implement the interface
// This will work
class show3 implements show
{
	 function show($id,$id_p,$table)
	{
		$sql="select * from ".$table." where ".$id_p."=".$id."";
			//$sql="select * from day where day_en = 'Saturday'";
		$rrr= mysql_query($sql);
		return $rrr;
	}
    function show_day($name){
	 $sql="select * from ".$name;
	  mysql_query("set names utf8");
	 $query=mysql_query($sql);
	 return $query;
}
	public function date_line($id_m,$tod)
{
$fromd=date('j');
	
$fromm=date('n');	

$sql="select * from acadmic_year where id_parint = 1 and name = $fromm ";
$query=mysql_query($sql);
$day=mysql_fetch_array($query);
$idm_f=$day['id'];

$sql2="select * from acadmic_year where id_parint = 1 and id = $id_m ";
$query2=mysql_query($sql2);
$day2=mysql_fetch_array($query2);
$tom=$day2['name'];


if($tod>31){
	return FALSE;
}
if(!($tom>$fromm)){

if(($tom==$fromm)){

if($tod<=$fromd){
	
		return FALSE;
}
	
}
	
else {
	
	return FALSE;
}
}

		
		
$id1="";
$id2="";
//1
$sql3="select * from acadmic_year where id_parint = $id_m and name = $tod ";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id1=$day['id'];
}
else {
$sql3="INSERT INTO `acadmic_year`(`name`, `id_parint`) VALUES ('$tod',$id_m)";
	mysql_query($sql3);
	$id1=mysql_insert_id();
	
}
//2
$sql3="select * from acadmic_year where id_parint = $idm_f and name = $fromd ";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id2=$day['id'];
}
else {
	$sql3="INSERT INTO `acadmic_year`(`name`, `id_parint`) VALUES ('$fromd',$idm_f)";
	mysql_query($sql3);
	$id2=mysql_insert_id();
	
}	
echo $id1.$id2;		
$sql1="INSERT INTO `date_line`(`from`, `to`) VALUES ('$id2','$id1')";		
mysql_query($sql1);
$id_dataline=mysql_insert_id();
return $id_dataline;		
	}

}


//////////////////////////////////////////////////////////////
interface time   
{
    public function show_day($name);
	public function show_time_table($i);
	public function show_time_table2($i);
    public function date_line($id_m,$tod);
}


class time3 implements time
{
public function date_line($id_m,$tod)
{
$fromd=date('j');
	
$fromm=date('n');	

$sql="select * from acadmic_year where id_parint = 1 and name = $fromm ";
$query=mysql_query($sql);
$day=mysql_fetch_array($query);
$idm_f=$day['id'];

$sql2="select * from acadmic_year where id_parint = 1 and id = $id_m ";
$query2=mysql_query($sql2);
$day2=mysql_fetch_array($query2);
$tom=$day2['name'];


if($tod>31){
	return FALSE;
}
if(!($tom>$fromm)){

if(($tom==$fromm)){

if($tod<=$fromd){
	
		return FALSE;
}
	
}
	
else {
	
	return FALSE;
}
}

		
		
$id1="";
$id2="";
//1
$sql3="select * from acadmic_year where id_parint = $id_m and name = $tod ";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id1=$day['id'];
}
else {
$sql3="INSERT INTO `acadmic_year`(`name`, `id_parint`) VALUES ('$tod',$id_m)";
	mysql_query($sql3);
	$id1=mysql_insert_id();
	
}
//2
$sql3="select * from acadmic_year where id_parint = $idm_f and name = $fromd ";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id2=$day['id'];
}
else {
	$sql3="INSERT INTO `acadmic_year`(`name`, `id_parint`) VALUES ('$fromd',$idm_f)";
	mysql_query($sql3);
	$id2=mysql_insert_id();
	
}	
echo $id1.$id2;		
$sql1="INSERT INTO `date_line`(`from`, `to`) VALUES ('$id2','$id1')";		
mysql_query($sql1);
$id_dataline=mysql_insert_id();
return $id_dataline;		
	}



    function show_day($name){
	 $sql="select * from ".$name;
	  mysql_query("set names utf8");
	 $query=mysql_query($sql);
	 return $query;
}
	/////////////////////////////////////////////////////////////////////////////////////////
	function show_time_table($i){
	
$time_table=array();

$sql="SELECT subject.subject AS subject
,level.level AS level
,user.name AS name
,hall.hall_num AS hall_num
,hall.vales AS vales
,timetable.Start AS Start
,timetable.End AS End
,timetable.ID_T AS ID_T
,timetable.id_day AS id_day
,timetable.ID_Hall AS ID_Hall
,timetable.ID AS ID
,timetable.active AS active
,day.day AS day
 FROM subject INNER JOIN subject_level ON  subject.id=subject_level.id_subject 
 JOIN level ON subject_level.id_level=level.id  
 JOIN timetable
 JOIN user ON user.id = timetable.ID_T
 JOIN hall ON hall.id = timetable.ID_Hall
 JOIN day ON day.id = timetable.id_day
 where subject_level.id=timetable.ID_SU and timetable.ID=$i
  and timetable.active=1";
 mysql_query("set names utf8");
$qu=mysql_query($sql);
$rows=@mysql_fetch_array($qu);
	
$time_table=array('Start' => $rows['Start'] ,
	              'End' => $rows['End'],
	              'name' => $rows['name'],
	              'sub' => $rows['subject'],
	              'level' => $rows['level'],
	              'hall_num' => $rows['hall_num'],
	              'ID_T' => $rows['ID_T'],
	              'id_day' => $rows['id_day'],
	              'ID_Hall' => $rows['ID_Hall'],
                  'vales' => $rows['vales'],
                  'day' => $rows['day'],
                  'ID' => $rows['ID'],
                  'ac' => $rows['active']
	              );
 
 return $time_table;
	}
	
	function show_time_table2($i){
	
$time_table=array();

$sql="SELECT subject.subject AS subject
,level.level AS level
,user.name AS name
,hall.hall_num AS hall_num
,hall.vales AS vales
,timetable.Start AS Start
,timetable.End AS End
,timetable.ID_T AS ID_T
,timetable.id_day AS id_day
,timetable.ID_Hall AS ID_Hall
,day.day AS day
 FROM subject INNER JOIN subject_level ON  subject.id=subject_level.id_subject 
 JOIN level ON subject_level.id_level=level.id  
 JOIN timetable
 JOIN user ON user.id = timetable.ID_T
 JOIN hall ON hall.id = timetable.ID_Hall
 JOIN day ON day.id = timetable.id_day
 where subject_level.id=timetable.ID_SU and timetable.ID=$i
  and timetable.active=0";
 mysql_query("set names utf8");
$qu=mysql_query($sql);
$rows=@mysql_fetch_array($qu);
	
$time_table=array('Start' => $rows['Start'] ,
	              'End' => $rows['End'],
	              'name' => $rows['name'],
	              'sub' => $rows['subject'],
	              'level' => $rows['level'],
	              'hall_num' => $rows['hall_num'],
	              'ID_T' => $rows['ID_T'],
	              'id_day' => $rows['id_day'],
	              'ID_Hall' => $rows['ID_Hall'],
                  'vales' => $rows['vales'],
                  'day' => $rows['day']
	              );
 
 return $time_table;
	}
	

}
///////////////////////////////////////////////////////////////////////////

interface users   
{
 public function login ($emil,$pass);
 public function logout ();
 public  function active_user($id);
 public function show($id,$id_p,$table);
}

class users3 implements users
{
function login ($emil,$pass){
$sql="SELECT user_type_id,id,name FROM user WHERE email='$emil' AND pass='$pass'";
mysql_query("set names utf8");
$result = mysql_query($sql);
$qu=mysql_fetch_assoc($result);
$type=$qu['user_type_id'];
$id=$qu['id'];
$name=$qu['name'];
$sql2="SELECT type FROM types WHERE id='$type'";
    $result2 = mysql_query($sql2);
    $qu2=mysql_fetch_assoc($result2);
      $type2=$qu2['type'];

$query= mysql_query($sql);
$num=mysql_num_rows($query);
if($_POST['submit']&&$num&&$type2)
  {
 $today = date('l F j ,n, Y, g:i a '); 
  $_SESSION['today']=$today;
$sql3="UPDATE `user` SET `Login_Date` = '$today' WHERE `id` = '$id'";
mysql_query($sql3);
$name=explode(' ', $name);
$_SESSION['name']=$name[0];
$_SESSION['id']=$id;
$_SESSION['type']=$type;
if($type==1){
	 $_SESSION['emil']=$emil;
	return $type;
}

elseif($type==2){
	$sql4="SELECT subject.subject AS subject 
	, subject.id AS id FROM subject
   JOIN  registration  ON subject.id = registration.id_sub
    JOIN  user  ON user.id = registration.ID_St_T
     where user.id=$id";
      mysql_query("set names utf8");
	$result = mysql_query($sql4);
   $sub=mysql_fetch_assoc($result);
	 $_SESSION['techer']=$emil;
	$_SESSION['subject']=$sub['subject'];
	$_SESSION['id_sub']=$sub['id'];
	return $type;
}

	
elseif($type==3){
$sql4="SELECT level.level AS level ,
level.id AS id_level
FROM level JOIN  user2  ON level.id = user2.level_id
 JOIN  user  ON user.id = user2.id_teacher
  where user.id=$id";
$result = mysql_query($sql4);
  $sub=mysql_fetch_assoc($result);
 $_SESSION['student']=$emil;
$_SESSION['level']=$sub['level'];
$_SESSION['id_level']=$sub['id_level'];
return $type;
}
  

  } 

}

function logout (){
		  session_destroy();
	         }

function active_user($id){
  
$sql="UPDATE user SET active=1 WHERE id='$id'";
	  mysql_query($sql);
	  $sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
VALUES ('$id',1)";
mysql_query($sql);

$sql="DELETE FROM `alert_users` WHERE id_us=$id and id_alert=4";
mysql_query($sql);              
}

public function show($id,$id_p,$table)
	{
		$sql="select * from ".$table." where ".$id_p."=".$id."";
		
		$rrr= mysql_query($sql);
		return $rrr;
	}
}
	


?>