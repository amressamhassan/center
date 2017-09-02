<?php

/**
* 
*/

abstract class report 
{

	public $ne;
	
	public function getID($selected_query){
		$sql=$selected_query;
		$query=@mysql_query($sql);
		$row=@mysql_fetch_array($query);
		return $row;
	}

	public function checkID($id){
	
		$sql="SELECT id FROM user_value_exame WHERE id_user=$id";
		$query=mysql_query($sql);
		if (mysql_num_rows($query) > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function student_status($percent){
		$s=0;
		if ($percent >=90 && $percent<95) {
			$s=350;
			$this->ne='ممتاز';
		}
		elseif ($percent >=80 && $percent<90) {
			$s=350;
			$this->ne='جيد جدا';
		}
		elseif ($percent >=70 && $percent <80) {
			$s=300;
			$this->ne='جيد';
		}
		elseif ($percent >=60 && $percent <70) {
			$s=250;
			$this->ne='مقبول';
		}
		elseif ($percent==50) {
			$s=200;
			$this->ne='متوسط';
		}
		elseif ($percent >50 && $percent <60) {
			$s=150;
			$this->ne='ضعيف';
		}
		elseif ($percent >=40 && $percent <50) {
			$s=100;
			$this->ne='راسب';
		}
		elseif ($percent >=30 && $percent <40) {
			$s=80;
			$this->ne='راسب';
		}
		elseif ($percent >=20 && $percent <30) {
			$s=50;
			$this->ne='راسب';
		}
		elseif ($percent >=0 && $percent <20) {
			$s=30;
			$this->ne='راسب';
		}
		elseif ($percent >=95 ) {
			$s=15;
			$this->ne='امتياز';
		}
		return $s;
	}


	function show_time_table($i){
	
$time_table=array();

$sql="SELECT subject.subject AS subject
,level.level AS level
,user.name AS name
,hall.hall_num AS hall_num
,hall.vales AS vales
,timetable.Start AS Start
,timetable.End AS End
,timetable.ID_T AS ID_T
,timetable.id_day AS id_day
,timetable.ID_Hall AS ID_Hall
,day.day AS day
 FROM subject INNER JOIN subject_level ON  subject.id=subject_level.id_subject 
 JOIN level ON subject_level.id_level=level.id  
 JOIN timetable
 JOIN user ON user.id = timetable.ID_T
 JOIN hall ON hall.id = timetable.ID_Hall
 JOIN day ON day.id = timetable.id_day
 where subject_level.id=timetable.ID_SU and timetable.ID=$i
  and timetable.active=1";
 mysql_query("set names utf8");
$qu=mysql_query($sql);
$rows=@mysql_fetch_array($qu);
	
$time_table=array('Start' => $rows['Start'] ,
	              'End' => $rows['End'],
	              'name' => $rows['name'],
	              'sub' => $rows['subject'],
	              'level' => $rows['level'],
	              'hall_num' => $rows['hall_num'],
	              'ID_T' => $rows['ID_T'],
	              'id_day' => $rows['id_day'],
	              'ID_Hall' => $rows['ID_Hall'],
                  'vales' => $rows['vales'],
                  'day' => $rows['day']
	              );
 
 return $time_table;
	}
}




                        