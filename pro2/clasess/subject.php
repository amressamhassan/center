<?php
	
 	/* $name=$_post['name'];
     $level=$_post['level'];
     $date=$_post['date'];*/
        
        
class subject {

	
		
	
	private $name;
    private $date;

	
	
 	
	 
	/*****************************  SET Functions *************************/
	function set_name($name)
	{
		
$this->name=$name;		
	}
	
		
	
	/*****************************  Get Functions *************************/
		function get_name()
	{
		
		return $this->name;
	}



	
	
	/*****************************  Other Functions *************************/
	
 
	function add (){
		$conn=mysql_connect("localhost","root","root","deyar");
        

    $name=$_POST ['name'];
        
            
   $query=mysql_query("INSERT INTO `deyar`.`subject` (`id`, `name`, `level_id`) VALUES (NULL, '".$name."', '');");
                
            
        }
    /*mysqli_query($conn,$query);*/
        
	

	function delete ($id){
        $conn=mysql_connect("localhost","root","root");
        mysql_select_db ("deyar");
         
$query="delete from subject where id=$id";
    
        mysql_query($query);
    
	}

	/*function s_show()
    {
     $conn=mysql_connect("localhost","root","root");
          mysql_select_db ("deyar");

$query="SELECT * FROM school_language_level join subject ON school_language_level.id =subject.level_id join types ON types.id=school_language_level.type_id";
        
       $r= mysql_query($query,$conn);

        $row=mysql_fetch_array($r);
        $num = mysql_num_rows($row);
        echo $num;
    
        
        }*/
}

        
$a=new subject;

$v=16;
$a->delete($v);

    
    

/*$a->s_show();
?>
