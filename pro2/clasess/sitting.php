<?php

	class sitting  extends database {
		
		private $center_name;
		private $center_url;
		private $center_title;
		private $center_desc;
		private $center_phone;
		private $center_facebook_url;
		public $error;
	/*****************************  SET Functions *************************/
	
	public function set_center_name($name,$valid)
	{
		if($valid->valid_name($name)){	
	$this->center_name=$name;
		}else{
			return $error="invalid name";
		}
	}
	public	function set_center_url($url)
	{
	
		$this->center_url=$url;
		
	}
	public	function set_center_title($title,$valid)
	{
		if($valid->valid_name($title)){	
			$this->center_title=$title;
		}else{
			return $error="invalid title";
		}
	}
	public	function set_center_phone($phone,$valid)
	{
		if($valid->valid_phone($phone)){
			$this->center_phone=$phone;
		}else{
			return $error="invalid phone";
		}
	}
	public	function set_facebook_url($facebook)
	{
		
			$this->center_facebook_url=$facebook;
	
	}
	
	public	function set_center_desc($desc)
	{
		
			$this->center_desc=$desc;
		
	}
	
	
/*****************************  Get Functions *************************/
	
	public function get_center_name()
	{
		return 	$this->center_name;
	}
		public function get_center_url()
	{
		return 	$this->center_url;
	}
		public function get_center_title()
	{
		return 	$this->center_title;
	}
		public function get_center_phone()
	{
		return 	$this->center_phone;
	}
		 public function get_facebook_url()
	{
		return 	$this->center_facebook_url;
	}
	
		public function get_center_desc()
	{
		return $this->center_desc;
	} 
	 
	/*****************************  Other Functions *************************/
	
	 
	function update_info ($center_name,$center_phone,$center_title,$center_desc,$center_url,$center_facebook_url)
	{
		$center_url=$center_url.".com";
$sql ="UPDATE `settings` SET `center_name` = '$center_name', `center_ph` = '$center_phone', `url` = '$center_url', `title` = '$center_title', `facebook` = '$center_facebook_url', `Description` = '$center_desc' WHERE `id` = 1";
		
			if(	mysql_query($sql)){
				return TRUE;
				
			}
	}								
	}


?>