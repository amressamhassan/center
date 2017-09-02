<?php

/********************************/
class timetable extends  time3
 {
		
 private $Start;
 private $End;
 private $hall_num;
 private $id_day;



 ///////////////////////SET/////////
 function set_Start($Start)
 {
if ($Start) {
	$this->Start=$Start;
	return true;
}
 else
 {
 	return false;
 }
 }

  function set_End($End)
 {
$aaa=strtotime($this->Start);
$w=$End;
$aa=date('H:i',$aaa+$w*30*60);
 if($aa){

 	$this->End=$aa;
 	return true;
 }	
 else
 {
 	return false;
 }
}
function set_End_sa($End)
 {

 if($End){

 	$this->End=$End;
 	return true;
 }	
 else
 {
 	return false;
 }
}


  function set_hall_num($hall_num)
  {

 	if ($hall_num>=1&&$hall_num<=10){
	$this->hall_num=$hall_num;
	return true;
}
 else
 {
 	return false;
 }
 }

  function set_id_day($id_day){
 	if ($id_day>=1&&$id_day<=7){
	$this->id_day=$id_day;
	return true;
}
 else
 {
 	return false;
 }
 	
 }
 //////////////////////////////get/////////////
  function get_Start()
 {

	return $this->Start;
 }


function get_End()
 {
 	return $this->End;
}


  function get_hall_num()
  {

	return $this->hall_num;

 }

  function get_id_day(){
 	
	return $this->id_day;

 }

///////////////////////////////////////////////////////////////	

	
	
/////////////////////////////////////////////////////////////////////	
 function number_of_time($i)
	{
		$sql="select * from timetable where id_day='$i' and active=1   ORDER BY `timetable`.`Start` ASC";
		if($qury=mysql_query($sql))
	    {
	    	return $qury;
		}
		else {
			return FALSE;
		}
	}		
 function number_of_time_tea($i,$id)
	{
		$sql="select * from timetable where id_day='$i' and ID_T='$id'  and timetable.active=1 ORDER BY `timetable`.`Start` ASC";
		if($qury=mysql_query($sql))
	    {
	    	return $qury;
		}
		else {
			return FALSE;
		}
	}		
	
	////////////////////////////////////////

	
//////////////////////////////////////////////////////	

	public function show($id)
	{
$sql="SELECT level.level AS level,
subject_level.id AS id
FROM level  JOIN subject_level
ON level.id=subject_level.id_level  where subject_level.id_subject = $id";
		//echo $sql;
		$rrr= mysql_query($sql);
		return $rrr;
	}
	
	
	
public function add_timetable($ID_T,$Start,$End,$id_day,$ID_SU,$ID_Hall,$val)
{
 $today = date('l F j ,n, Y, g:i a '); 
	if($_POST['paytype']==1){
$sql="INSERT INTO `timetable`(`Start`, `End`, `id_day`, `ID_T`, `ID_SU`, `ID_Hall`,`active`,`end_data`,`Date`,`price`)
 VALUES ('$Start','$End','$id_day','$ID_T','$ID_SU','$ID_Hall','0',36,'$today','$val')";
$quer=mysql_query($sql);
  if ($quer) {
      return mysql_insert_id();
  }
  else {
      return FALSE;
  }}

  
$sql="INSERT INTO `timetable`(`Start`, `End`, `id_day`, `ID_T`, `ID_SU`, `ID_Hall`,`active`,`end_data`,`Date`,`price`)
 VALUES ('$Start','$End','$id_day','$ID_T','$ID_SU','$ID_Hall','1',36,'$today','$val')";
$quer=mysql_query($sql);
  if ($quer) {
      return mysql_insert_id();
  }
  else {
      return FALSE;
  }

  
}



////////////////////////////////////////////////////////////
public function check_time($Start,$End,$id_day,$ID_Hall,$id_t)
{



	$x=1;
	$y=1;
	$xx=1;
    $yy=1;
    $Start=strtotime($Start);
    $End=strtotime($End);
	
    $sql="select * from timetable where id_day=$id_day and ID_Hall=$ID_Hall and active=1";
    $quer=mysql_query($sql);
	while (@$row=mysql_fetch_array($quer))
	{

		$Start_d=strtotime($row['Start']);
		
        $End_d=strtotime($row['End']);
       
		if($Start>=$Start_d && $Start<$End_d)
		{
			$x=0;
		//	echo "<br>x = ".$x;
			if($End<=$End_d){
			$id=$row['ID'];
			//echo "<br>ID = ".$id;
			$sql3="select * from queue where id_type = 1 and id_t = $id_t and id_time_rq =$id ";
            $query3=mysql_query($sql3);
           if(!(mysql_num_rows($query3)>0))
           {
	 $sql="INSERT INTO `queue`(`id_type`,  `id_t`, `id_time_rq`) VALUES (1,'$id_t','$id')";
            $quer=mysql_query($sql);
               }
			
			}
		}
		
		
		if($End > $Start_d && $Start <= $Start_d)
		{
			$y=0;
		//	echo "<br>y = ".$y;
		}
	}



$sql="select * from reserve_teacher where day=$id_day and hall=$ID_Hall";
 $quer=mysql_query($sql);
while (@$row=mysql_fetch_array($quer))
	{

		$Start_d=strtotime($row['start']);
		
        $End_d=strtotime($row['end']);
       
		if($Start>=$Start_d && $Start<$End_d)
		{
			$xx=0;
		//	echo "<br>x = ".$x;
			if($End<=$End_d){
			$id=$row['id_time'];
			//echo "<br>ID = ".$id;
			$sql3="select * from queue where id_type = 1 and id_t = $id_t and id_time_rq =$id ";
            $query3=mysql_query($sql3);
           if(!(@mysql_num_rows($query3)>0))
           {
	          $sql="INSERT INTO `queue`(`id_type`,  `id_t`, `id_time_rq`) VALUES (1,'$id_t','$id')";
            $quer=mysql_query($sql);

               }
			
			}
		}
		
		
		if($End > $Start_d && $Start <= $Start_d)
		{
			$yy=0;
		//	echo "<br>y = ".$y;
		}
	}

		
if ($y==0||$x==0||$yy==0||$xx==0){
  return FALSE;
}
return TRUE;
}



/////////////////////////////////////////////////////////
public function check_time_stud($id,$Start,$End,$id_day)
{
	$x=1;
	$y=1;
	 $sql1="select active from user where id=$id";
  $quer=mysql_query($sql1);
    $row=@mysql_fetch_array($quer);
    
    if($row['active']==0)
    {
    	  return FALSE;
    }
    $Start=strtotime($Start);
    $End=strtotime($End);
	
    $sql="select Start,End
FROM timetable  JOIN joint_timetable ON  timetable.ID=joint_timetable.id_time
 JOIN user ON joint_timetable.id_st=user.id   where timetable.id_day=$id_day and user.id=$id and timetable.active=1";
    $quer=mysql_query($sql);
	while (@$row=mysql_fetch_array($quer))
	{

		$Start_d=strtotime($row['Start']);
		
        $End_d=strtotime($row['End']);
       
		if($Start>=$Start_d && $Start<$End_d)
		{
			$x=0;
		echo "<br>x = ".$x;
		
		}
		
		
		if($End > $Start_d && $Start <= $Start_d)
		{
			$y=0;
			echo "<br>y = ".$y;
		}
	}
		
if ($y==0||$x==0){
  return FALSE;
}

return TRUE;
}
//////////////////////////////////////////////////////////////
public function check_time_tec($id,$Start,$End,$id_day)
{
	$x=1;
	$y=1;
	 $sql1="select active from user where id=$id";
  $quer=mysql_query($sql1);
    $row=@mysql_fetch_array($quer);
    
    if($row['active']==0)
    {
    	  return FALSE;
    }
    $Start=strtotime($Start);
    $End=strtotime($End);
	
    $sql="select Start,End
FROM timetable  where id_day=$id_day and ID_T=$id and active=1";
    $quer=mysql_query($sql);
	while (@$row=mysql_fetch_array($quer))
	{

		$Start_d=strtotime($row['Start']);
		
        $End_d=strtotime($row['End']);
       
		if($Start>=$Start_d && $Start<$End_d)
		{
			$x=0;
		echo "<br>x = ".$x;
		
		}
		
		
		if($End > $Start_d && $Start <= $Start_d)
		{
			$y=0;
			echo "<br>y = ".$y;
		}
	}
		
if ($y==0||$x==0){
  return FALSE;
}

return TRUE;
}


/////////////////////////////////////////////////////////////
public function show_teaher_time($id){

  $sql="select 
  timetable.Start As Start
  ,timetable.End AS End
  ,timetable.id_day AS id_day
  ,day.day AS day
  ,timetable.ID AS ID
 FROM timetable  JOIN day
ON 
day.id=timetable.id_day where timetable.ID_T=$id and timetable.active=1 ";
    $quer=mysql_query($sql);
return  $quer;
}
///////////////////////////////////
public function show_student_time($id)
{

$sql="SELECT 
user.name AS name,
user.id AS id
 FROM user  JOIN joint_timetable ON  user.id=joint_timetable.id_st 
 JOIN user2 ON user2.id_teacher = user.id  
  JOIN level ON user2.level_id = level.id  
 JOIN timetable ON timetable.ID = joint_timetable.id_time  
 where timetable.ID=$id and timetable.active=1";
 mysql_query("set names utf8");
  $result=mysql_query($sql);
return  $result;
}

////////////////////////////////////////////
public function show_coursess($id)
{

$sql="SELECT 
user.name AS name,
day.day AS day,
subject.subject AS subject,
timetable.Start AS Start,
timetable.End AS End
 FROM user  JOIN timetable ON  user.id=timetable.ID_T 
 JOIN joint_timetable ON timetable.ID = joint_timetable.id_time	  
 JOIN day ON day.id = timetable.id_day  
 JOIN registration ON user.id = registration.ID_St_T  
 JOIN subject ON subject.id = registration.id_sub  
 where joint_timetable.id_st=$id and timetable.active=1";
 mysql_query("set names utf8");
  $result=mysql_query($sql);
return  $result;
}


/////////////////////////////////////////////////////////////////////
public function add_registration($id,$id_t)
{

$sql="INSERT INTO `joint_timetable`(`id_st`, `id_time`, `active`) 
VALUES ('$id','$id_t',1)";
$quer=mysql_query($sql);
  if ($quer) {
      return TRUE;
  }
  else {
      return FALSE;
  }
}
/////////////////////////////////
public function check_st_registration($id,$id_level)
{
$sql="select ID from timetable where ID_SU = $id_level and timetable.active=1";
$query=mysql_query($sql);
while($IDT=mysql_fetch_array($query)){
$idti=$IDT['ID'];
echo $idti;
$sql3="select * from joint_timetable where id_time = $idti and  id_st=$id";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	return false;
	
}}	
	return true;
}
//////////////////////////////////////////////
public function update_st_registration($id,$id_t,$idt_l)
{

$sql3="UPDATE `joint_timetable` 
SET `id_time`=$id_t WHERE `id_st`=$id and `id_time`=$idt_l ";
$query3=mysql_query($sql3);

	
}
//////////////////////////////////////////////////
public function payment($paytype,$arr_pay,$id_pr)
{
		$sql="SELECT payment_option.name AS name
,payment_option.type AS type
,payment_option.id AS id
 FROM payment_option  JOIN select_op_pay ON  select_op_pay.op_id=payment_option.id 
 JOIN payment ON payment.id = select_op_pay.pay_id
 where payment.id=$paytype";
 mysql_query("set names utf8");
 $result=mysql_query($sql);



	
$sql="select * from select_op_pay 
where pay_id=$paytype ORDER BY `select_op_pay`.`id` ASC ";
$query=mysql_query($sql);
$id_o=array();
$i=1;
while($row=mysql_fetch_array($query))
{
$id_o[$i]=$row['id'];
$i++;
}
$i=1;
while($row = mysql_fetch_array($result))
 {
 $d ="pay".$row['id'];
$pay=$_POST[$d];
$sql3="INSERT INTO `pay_select_values`(`payment_id`, `purchases_id`, `value`)
 VALUES ('$id_o[$i]','$id_pr','$pay')";
mysql_query($sql3);
$i++;
	}
return true;
}


public function update_te_time($id)
{

$sql3="UPDATE `timetable` SET `active`=0 WHERE `ID`=$id  ";
$query3=mysql_query($sql3);
$sql3="DELETE FROM `joint_timetable` WHERE `id_time`=$id";
$query3=mysql_query($sql3);

$sql="SELECT * FROM `queue` WHERE id_time_rq=$id";
$query3=mysql_query($sql);

while ($q=mysql_fetch_array($query3)){
	$id_u=$q['id_t'];
$sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
VALUES ('$id_u',3)";
mysql_query($sql);
}


}
///////////////////////////////////////////////////
public function Re_Scheduling_up($id)
{

$sql3="UPDATE `timetable` SET
 `Start`='$this->Start',
 `End`='$this->End',
 `id_day`='$this->id_day',
 `ID_Hall`='$this->hall_num',
 `end_data`=2 WHERE ID=$id ";
if($query3=mysql_query($sql3)){
return true;
}
else
{
	return false;
}
}
public function Re_Scheduling_save($id,$id_dataline)
{

$sql3="INSERT INTO `reserve_teacher`(`start`, `end`, `day`, `hall`, `id_data_line`, `id_time`)
 VALUES ('$this->Start','$this->End','$this->id_day','$this->hall_num','$id_dataline','$id') ";
/*
INSERT INTO `reserve_teacher`(`start`, `end`, `day`, `hall`, `id_data_line`, `id_time`)
 VALUES ('8:00','8:00',5,5',1,'$id') */
if($query3=mysql_query($sql3)){
return true;}
else
{
	return false;
}

}
 	 function connect()
	 {
		 $amr=database::getinstance();
		 
	 }
	  function dele_Re_Scheduling_($id)
	 {
$sql3="DELETE FROM `reserve_teacher` WHERE id_time= $id";
$query3=mysql_query($sql3);
		 
	 }


}//class
/*
$amr= new timetable;
/*

$amr->connect();
if($amr->check_time('13:00', '15:00', 2, 2)){
echo "<br>exit";
}
else {
	echo "<br>no time";
}*/
?>

