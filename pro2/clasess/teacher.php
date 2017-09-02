<?php
/**
* ../project_SW/uploads/avatars/noimage.jpg
*/

//include 'user.php';
class teacher extends user
{
	

    
	private $subject_id;
	
/*  الخاص بشعل أحمد خالد محمد   */ 
	
		function __construct() {
			$this->active = 0;
			$this->deleted = 0;
			$this->user_type_id = 2;
			$this->login_date = 0;
		
		 }
	 public function set_subject_id($subject_id)
	{
		$this->subject_id = $subject_id;
	}
 
	
		public function get_subject_id()
	{
		return $this->subject_id ;
	}
	
////////////////////////////////////////////
		
function registration($name,$mail,$password,$phone,$image,$subject,$address){
	$sql="INSERT INTO user VALUES('','$name','$mail','$this->login_date','$password','$phone','$this->active','$address','$this->user_type_id','$this->deleted')";
	 mysql_query("set names utf8");
	$add_user = mysql_query($sql);

	if($add_user)
	{
	$id_user=mysql_insert_id();
	  $sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
                     VALUES ('$id_user',4)";
                        mysql_query($sql);
	$reg_subject = $this->registration_subject($id_user, $subject );
	$id_file = $this->add_file($image, 1, $id_user);
	$this->user_image($id_user, $id_file);
					
	}
	 if ($reg_subject)
	  {
	  return TRUE;
	}
 }
  
  /*  الخاص بشعل أحمد خالد محمد  Finish */ 
	
	////////////////////

    function set_error($error){

		$this->error=$error;
	}
////////////////////////////////////////
	function get_error(){
		return $this->error;
	}
/////////////////////////
	function set_error1($error1){

		$this->error1=$error1;
	}
//////////////////////
	function get_error1(){
		return $this->error1;
	}
////////////////////////
	function set_error2($error2){

		$this->error2=$error2;
	}
////////////////////
	function get_error2(){
		return $this->error2;
	}

////////////////////////

///////////////////////////////////////////////////////////////////////////
function add_teacher($table,$name,$mail,$language,$phone,$address){
		$mydate = date("Y.m.d");
		if ($table=="teacher") {
			$user_type=2;
			$sql="INSERT INTO address VALUES('','$address','6')";
			mysql_query($sql);
			$id_user=mysql_insert_id();
			$sql2="INSERT INTO user VALUES('','$name','$mail','$mydate','aaaaaa','$phone','0','$id_user','$user_type','0')";
			mysql_query($sql2);
		}
  

}
////////////////////////////////////////
function update_teacher($id,$id_address,$name,$mail,$language,$phone,$address){
    
	  $sql="UPDATE user SET name='$name',email='$mail',phone='$phone' WHERE id='$id'";
	  mysql_query($sql);
                 $sql2="UPDATE address SET address='$address' where id='$id_address'";
                 mysql_query($sql2);
}
////////////////////////////////////
    function delete_teacher($id){
   
                 $sql1="DELETE FROM user WHERE id='$id'";
                 mysql_query($sql1);
}


/////////////////////////////////////////////////

/****amr****/
function one_show_teacher($id){

    	 $sql = "SELECT name FROM user where id='$id'";
         $result = mysql_query($sql);
         return $result;
}

//////////////////////////////////
function search($id){

	$sql="SELECT user.*, teacher.*, school_language_level.* FROM teacher INNER JOIN user ON teacher.id_user= user.id INNER JOIN school_language_level ON teacher.language_ID= school_language_level.id where user.id='$id'";
    $query=mysql_query($sql);
}
///////////////////////
public function add_exam($amr,$id_level,$id_user,$id_sub)
{
	    $id_dataline="";
		$amr->set_name($_POST['name']);
		$amr->set_score($_POST['grade']);
		if($_POST['dayn'])
		{
		  if($amr->date_line($_POST['mon'],$_POST['dayn']))
		{
			    $id_dataline=$amr->date_line($_POST['mon'],$_POST['dayn']);
		}
		}
		else if($_POST['day'])	  
		{
		  if($amr->date_line($_POST['mon'],$_POST['day']))
		{
			    $id_dataline=$amr->date_line($_POST['mon'],$_POST['day']);
		}
		}
		else {
			return FALSE;
			echo "date error";
		}
			if($amr->add_exam($id_level,$id_user,$id_sub,$id_dataline)){
				return TRUE;
			}
	
}
/////////////////////////////////////////////////////////////
public function add_q($amr,$id_exam,$g){
	
	$an=array();
	$id_exam=$_GET['id'];
	$amr->set_score($_POST['grade']);
	$type_id=$_POST['Qtype'];
	$amr->set_q($_POST['descreption']);
	
if($type_id==1)
{
$an[1]=$_POST['right1'];
$an[2]=$_POST['right2'];
$an[3]=$_POST['right3'];
$an[4]=$_POST['right4'];
$r=$_POST['right'];
	if($r)
	{
		$amr->set_crr($_POST[$r]);
	}
}
else if($type_id==2){
	$an[1]="TRUE";
    $an[2]="false";
	///////////////////////
		$amr->set_crr($_POST['right4']);
	/////////////////////
	
    }
   
    $g=$g-$_POST['grade'];
	if($g>=0&&isset($_POST['descreption'])){
		
		//////////////////////////////////
	 $amr->add_ques($id_exam,$type_id, $an);
	 ///////////////////////////////
	 	return $g;
	 
		
	}
	else {
		return 0;
	}

	
}


public function add_reserv($amr,$ID_T,$arr)
{
	$val=$_POST['val'];
	if(!($val>=25&&$val<=40))
	{
     return FALSE;
	}
$aaa=strtotime($_POST['hours']);
$w=$_POST['to'];
$aa=date('H:i',$aaa+$w*30*60);
//echo $aa;
if($amr->check_time_tec($ID_T,$_POST['hours'],$aa,$_POST['day'])){
	
if($amr->check_time($_POST['hours'],$aa,$_POST['day'],$_POST['hall'],$ID_T))
{
if($id=$amr->add_timetable($ID_T,$_POST['hours']
	,$aa,$_POST['day'],$_POST['level'],$_POST['hall'],$val)){

if($amr->payment($_POST['paytype'],$arr,$id)){

return $id;
}
}
else {
	return FALSE;
}

}}
else {
return FALSE;
}

}

function show_time($id){

    	 $sql = "SELECT day.day AS day
,timetable.Start AS Start  
,timetable.ID AS id FROM 
 timetable  JOIN  day  ON day.id = timetable.id_day
 where timetable.ID_T='$id'";
         $result = mysql_query($sql);
         return $result;
}
function crr_qq($amr,$id_u,$id_q,$id_ex)
{
			
$amr->crr_q($id_u,$id_q,$id_ex);
	
}
function crr_ee($amr,$id_u,$id_ex,$p)
{
	$amr->crr_e($id_u,$id_ex,$p);

	
}
function updat_st_r($amr,$id,$id_t,$idt_l)
{
	
$amr->update_st_registration($id,$id_t,$idt_l);
	
}



public function Re_Scheduling($amr,$ID_T,$id,$ch)
{
	  
if($amr->check_time_tec($ID_T,$amr->get_Start(),$amr->get_End(),$amr->get_id_day()))
{
if($amr->check_time($amr->get_Start(),$amr->get_End(),$amr->get_id_day(),$amr->get_hall_num(),$ID_T))
{

$arr=$amr->show_time_table($id);
if($amr->Re_Scheduling_up($id))
{
  if($ch==2)
    {
 $id_dataline="";
		if($_POST['dayn'])
		{
		  if($amr->date_line($_POST['mon'],$_POST['dayn']))
		{
			    $id_dataline=$amr->date_line($_POST['mon'],$_POST['dayn']);
		}
		}
		else if($_POST['day_ac'])	  
		{
		  if($amr->date_line($_POST['mon'],$_POST['day_ac']))
		{
			    $id_dataline=$amr->date_line($_POST['mon'],$_POST['day_ac']);
		}
		}
		
		else {
			return FALSE;
			echo "date error";
		}
  echo $arr['id_day'];


    if($amr->set_Start($arr['Start']))
     {
      if($amr->set_End_sa($arr['End']))
        {
        if($amr->set_hall_num($arr['ID_Hall']))
        {
           $amr->set_id_day($arr['id_day']);

        }
      }
    }

   if($amr->Re_Scheduling_save($id,$id_dataline))
	 {
        return true;
	 }

  }
  else if($ch==1)
  {
  	 return true;
  }


}
   else{
		 return false;
      }
  }
  else{
	return false;
     }
}


else
    {
	return false;
    }


}
	
function count($type){
	$query = "SELECT COUNT(*) as num FROM user where user_type_id=$type";
  $query1=mysql_query($query);
  $total_pages = mysql_fetch_array($query1);
  $total_pages = $total_pages['num'];
  return $total_pages;
}


function count_teacher(){
	$query = "SELECT COUNT(*) as num FROM user inner join registration on registration.ID_St_T=user.id inner join subject on subject.id=registration.id_sub where user_type_id=2";
  $query1=mysql_query($query);
  $total_pages = mysql_fetch_array($query1);
  $total_pages = $total_pages['num'];
  return $total_pages;
}

function show_teacher($start,$limit){

    	  $sql = "SELECT 
    	  user.id AS id  
    	  ,user.name AS name  
    	  ,user.email AS email  
    	  ,user.phone AS phone  
    	  ,user.active AS active  
    	  ,subject.subject AS subject  
          ,file.Path AS Path  
    	  FROM user join registration  on registration.ID_St_T =user.id
          join subject  on registration.id_sub =subject.id
           join user_img  on user_img.id_user =user.id
            join file  on user_img.id_img =file.id
    	   where user.user_type_id=2 ORDER BY user.id ASC LIMIT $start, $limit";
        mysql_query("set names utf8");
         $result = mysql_query($sql);
         return $result;
}


}
?>