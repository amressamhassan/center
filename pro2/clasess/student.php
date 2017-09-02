<?php
/**
* 
*/
//include 'user.php';

class student extends user
{
	
 function __construct() {
			$this->active = 0;
			$this->deleted = 0;
			$this->user_type_id = 3;
			$this->login_date = 0;
			$this->language = 2;
		
		 }
		
   private $pphone;
    private $school;
    private $language;
    private $level;
     
  
			/***********  Set Functions ******************/
	public function set_pphone($pphone)
	{
		$this->pphone = $pphone;
	}
	
		public function set_school($school)
	{
		$this->school = $school;
	}
	
		public function set_language($language)
	{
		$this->language = $language;
	}
	
		public function set_level($level)
	{
		$this->level = $level;
	}
	
	
		/**************  Get Functions ******************************/
	
		public function get_pphone()
	{
		return $this->pphone ;
	}
	
		public function get_school()
	{
		return $this->school;
	}
	
		public function get_language()
	{
		return $this->language ;
	}
	
		public function get_level()
	{
		return $this->level ;
	}
		
  function registration($name,$mail,$password,$phone,$image,$address,$level,$school,$pphone,$languge){
		
			$sql="INSERT INTO user VALUES('','$name','$mail','$this->login_date','$password','$phone','$this->active','$address','$this->user_type_id','$this->deleted')";
			 mysql_query("set names utf8");
			$add_user = mysql_query($sql);

			 if($add_user)
				{
					$id_user=mysql_insert_id();
                    $sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
                     VALUES ('$id_user',4)";
                        mysql_query($sql);
					$id_file = $this->add_file($image, 1, $id_user);
				 
				 	$this->user_image($id_user, $id_file);
					$sql2= "INSERT INTO user2 VALUES('','$pphone','$level','$school','$id_user','$languge')";
					$add_user2 = mysql_query($sql2);
					 if ($add_user2) {
			 	
				 return TRUE;
			}
				}
			
 }
  
  /*  الخاص بشعل أحمد خالد محمد  Finish */ 
  
	 

 
 	/* Add Student to tdatabase */ 
 
function add_student($name,$mail,$language,$level,$phone,$pphone,$school,$address){
	$mydate = date("Y.m.d");
	$password = $this->encryption(123456);
	$user_type=3;
	
	$sql="INSERT INTO address VALUES('','$address','6')";
			mysql_query($sql);
			$id_address=mysql_insert_id();

			if ($language=="عربى") {
				$type_school=1;
			}
			elseif ($language=="لغات") {
				$type_school=2;
			}
			elseif ($language=="ازاهرى") {
				$type_school=3;
			}
			$sql1="INSERT INTO school VALUES ('','$school','$language')";
			mysql_query($sql1);
			$id_school=mysql_insert_id();

			$sql3="INSERT INTO level VALUES ('','$level')";
			mysql_query($sql3);
			$id_level=mysql_insert_id();

			$sql2="INSERT INTO user VALUES('','$name','$mail','$mydate','$password','$phone','0','$id_address','$user_type','0')";
			mysql_query($sql2);
			$id_user=mysql_insert_id();

			$sql4="INSERT INTO user2 VALUES ('','$pphone','$id_level','$id_school','$id_user','$language')";
			mysql_query($sql4);
      
}

function update_student($id_user2,$id_level,$id_school,$id_language,$id_user,$id_address,$name,$mail,$language,$level,$school,$sphone,$pphone,$address){

	  $sql="UPDATE user SET name='$name',email='$mail',phone='$sphone' WHERE id='$id_user'";
      $query = mysql_query($sql);
	  $sql1="UPDATE address SET address='$address' WHERE id='$id_address'";
	  $query1 = mysql_query($sql1);
	  $sql3="UPDATE school SET school='$school' WHERE id='$id_school'";
	  $query3 = mysql_query($sql3);
	  $sql4="UPDATE user2 SET p_phone='$pphone',level_id='$id_level',school_id='$id_school',language_ID='$id_language' WHERE id='$id_user2'";
	  $query4 = mysql_query($sql4);
}


 function delete_student($id){
     
	             $sql1="DELETE FROM user2 WHERE id='$id'";
                 mysql_query($sql1);
}
 
	
function show_all ($start,$limit)
{
	 
	 
	$sql = "SELECT user.id AS id,
user2.id AS id2,
user.name AS name,
user.phone AS phone,
user.active AS active,
user2.p_phone AS p_phone
	 FROM user inner join user2 
	on user.id=user2.id_teacher where user_type_id=3 ORDER BY user.id ASC LIMIT $start, $limit";
          mysql_query("set names utf8");
         $result = mysql_query($sql);
         return $result;
	 
	
}

function search_by_name($search)
{
		$search = mysql_real_escape_string($search);
		$search = htmlspecialchars($search);
	
	$sql = '"SELECT * FROM user  WHERE name LIKE '%".$search."%'"';	
} 

function add_registration($amr,$id,$id_su,$id_level)
{
	
	$arr=$amr->show_time_table($id);
	if($amr->check_st_registration($id_su,$id_level))
	{
       if($amr->check_time_stud($id_su,$arr['Start'],$arr['End'],$arr['id_day']))
	   {
	
	     if($amr->add_registration($id_su,$id))
	     {
		return true;
	     }
	    else
	    {
	    return false;
	    }
		
	   }	
	}
    else
   {
	 return false;
   }
		
} 

	
function show_great_student ($start,$limit)
{
	 
	$sql1 = "SELECT * FROM great_student inner join user on great_student.id_st=user.id inner join user2 on user.id=user2.id_teacher inner join level on user2.level_id=level.id inner join school on user2.school_id=school.id inner join registration on registration.ID_St_T=user.id inner join subject on subject.id=registration.id_sub order By great_student.order Asc LIMIT $start, $limit";
         $result1 = mysql_query($sql1);
         return $result1;
	 
	
}
	function count_great_student()//mohmed
	{
		$s = "SELECT COUNT(*) as nums FROM great_student";
  $query2=mysql_query($s);
  $total_pages_student = mysql_fetch_array($query2);
  $total_pages_student = $total_pages_student['nums'];
  return $total_pages_student;
	}


 function show_co($amr,$id)//amr
{
	$a=$amr->show_coursess($id);
	return $a;
	
}
function count($type){
$query = "SELECT COUNT(*) as num FROM user where user_type_id=$type";
  $query1=mysql_query($query);
  $total_pages = mysql_fetch_array($query1);
  $total_pages = $total_pages['num'];
  return $total_pages;
 }
}
                	 
//print_r ($amr->show_levels());
//echo($amr->add_student("ahmed Ehab", "aaaaaa", "medo@gmai.com", "2", "3", "0100005456", "01985445", "2", "1"));
//$amr->add_student($name, $pass, $mail, $language, $level, $phone, $pphone, $school, $address)
 



?>