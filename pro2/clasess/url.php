<?php


 class url{
	 
	 function show_url($id_user,$id_par)
	 {
		 $sql="select url.url AS url,
		 url.id AS id,
		 url.link_play AS link_play,
		 url.parint_id AS parint_id
		 from url join url_user on url.id=url_user.id_url
		  where url_user.id_user_type=$id_user and url.parint_id=$id_par
		  ORDER BY `url`.`id` ASC
		 ";
		 
		  mysql_query("set names utf8");
		 $query=mysql_query($sql);
		 return $query;
		 
	 }
	 function connect()
	 {
		 $amr=database::getinstance();
		 
	 }



	

}



//$data  = array('name' => "ahmed", 'phone'=>"012165478" );
// print_data ($data);
/*function print_data ($data)
{
	 
}
*/
 
	

?>