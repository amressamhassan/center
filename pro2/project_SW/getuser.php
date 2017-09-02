<!DOCTYPE html>
<html>
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    
</head>
<body>

<?php
$q = $_GET['q'];
$x = $_GET['x'];
include '../clasess/interface.php';
include '../clasess/timetable.php';
include '../clasess/database.php';



$amr=new timetable;
$amr->connect();



if($x==1){
$sql="select distinct  user.name AS name
,user.id AS id
from timetable join subject_level on subject_level.id =timetable.ID_SU
join user on user.id =timetable.ID_T
where timetable.ID_SU=$q  and timetable.active=1";
mysql_query("set names utf8");
$result = mysql_query($sql);
if(mysql_num_rows($result)>0){
?>

<select onchange="show(this.value,<?php echo $q ;?>,2)" name="t" width="300" style="width: 100%">
	    <option selected value="">اسم المدرس
                                       </option>
<?php
}
while($row = mysql_fetch_array($result))
 {
  

  echo  "<option value='".$row[id]."'>".$row[name]."</option>";

  
  $a=1;
}
echo "</select>";

}

if($x==2){
$a = $_GET['type'];

$sql="select distinct  day.day AS day
,day.id AS id
from timetable join day on day.id =timetable.id_day
join user on user.id =timetable.ID_T
where timetable.ID_SU=$a and timetable.ID_T=$q  and timetable.active=1";
mysql_query("set names utf8");
$result = mysql_query($sql);
if(mysql_num_rows($result)>0){
?>

<select onchange="sh(this.value,<?php echo $q ;  ?>,<?php echo $a ;  ?>,3)" name="d" width="300" style="width: 100%">
	    <option selected value="">اليوم
                                       </option>
<?php
}
while($row = mysql_fetch_array($result))
 {
  echo  "<option value='".$row['id']."'>".$row['day']."</option>";
}
echo "</select>";

}




if($x==3){
	$t = $_GET['t'];
	$l = $_GET['level'];
$sql="select   hall.hall_num AS hall_num
,timetable.Start AS Start
,timetable.ID AS id
from timetable join day on day.id =timetable.id_day
join user on user.id =timetable.ID_T
join hall on hall.id =timetable.ID_Hall
where timetable.ID_SU=$l and timetable.id_day=$q and timetable.ID_T=$t
 and timetable.active=1";
mysql_query("set names utf8");
$result = mysql_query($sql);
if(mysql_num_rows($result)>0){
?>

<select  name="h" width="300" style="width: 100%">
	    <option selected value="">الساعة
                                       </option>
<?php
}
while($row = mysql_fetch_array($result))
 {
  

  echo  "<option value='".$row['id']."'>".$row['Start']." فى ".$row['hall_num'] ."</option>";

  
  
}

echo "</select>";

}
?>


</body>
</html>