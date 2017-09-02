<?php
session_start();
 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
// echo"<br><br><br><br><br><br><br><br><br><br><br><br><br>";


 $amr=new timetable;
 $amrr=new teacher;

 
if(isset($_POST['submit'])){
	$arr=array();
$idp=$_POST['paytype'];

	
		
$sql="SELECT payment_option.name AS name
,payment_option.type AS type
,payment_option.id AS id
 FROM payment_option  JOIN select_op_pay ON  select_op_pay.op_id=payment_option.id 
 JOIN payment ON payment.id = select_op_pay.pay_id
 where payment.id=$idp";
 mysql_query("set names utf8");
 $result=mysql_query($sql);


while($row = mysql_fetch_array($result))
 {
 $d ="pay".$row['id'];
$pay=$_POST[$d];
$arr+=array($row['id'] =>$pay );

	
  }
 
		
		
		
	
	


	$ID_T=$_SESSION['id'];
	if($arr){
if($id_pdf=$amrr->add_reserv($amr,$ID_T,$arr))
{
   if($_POST['paytype']==2)
   {

echo "<meta http-equiv='Refresh' content='0;URL=pdf3.php?id=".$id_pdf."' />";
   }
   echo " <script>alert('done')</script>" ;

}
else {

	   echo " <script>alert('error NOT done')</script>" ;
}
}
else {
	
	 echo " <script>alert('error NOT done')</script>" ;
}

}
   /*$aaa=strtotime('13:00');
	$w=1;
	$aa=date('H:i',$aaa+$w*30*60);
	echo $_POST['hours'];
   echo $aa;*/
   
   
	$a=$amr->show_day("day");
	
	$id=array();
	$day=array();
	$i=1;
	 while($row=mysql_fetch_array($a)){
	 $id[$i]=$row['id'];
	 $day[$i]=$row['day'];
	 $i++; 
	 }
	 ?>	      	
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("otherType").innerHTML = "";
        return;
    } else  { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("otherType").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","payment.php?q="+str,true);
        xmlhttp.send();
    }
    
}
  </script>
     <div class="main" id="container">
	 	<div class="content">	
	  <div class="about_desc section" id="section-2"> 
              <div class="wrap">  
              	
              	<div class="section group example">
              		<form method="post" action="" id="reservation">
              			<div class="col_1_of_2 span_1_of_2"> 
              			
				
					
							 
	  <label for="job">رقم  القاعه</label>
      <select name="hall" id="hall" style="width: 100%;">
                       	
         <option >***القاعة***</option>
                 <?php
                 	$a=$amr->show_day("hall");
					while($row=mysql_fetch_array($a)){
                 ?>  
     <option  value="<?php echo $row['id'];?>">  <?php echo $row['hall_num'];?></option>
	<?php
			}?>
     </select>
     				  	 
     				  	 
     				  	 
     				  	    <label for="job">المستوى</label>
   <select name="level" id="hall" style="width: 100%;">
                       	
                       	   <option >***المستوى***</option>
                 <?php
                 	$a=$amr->show($_SESSION['id_sub']);
					while($row=mysql_fetch_array($a)){
                 ?>  
     <option  value="<?php echo $row['id'];?>">  <?php echo $row['level'];?></option>
	<?php
			}?>
     </select>
     
     
     
     
      <label for="job">المعاد </label>
   	     <select name="hours" id="" style="width: 100%;">
   	     	 <option >***من***</option>
              				<?php
  $start=strtotime('8:00');
  $end=strtotime('20:00');
for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {
    printf('<option value="%s">%s</option>',date('H:i',$halfhour),date('g:i a',$halfhour));
}
              				?>  </select>
              				
              				  <label for="job">ثمن الحصة</label>
		<select name="val" id="day" style="width: 100%;">
                 <option >***الثمن***</option>
               
                 <option  value="20">20 جنية</option>
		        <option  value="25">25جنية</option>
		        <option  value="30">30جنية</option>
		        <option  value="35">35جنية</option>
		        <option  value="40">40جنية</option>
			     </select>
							</div>

						<div class="col_1_of_2 span_1_of_2"> 
							
							
							
	<label for="job">اليوم </label>
      <select name="day" id="day" style="width: 100%;">
                       	    <option >***اليوم***</option>
                       	<?php
                       	
                      for ($i=1; $i <=7 ; $i++) { 
                          
                   
						   ?>
                 <option  value="<?php echo $id[$i] ?>"><?php echo $day[$i] ?></option>
			<?php
			}?>
			     </select>
			     
			     
			     
			      <label for="job">المدة </label>
		<select name="to" id="day" style="width: 100%;">
                 <option >***المدة***</option>
               
                 <option  value="2">ساعة</option>
		        <option  value="3">ساعة ونصف</option>
		        <option  value="4">ساعتاين</option>
		        <option  value="5">ساعتين ونصف</option>
		        <option  value="6">ثلاث ساعات</option>
			     </select>

			   	      <label for="job">طريقة الدفع </label>
				<select onchange="showUser(this.value)"  name="paytype" id="paytype" style="width: 100%;">
                 <option >***طريقة الدفع***</option>
					  <?php
					  	$a=$amr->show_day("payment");
					while($row=mysql_fetch_array($a)){
					  ?>
	
               
                 <option  value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		   <?php
					}
		   ?>
 
			     </select>
  <div id="otherType" >
 
</div>
 
</div> 
    <script>
    /*	 $('#paytype').on('change',function(){
        if( $(this).val()==="2"){
        $("#otherType").show()
        }
        else{
        $("#otherType").hide()
        }
    });
      	 $('#paytype').on('change',function(){
        if( $(this).val()==="1"){
        $("#otherTyp").show()
        }
        else{
        $("#otherTyp").hide()
        }
    });*/
    	
    </script> 
        	     <input type="submit" href="#small-dialog" name="submit" class="btn" value="احجز قاعتك">
         
              		</form>
 		      	
  

              <?php
	for ($i=1; $i <=7; $i++){
	 
    $num=$amr->number_of_time($id[$i]);
	if(mysql_num_rows($num)>0)
	{
?>	         

	 	 <br><br><br><br><br><br><br><br>   

				 
<h3><?php  echo $day[$i];
?></h3>
<table class="example-table">
<tbody>
<tr>
<th>اسم الماده</th>
<th>المرحله الدراسيه </th>
<th>اسم المدرس</th>
<th>رقم القاعة</th>
<th>من</th>
<th>إلي</th>
</tr>
<?php }
while ($row=mysql_fetch_array($num)){
		  $t=$amr->show_time_table($row['ID']);
	  ?>
<tr>
<td><?php   echo  $t['sub']."<br>";   ?> </td>
<td><?php  echo  $t['level']."<br>";  ?></td>
<td> <?php  echo  $t['name']."<br>";  ?></td>
<td> <?php  echo  $t['hall_num']."<br>";  ?></td>
<td><?php  echo  $t['Start']."<br>";  ?></td>
<td><?php  echo  $t['End']."<br>";  ?></td>
</tr>
</tbody>
<?php  }?>
</table>	


	<!--- End one Row of timetable ------>     
 <?php }
 ?>
 </div> 
</div>  

       	 </div>
  

 <?php  include 'pages/footer.php'; ?>
