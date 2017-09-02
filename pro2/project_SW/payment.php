

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
include '../clasess/interface.php';
 include '../clasess/database.php';



	include '../clasess/exam.php';
	$amr= new exam;
 $amr->connect();
 $q = $_GET['q'];
if(!($q==0)){
$sql="SELECT payment_option.name AS name
,payment_option.type AS type
,payment_option.id AS id
 FROM payment_option  JOIN select_op_pay ON  select_op_pay.op_id=payment_option.id 
 JOIN payment ON payment.id = select_op_pay.pay_id
 where payment.id=$q";
 mysql_query("set names utf8");
 $result=mysql_query($sql);

?>
<br>



     
<?php
while($row = @mysql_fetch_array($result))
 {  ?>

<label for="specify"><?php echo $row['name']?></label>
<br>
<input type="text" name="pay<?php echo $row['id']?>" placeholder=""/>
<br>
 <?php }}
 
 ?>
  	   



