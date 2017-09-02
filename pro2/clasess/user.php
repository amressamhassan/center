<?php

 class user extends users3
 {
	protected $name;
    protected $email;
	protected $login_date;
    protected $phone;
    protected $address_id;
	protected $password;
	protected $img;
	protected $user_type_id;
	protected $deleted;
	protected $active;
	
	/***********  Set Functions ******************/
function set_email($mail,$val)//moh
{
 	
	if($val->valid_email($mail))//&& checkMail($mail))
	{
		$this->email = $mail;
		return true;

	}

	else
	{
		return false;
	}

}
	function set_address($address)//moh
	{
		$this->address=$address;
	}

	public function set_name($name,$val)
	{
		if($val->valid_name($name)){
		$this->name = $name;
			return true;
	}
	else
	{
		return false;
	}
	}
	

	
		public function set_phone($phone,$val)
	{
		if($val->valid_phone($phone)){
		$this->phone = $phone;
			return true;
	}
	else
	{
		return false;
	}
	}
	
		public function set_password($password,$val)
	{
		if($val->valid_pass($password)){
		$this->password = $this->encryption($password);
			return true;
	}
	else
	{
		return false;
	}
	}
	
		 public function set_img($img)
	{
		$this->img = $img;
	}
		 public function set_address_id($address_id)
	{
		$this->address_id = $address_id;
	}
	/**************  Get Functions ******************************/
	
		public function get_name()
	{
		return $this->name ;
	}
	
		public function get_email()
	{
		return $this->email;
	}
	
		public function get_phone()
	{
		return $this->phone ;
	}
	
		public function get_password()
	{
		return $this->password ;
	}
	
		 public function get_img()
	{
		return $this->img ;
	}
		 public function get_address_id()
	{
		return $this->address_id;
	}
	
	/********  Other Functions *********************/
	 function encryption($data)
	{
		return md5($data);
	}
	
	
   protected function get_time()
	 {
	 	return date("h:i:sa");
	 	 
	 }
 protected function get_data()
	 {
	 	return date("Y.m.d");
	 	 
	 }
	 
	 public function check_email($email)
	 {
	 	$query = "SELECT id FROM user WHERE email='$email' ";
    	$result = mysql_query($query) or die(mysql_error());
		 if (mysql_num_rows($result) > 0 ) {
		 
        return FALSE;
    	}
		return TRUE; 
	 }
	 
  protected function registration_subject($user_id,$subject_id)  // registration subject from users {Teacher And student }
  {
  	$date = $this->get_data();
  	$sql="INSERT INTO registration VALUES('','$user_id','$subject_id','$date')";
	$registration = mysql_query($sql);
	if ($registration) {return TRUE;}
  }
  
  protected function add_file($pass,$id_type,$id_user)
  {
  	$sql="INSERT INTO file VALUES('','$pass','$id_type','$id_user')";
	$added = mysql_query($sql);
	if ($added) {
		$id_file=mysql_insert_id();
		return $id_file;
	 }
	
  }

protected function user_image($id_user,$id_file)
{
	$date = $this->get_data();
	$sql="INSERT INTO user_img VALUES('','$id_file','$id_user','$date')";
	$added = mysql_query($sql);
	
}
	  
	
	
	function SELECT($selected_query){
		$sql="$selected_query";
		$query=mysql_query($sql);
		$row=mysql_fetch_array($query);
		return $row;
	}

	 	function UPDATE($selected_query){
		$sql="$selected_query";
		$query=mysql_query($sql);
		if ($query) {
			return true;
		}
		else
		{
			return false;
		}
	}
	 
	
	
	
///////////////////////////////////amr///////////////////////	

	



	
	}
/////////////////////////////amr END/////////////////////////////	
	
	
	
	
	
	



//	$ahmed =new user;

//$data  = array('name' => "ahmed", 'phone'=>"012165478" );
// print_data ($data);
/*function print_data ($data)
{
	 
}
*/
 
	

?>