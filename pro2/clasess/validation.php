<?php
class validation{
	public function valid_phone($phone){
		if(is_numeric($phone)&&ctype_digit($phone)){
if(preg_match("/^[0]{1}[1]{1}[0-9]{1}[0-9]{8}$/", $phone)) {
			return true;	
		}
	}

	else{
		return false;
	}
	}
	
	
	
	public function valid_pass($pass)
	{
		if(strlen($pass)>=6){
			return true;
		}else{
			return false;
		}
	}
	
	
	public function valid_name($name){
		 
	 if(is_numeric($name)){
				 return false;
		 }else{
			 if(preg_match("([أ-ي])",$name)){
				 return true;
			 }else{
			 return false;
			 }
				  }
	}
	
	
	public function valid_email($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}
}
 
 
?>
