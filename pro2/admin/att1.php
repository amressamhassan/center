<?php 
  
   include 'include/header.php';  
if(!isset( $_SESSION['emil']))
{
	
HEADER ("location:../project_SW/");
} 
     
    $control=new control;
    $admin=new admin;

      

      
      $amr=new timetable;
      $amr->connect();
      $today = date('l');
      $today = "'".$today ."'";
     // echo  $today;
      $a=$admin->show($today,"day_en","day");
      $time=new timetable;
      $time1=mysql_fetch_array($a);
      $timeid=$admin->show($time1['id'],"id_day","timetable");
      

       




?> 
        <CENTER>
<table width="100%" border="5" >
<tbody>
<tr>

<th>مواعيد اليوم </th>



</tr>
<?php 
while ($row=@mysql_fetch_array($timeid)){
 $time3=$time->show_time_table($row['ID']);
		
		if($time3['ac']==1){
		
	  ?>
	  
<tr>
<td><a href="att2.php?id=<?php echo $time3['ID'];?>" >
<span><?php echo $time3['hall_num'].":".$time3['name'].":".$time3['sub'].":".$time3['level'];?></span></a></td>
</tr>
</tbody>
<?php  


}}?>
</table>	

        </CENTER>
    </div><!-- /page-title -->
     
 
        
 <?php include 'include/footer.php';  ?>
   