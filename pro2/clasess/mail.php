<?php 
/**
 * 
 */
  
 class mail   
{
	private $email_to;
	private $email_from;
	private $email_title;
	private  $email_contant = array();
	private $headers;
	
	function __construct() {
		
		    $this->headers="MIME-Version: 1.0 \r\n";
            $this->headers .="From: $this->email_from \r\n";
            $this->headers .="content-type: text /html; charset=utf-8\r\n";
            $this->headers .="X-priority: 3 \r\n";
			
			$this->email_contant['name'] = "";
			$this->email_contant['title'] = "";
			$this->email_contant['massage'] = "";
	}
	
	
	public function set_email_to($email)
	{
		if($this->check_email($email) == TRUE)
		{
			$this->email_to = $email;
		}
	}	
	
		public function set_email_from($email)
	{
		if($this->check_email($email) == TRUE)
		{
			$this->email_from= $email;
		}
	}
	
	public function set_email_contant($name,$title,$massage)
	{
		$this->email_contant['name'] = $name;
		$this->email_contant['title'] =$title;
		$this->email_contant['massage'] = $massage;
	}
	
	public function get_email_contant($index)
	{
		return $this->email_contant[$index];
	}	
	
	public function set_email_title($title)
	{
		$this->email_title = $title;
	}
 public function get_email_title()
	{
	return	$this->email_title;
	}
 
 public function get_email_to()
 {
 	return $this->email_to;
 }
  public function get_email_from()
 {
 	return $this->email_from;
 }
 
 public function get_headers()
 {
 	return $this->headers;
 }
 
 protected function get_time()
	 {
	 	return date("h:i:sa");
	 	 
	 }
 protected function get_data()
	 {
	 	return date("Y.m.d");
	 	 
	 }
	private function check_email($data)
	{
	 if (!preg_match(
        "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
        $data))
        {  return FALSE;
        }
     return TRUE;
	} 
	 
 
  
 public function send_email()
{
	 $name = $this->get_email_contant("name");
			$title = $this->get_email_contant("title");
			$massage = $this->get_email_contant("massage");

            $email_body = "You have received a new message. ".
            " Here are the details:\n . <br>Name: $name \n . 
            <br> Email: $this->email_from; \n .
            <br>Message \n $massage "; 
           
		    $success=mail($this->email_to,$this->get_email_title(),$email_body,$this->headers);
            if ($success) {
                return 1;
            }
     
		else{return 0;} // don't insert to database
		
	}
 }// End send email to visitor functoin 
        
 
 
   
 










 ?>
    