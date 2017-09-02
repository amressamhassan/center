<?php


 class database 

{
private $db_host="localhost";
	private $db_user="root";
	private $db_password="root";
	private $db_name="dyar";
	private $error;
	private $myconn;
	private $query;
	 
public static $instance=null;
public static function getinstance(){

	if(!isset(database::$instance)){

	database::$instance= new database();

	}
	return database::$instance;

	}



	private function __construct(){
			$connect=@mysql_connect($this->db_host,$this->db_user,$this->db_password);
		if ($connect) {
			
	$con_select_db = @mysql_select_db($this->db_name)
	or die ('Error select Database');
	}}
}




?>
