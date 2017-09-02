<?php

class admin extends user
 {
	public $error;
	private $confirm;

	
		public function set_confirm_pass($confirm){
			$this->confirm=$confirm;
		}
		public function add_new_admin($name,$email,$pass){
		if($name&&$email&&$pass){
			$sql="INSERT INTO user	values('','$name','$email','0','$pass','$img','1')";
			if(mysql_query($sql))
			{
				return TRUE;
			}}
		}	
 function update_hall($amr,$id)
 {

return $amr->update_hall($id);
 }

function add_hall($amr)
 {

 return $amr->add_hall();
 }

function delete_hall($amr,$id)
 {
  $a= $amr->show($id,"ID_Hall","timetable");
while ($row=mysql_fetch_array($a)) {
	$id_u=$row['ID_T'];
	$sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
VALUES ('$id_u',5)";
mysql_query($sql);
}
 return $amr->delete_hall($id);
 }



function show_time_table($i){
	


$sql="SELECT user.id AS id
,user.name AS name
 FROM timetable  JOIN joint_timetable ON  timetable.ID=joint_timetable.id_time 
 JOIN user ON user.id=joint_timetable.id_st  
 where  timetable.ID=$i and timetable.active=1";
 mysql_query("set names utf8");
$qu=mysql_query($sql);

return $qu;
}


function att_day($id)
 {

 $fromd=date('j');
	
$fromm=date('n');
$id2;	
$sql="select * from acadmic_year where id_parint = 1 and name = $fromm ";
$query=mysql_query($sql);
$day=mysql_fetch_array($query);
$idm_f=$day['id'];

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

$sql3="select * from  attendance where id_t =$id and id_date =$id2";
     $query3=mysql_query($sql3);
     if(!(@mysql_num_rows($query3)>0))
   {

  $sql="INSERT INTO `attendance`(`id_t`, `id_date`)
   VALUES ('$id','$id2')";
            $quer=mysql_query($sql);
            $id_d=mysql_insert_id();
            return  $id_d;
   }

   else{
	$day=mysql_fetch_array($query3);
	$id_d=$day['id'];
	return  $id_d;
}
 }

function add_att($id_user,$id_att)
{
$sql3="select * from  attendance_user where id_user =$id_user and id_attendance =$id_att";
     $query3=mysql_query($sql3);
     if(!(@mysql_num_rows($query3)>0))
   {
$sql3="INSERT INTO `attendance_user`(`id_user`, `id_attendance`)
 VALUES ('$id_user','$id_att')";
     $query3=mysql_query($sql3);
     return true;
}
else{
     return false;

}

}




function alrt($id_user)
{
$sql3="select alert.alert AS alert,
alert_users.id AS id,
alert_users.id_alert AS id_alert
 from  alert join alert_users on alert.id=alert_users.id_alert where alert_users.id_us =$id_user";
  mysql_query("set names utf8");
 return mysql_query($sql3);
   
}

function alrt_d($id)
{
$sql3="DELETE FROM `alert_users` WHERE id=$id";

 mysql_query($sql3);
   
}
	}

	
?>