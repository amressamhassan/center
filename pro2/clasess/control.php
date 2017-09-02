<?php

	/**
	 * 
	 */
	class control extends  show3
	{
	
	
	public $msg;	
	private $email;
	private $password;
	private $name;
	private $value;
	
	function set_email($email)
	{
		$this->email = $email;
	}
	
		function set_password($password)
	{
		$this->password = $password;
	}
	
	function get_email()
	{
		return $this->email;
	}
	 
	function get_password()
	{
		return $this->password;
	}
		 
	 function get_time()
	 {
	 	return date("h:i:sa");
	 	 
	 }
	 public function get_data()
	 {
	 	return date("Y.m.d");
	 	 
	 }

	  function show_num($query1){

		$sql=$query1;
        $query=mysql_query($sql);
       $num=mysql_num_rows($query);
       return $num;
	}



 function add_hall()
 {
	$sql3="select * from  hall where hall_num =$this->name";
       $query3=mysql_query($sql3);
      if(!(@mysql_num_rows($query3)>0))
   {

  $sql="INSERT INTO `hall`(`hall_num`, `vales`, `id_type`)
   VALUES ('$this->name','$this->value',1)";
            $quer=mysql_query($sql);
            return true;
   }

   else{

   	return false;
   }
 }

  function update_hall($id)
 {
	$sql3="select * from  hall where id =$id";
       $query3=mysql_query($sql3);
      if((@mysql_num_rows($query3)>0))
   {

  $sql="UPDATE `hall` SET `hall_num`='$this->name',`vales`='$this->value' WHERE id =$id";
            $quer=mysql_query($sql);
            return true;
   }

   else{

   	return false;
   }
 }
	
function delete_hall($id)
 {
	$sql3="select * from  hall where id =$id";
       $query3=mysql_query($sql3);
      if((@mysql_num_rows($query3)>0))
   {

  $sql="DELETE FROM `hall` WHERE  id =$id";
            $quer=mysql_query($sql);
            return true;
   }

   else{

   	return false;
   }
 }
 ///////////////////////SET/////////
 function set_name($name)
 {
if ($name) {
	$this->name=$name;
	return true;
}
 else
 {
 	return false;
 }
 }


function set_value($value)
 {

 if($value){

 	$this->value=$value;
 	return true;
 }	
 else
 {
 	return false;
 }
}



 //////////////////////////////get/////////////
  function get_name()
 {

	return $this->name;
 }


function get_value()
 {
 	return $this->value;
}

public function dateline_calu($id_date)
{
$mond;
$dayd;
	
$sql="SELECT * FROM `date_line` WHERE  id=$id_date";
$query=mysql_query($sql);
$id_day_from=mysql_fetch_array($query);
$id_day_from=$id_day_from['to'];
//echo $id_day_from;

$sql="select * from acadmic_year where id = $id_day_from  ";
$query=mysql_query($sql);
$id_mon_from=mysql_fetch_array($query);
$dayd=$id_mon_from['name'];
$id_mon=$id_mon_from['id_parint'];
//echo $dayd."<br>".$id_mon;


$sql="select * from acadmic_year where id = $id_mon  ";
$query=mysql_query($sql);
$id_mon_from=mysql_fetch_array($query);
$mond=$id_mon_from['name'];
//echo $mond. "<br>".$dayd."<br>".$id_mon;
$now_day=date('j');
//$now_day--;
//echo $now_day;
$now_mon=date('n');
//echo $now_mon;
if(!($mond>$now_mon)){
//	echo '<br>$mond>$now_mon';
if(($mond==$now_mon)){
	//echo '<br>$mond==$now_mon';
if($dayd<=$now_day){
		return FALSE;
}
}

else {
	return FALSE;
}
}


return true;

}



public function update_active($id,$table,$value)
{

$sql="UPDATE ".$table." SET `active`='$value' WHERE id = $id ";
$query=mysql_query($sql);
}
public function active_time($id,$table,$value,$id_u)
{

$sql="UPDATE ".$table." SET `active`='$value' WHERE ID = $id ";
$query=mysql_query($sql);

$sql="INSERT INTO `alert_users`(`id_us`, `id_alert`) 
VALUES ('$id_u',2)";
mysql_query($sql);
}
/*function show_day($name){
	 $sql="select * from ".$name;
	  mysql_query("set names utf8");
	 $query=mysql_query($sql);
	 return $query;
}*/
function show_payment($i){
	 $sql="select distinct  payment.name AS payment
	 from payment join select_op_pay on payment.id=select_op_pay.pay_id
	 join pay_select_values on select_op_pay.id=pay_select_values.payment_id
	 join timetable on timetable.ID=pay_select_values.purchases_id
	 where timetable.ID=$i
	 ";
	  mysql_query("set names utf8");
	 $query=mysql_query($sql);
	 $r=mysql_fetch_array($query);
	 return $r['payment'];
}

}

 ?>