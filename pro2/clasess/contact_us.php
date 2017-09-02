<?php
class contact_us{
	private $email;
	private $title;
	private $content;
	private $date;
	public $error = ''; 
	  public function set_email($email,$valid)
	 {
	 	if($valid->valid_email($email))
		{
			$this->email=$email;
		} 
		else {
			$this->error = "wrong Email";
		}
	 }
	 public function set_title($title,$valid){
	 	if($valid->valid_message($title)){
	 	$this->title=$title;
		}else{
			$this->error="wrong title";
		}
	 }
	 public function set_content($content,$valid){
	 	if($vaile->valid_message()){
	 	$this->content=$content;
		}else{
			$this->error="wrong content";
		}
	 }
	 public function set_date($date,$valid){
	 	if($valid->valid_message()){
	 	$this->date=$date;
		}else{
			$this->error="invalid data";
		}
	 }
	   public function get_email()
	 {
		 return $this->email;
	 }
	 public function get_title(){
	 	 return $this->title;
	 }
	 public function get_content(){
	 	return $this->content;
	 }
	 public function get_date(){
	 	 return $this->date;
	 }
	 public function insert_contact($email,$title,$content,$date){
	 		$con_host = "localhost";
	
			#Username
				$con_user = "root";
			#Password`
				$con_pass = "root";
			#nameserver
				$con_data = "dayr4"; 
				
			$con = mysql_connect($con_host,$con_user,$con_pass) or die ('error connect server');
			if ($con) {
				$con_select_db =mysql_select_db($con_data)  or die ('Error select Database');
				
				} 
				$sql = "INSERT INTO `contact-us` (id,email,Title,Content,Date)
				VALUES('','$email','$title','$content','$date')";	
				mysql_query($sql);
			}
	 public function delet_contact($id){
	 	$con_host = "localhost";
	
			#Username
				$con_user = "root";
			#Password
				$con_pass = "root";
			#nameserver
				$con_data = "dayr4"; 
				
			$con = mysql_connect($con_host,$con_user,$con_pass) or die ('error connect server');
			if ($con) {
				$con_select_db =mysql_select_db($con_data)  or die ('Error select Database');
				} 
			$sql="DELETE FROM `contact-us` WHERE id='$id'";
			mysql_query($sql);
	 }
	 public function show_contact(){
	 	$con_host = "localhost";
	
			#Username
				$con_user = "root";
			#Password
				$con_pass = "root";
			#nameserver
				$con_data = "dayr4"; 
				
			$con = mysql_connect($con_host,$con_user,$con_pass) or die ('error connect server');
			if ($con) {
				$con_select_db =mysql_select_db($con_data)  or die ('Error select Database');
				}
				$sql="SELECT *FROM `contact-us`";
			$row=mysql_query($sql);
			$array = mysql_fetch_array($row);
			return $array; // array 
				
	 } 
			}					
$a=new contact_us;


;

?>