<?php
 
 
	/**
	 * 
	 */
	class info{
		
		 
	public function select_all($table)
	{
		
    	 $sql = "SELECT * FROM  $table";
         $result = mysql_query($sql);
		 return $result;
	} 
		 
 	 
		 
		 
	}
	




?>