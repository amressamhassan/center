<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","daynum.php?q="+str,true);
        xmlhttp.send();
    }
    
}


</script>
<?php
 session_start();

 if(!(@$_SESSION['techer']))
 {
  
HEADER ("location:index.php");
}
   include 'pages/header-2.php';
//echo"<br><br><br><br><br><br><br><br><br><br><br><br><br>";


 $amr=new timetable;
 $amrr=new teacher;
$idd=$_POST['id'];
 
if(isset($_POST['submit1']))
{

 if($amr->set_Start($_POST['hours']))
 {
    if($amr->set_End($_POST['to']))
    {
      if($amr->set_hall_num($_POST['hall']))
      {
         if($amr->set_id_day($_POST['day']));
      }
    }
 }




$ID_T=$_SESSION['id'];
if($amrr->Re_Scheduling($amr,$ID_T,$idd,$_POST['right']))
{
   echo " <script>alert('done')</script>" ;
}
else 
{
   echo " <script>alert('NOT')</script>" ;
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
			   	     
	

					</div> 
			<?php
			if($_POST['right']==2){
			?>

 
   
        <label for="text">ينتهى</label>
        
<select onchange="showUser(this.value)" name="mon" id="parent_selection" style="width: 30% ;height:5%;">
         	<option >---- الشهر ------</option>
                 <?php
                 		 $sqlq=$amrr->show(1,"id_parint","acadmic_year");
	while ($mon=mysql_fetch_array($sqlq)){
             	       ?>
     <option  value="<?php echo $mon['id']?>">
     	<?php  echo $mon['name']?></option>
 <?php }?>
  </select>
   
       <select id="txtHint" name="day_ac" id="parent_selection" style="width: 30% ;height:5%;">
   
 	<option >---- اليوم  ------</option>
 	
 	 	    <option value="">اخر</option>

 	
     </select>
     <div id="otherType" style="display:none;">
<label for="specify">اخر</label>
<input type="text" name="dayn" placeholder="يوم"/>
</div>
    <?php
    }?>
    <center>
    <input type="hidden" name="id" value="<?php echo $idd; ?>"  />
    <input type="hidden" name="right" value="<?php echo $_POST['right']; ?>"  />
        	     <input type="submit" href="#small-dialog" name="submit1" class="btn" value="احجز قاعتك">
         </center>
              		</form>
 		      	</div>
    
      <script>
    	 $('#txtHint').on('change',function(){
        if( $(this).val()===""){
        $("#otherType").show()
        }
        else{
        $("#otherType").hide()
        }
    });
    
    	
    </script> 
  
	 	 <br><br><br><br>
              <?php
	for ($i=1; $i <=7; $i++){
	 
    $num=$amr->number_of_time($id[$i]);
	if(mysql_num_rows($num)>0)
	{
?>	         

	

				 
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
