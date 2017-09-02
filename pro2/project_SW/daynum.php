

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
include '../clasess/interface.php';
	include '../clasess/exam.php';
	$amr= new exam;
	include '../clasess/database.php';
include '../clasess/url.php';
 $amra=new url; 

$amra->connect();

	
 $q = $_GET['q'];
$result=$amr->show($q,"id_parint","acadmic_year");



?>

      <select name="day" id="parent_selection" style="width: 30% ;height:5%;">
      	 	<option >---- اليوم  ------</option>
<?php
while($row = mysql_fetch_array($result))
 {  ?>
 	
 <option  value="<?php echo $row['name']?>"><?php  echo $row['name']?></option>
 
 <?php }
 
 ?>
  	    <option value="">اخر</option>
      </select>



