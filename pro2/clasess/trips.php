
	<?php
	
	class trips   {
		
		private $place;
		private $image;
		private $start_day;
		private $start_month;
		private $end_month;
		private $end_day;
		private $description;
		private $title;
	
	function set_place($place){
		$this->place=$place;
	}
	function get_place(){
		return $this->place;
	}
	function set_image($image){
		$this->image=$image;
	}
	function get_image(){
		return $this->image;
	}
	function set_start_day($start_day){
		$this->start_day=$start_day;
	}
	function get_start_day(){
		return $this->start_day;
	}
	function set_start_month($start_month){
		$this->start_month=$start_month;
	}
	function get_start_month(){
		return $this->start_month;
	}
	function set_end_day($end_day){
		$this->end_day=$end_day;
	}
	function get_end_day(){
		return $this->end_day;
	}
	function set_end_month($end_month){
		$this->end_month=$end_month;
	}
	function get_end_month(){
		return $this->end_month;
	}
	function set_description($description){
		$this->description=$description;
	}
	function get_description(){
		return $this->description;
	}
function set_title($title){
		$this->title=$title;
	}
	function get_title(){
		return $this->title;
	}
	function add(){
			
	if (isset($_POST['submit'])){
		


	$this->set_title($_POST['Title']);
  	$this->set_start_day($_POST['start_day']);
  	$this->set_start_month($_POST['start_month']);
	$this->set_end_day($_POST['end_day']);
	$this->set_end_month($_POST['end_month']);
	$this->set_description($_POST['description']);
	$this->set_image("genericpic.jpg");
	$this->set_place($_POST['place']);
	$inputplace=$_POST['inputplace'];
	if(!$this->place){
		$sql = "INSERT INTO `place` (place)  VALUES('$inputplace')";
		$query = mysql_query($sql);
		$this->place=mysql_insert_id();
		echo $this->place;
	}
		
		$sql="SELECT id FROM `type_ads_trip` where type='Trips'";
		$query = mysql_query($sql);
		$result = mysql_fetch_array($query);
		$type_id=$result['id'];
	//	$this->image $this->start_day
//$this->end_day
		$sql = "INSERT INTO `ads` ( Title, end_day, start_day, id_img , Description ,Type_ID)  VALUES('$this->title',1,1,1,'$this->description','$type_id')";
		$query = mysql_query($sql);	
		$id=mysql_insert_id();
		$sql = "INSERT INTO `trip` (id_ads, place_id)  VALUES('$id','$this->place')";
		$query = mysql_query($sql);
	
	}}
	function delete(){
		
        $ID=$_GET['id'];
      	mysql_query("DELETE FROM `ads` WHERE `ads`.`id`  = ".$ID."");
	}

	function show(){
		
	
	$query="SELECT `ads`.`id` AS id,
	`ads`.`Description` AS Description,
	`ads`.`start_day` AS start_day,
	`ads`.`end_day` AS end_day,
	`ads`.`id_img` AS img,
	`place`.`place` AS place 
	FROM `ads` INNER JOIN `trip` 
	ON `ads`.`id`=`trip`.`id_ads` JOIN `place` ON `trip`.`place_id`=`place`.`id` ORDER BY `trip`.`id_ads`  ";
	$result=mysql_query($query);
	if($result === FALSE) { 
    die(mysql_error());
}
	/* while($row=mysql_fetch_array($result)){
          $place  =$row['place'];
		  $Desc = $row['Description'];
          $ID=$row['id'];
		  $start_day=$row['start_day'];
		  $start_month=$row['start_month'];
		  $end_day=$row['end_day'];
		  $end_month=$row['end_month'];
     	  $img =  $row['img'];
  
  	echo "<tr><td>" . $ID. "</td>";
   	echo "<td>"  .$place . "</td>";
	echo '<td><img src='.$img.' width="150"/></td>';
   	echo "<td>" . $start_day. "/".$start_month."</td>";
   	echo "<td>" . $end_day. "/".$end_month."</td>";
	echo "<td>"  .$Desc . "</td>";
  	echo "<td width='16%'><a class='btn btn-lg btn-danger' type='submit' name='delete' href='delete_trip.php?id=".$ID."' />حذف
  	<a class='btn btn-lg btn-success' type='submit' name='delete' href='Trips-Update.php?id=".$ID."' />تعديل</td></tr>";
	  
	  }*/
	return $result ;	
	}
	
	function update(){
		
		
	}
	function show_places(){
		
	
	$query="SELECT * FROM `place`";
	$result=mysql_query($query);
	/*echo "<select  name='place' width='300' style='width: 50%'> <option selected value=''>اسم الرحلة</option>";
	while($row=mysql_fetch_array($result)){
          $place  = $row['place'];
		  $ID=$row['id'];
          echo "<option value='$ID'>$place</option>";
	  }
		echo  "</select><br><br>";*/
		return $result ;	
	}
	

	}

	
	
?>
	

