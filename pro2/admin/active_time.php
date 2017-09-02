<?php

   include 'include/header.php'; 
    
if(!isset( $_SESSION['emil']))
{
    
  HEADER ("location:../project_SW/");
} 
   $i=$_GET['id'];

   //include '..\clasess\timetable.php'; 
   $timetable=new timetable;
   $control=new control;
$t=$timetable->show_time_table2($i);

if($timetable->check_time_tec($t['ID_T'],$t['Start'],$t['End'],$t['id_day'])){
	
if($timetable->check_time($t['Start'],$t['End'],$t['id_day'],$t['ID_Hall'],$t['ID_T']))
{
 $control->active_time($i,"timetable",1,$t['ID_T']);
  echo " <script>alert('done')</script>" ;
echo "<meta http-equiv='Refresh' content='0;URL=../project_SW/pdf3.php?id=".$i."' />";
}

}
else {
	echo "<meta http-equiv='Refresh' content='0;URL=timetable.php' />";
}



?>