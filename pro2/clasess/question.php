<?php

/**
* 
*/

class question
{
  
  function count($query){
        $sql = $query;
        $query1=mysql_query($sql);
		if(mysql_num_rows($query1)>0){
        if($total_pages = mysql_fetch_array($query1)){
        $total_pages = $total_pages['num'];
        return $total_pages;}}
		else {
			return 0;
		}
  }

  function select($query,$start,$limit){
    $sql = $query; 
         $result = mysql_query($sql);
         return $result;
  }

  function select_question($id){
     $sql = "SELECT questions_user.*,user.name,level.level,subject.subject FROM questions_user inner join user on questions_user.id_user=user.id inner join level on questions_user.id_level=level.id inner join subject on questions_user.id_subject=subject.id WHERE id_user='$id'";
         $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
               $row=mysql_fetch_array($result);
               return $row;
   }  
       else{
               return 1;
   }
  }

}
?>