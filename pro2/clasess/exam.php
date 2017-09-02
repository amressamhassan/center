<?php

/**
 * 
 */

 class exam extends  show3
  {
	private $name_exam;
	private $score;
	private $q;
	private $corr;
	private $error="error";
	
	
	////////funtions////
		 function connect()
	 {
		 $amr=database::getinstance();
		 
	 }

	
function add_exam($id_level,$id_user,$id_sub,$id_dataline)
{

 $today = date('l F j ,n, Y, g:i a '); 
$sql="INSERT INTO `exam`(`name_exam`, `score`, `id_sub`, `id_user`, `id_level`, `id_data_line`, `data`, `active`) VALUES('$this->name_exam','$this->score','$id_sub','$id_user','$id_level','$id_dataline','$today','0')";
  mysql_query("set names utf8");
	
	if(mysql_query($sql)){
		return TRUE;
	}
	else {
		return FALSE;
	}	
	
	}
	
	
public function add_ques($id_exam,$type_id,$an)
{
$sql="INSERT INTO `questions`(`Questions`,`type_id`, `id_exam`, `score`)
 VALUES ('$this->q','$type_id','$id_exam','$this->score')";
   mysql_query("set names utf8");
 mysql_query($sql);
 
$id_q= mysql_insert_id();
$con=1;
if($type_id==1)
{
	$con=4;
}
else if($type_id==2){
	$con=2;
    }


for ($i=1; $i<=$con; $i++) {		 
$sql2="INSERT INTO `answers`(`answer`, `qu_id`, `order`)
 VALUES ('$an[$i]','$id_q','$i')";
   mysql_query("set names utf8");
 mysql_query($sql2);
 
 if($an[$i]==$this->corr)
 {
 	 $id_cor= mysql_insert_id();
$sql3="INSERT INTO `corrct`(`id_q`, `id_an`)
 VALUES ('$id_q','$id_cor')";
   mysql_query("set names utf8");
 mysql_query($sql3); 
 }
	}
}

function crr_q($id_u,$id_q,$id_ex)
{
	
$sql3="select * from answer_user where id_user = $id_u and id_ex = $id_ex and id_q=$id_q";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id1=$day['id'];
$sql="UPDATE `answer_user` SET `score`='$this->score' where id = $id1 ";	
  mysql_query("set names utf8");
 mysql_query($sql); 
return TRUE;
	
}
			
$sql2="INSERT INTO `answer_user`( `id_user`, `id_ex`, `id_q`, `score`) 
VALUES ('$id_u','$id_ex','$id_q','$this->score')";
  mysql_query("set names utf8");
 mysql_query($sql2);
	
}
function crr_e($id_u,$id_ex,$p)
{
 $today = date('l F j ,n, Y, g:i a '); 
$sql3="select * from user_value_exame where id_user = $id_u and id_ex = $id_ex";
$query3=mysql_query($sql3);
if(mysql_num_rows($query3)>0){
	$day=mysql_fetch_array($query3);
	$id1=$day['id'];
$sql="UPDATE `user_value_exame` SET `d_exam`='$today' ,`score`='$this->score',`percent`='$p' where id=$id1 ";	
mysql_query($sql); 
return TRUE;
	
}
			
$sql2="INSERT INTO `user_value_exame`(`id_user`, `id_ex`, `score`, `percent`, `d_exam`)
VALUES ('$id_u','$id_ex','$this->score','$p','$today')";
  mysql_query("set names utf8");
 mysql_query($sql2);
	return TRUE;
}



public function show_level()
	{
		$sql="select * from level";
		$query=mysql_query($sql);
		return $query;
		
	}
	public function active_exame($id)
	{
	$sql ="UPDATE `exam` SET `active`= 1 WHERE id='$id'";
	if(mysql_query($sql)){
		return TRUE;
	}
	else {
		return FALSE;
	}	
	
	}

		public function show_information_exame($id,$id_p)
	{
		$sql="select user.name AS name,
		subject.subject AS subject,
		level.level AS level,
		exam.id AS id,
		exam.id_data_line AS id_data_line,
		exam.name_exam AS name_exam
		from user join exam on user.id=exam.id_user  
		join subject on subject.id=exam.id_sub 
		join level on level.id=exam.id_level
         where ".$id_p."=$id
		";
		$rrr= mysql_query($sql);
		return $rrr;
	}
	/*************SET FUNCTION****************/
	public function set_name($name)
	{
		$this->name_exam = $name; 
	}
	
		public function set_score($score)
	{
		$this->score = $score; 
	
	}
	
	public function set_q($q)
	{
		$this->q = $q; 
		
	}
	public function set_crr($cro)
	{
		$this->corr = $cro; 
		
	}
	/**************************/
}
 /*
"SELECT exam.name_exam AS name_exam
,answers.order AS `order`
,exam.score AS score
,questions.questions AS questions
,questions.score AS score_q
,answers.answer AS answer
,answers.qu_id AS qu_id
,corrct.id_q AS id_q
 FROM exam LEFT  JOIN questions ON  exam.id=questions.id_exam 
 LEFT JOIN answers ON  questions.id=answers.qu_id 
 LEFT JOIN corrct ON answers.id=corrct.id_a  
 where  exam.id=25";

*/


	 
/*
$r=	$amr->show(27,"id_exam","questions");
$i=1;
while ($q=mysql_fetch_array($r)){
	
	echo $i."_". $q['Questions']."<br>";
	
	$rr=$amr->show($q['id'], "qu_id","answers");
	$s="";
    $sh="";
	while ($qq=mysql_fetch_array($rr)){
			echo $qq['order']."  ";
			echo $qq['answer']."  ";
		$rrr=$amr->show($qq['id'], "id_a","corrct");
		
		while ($qqq=mysql_fetch_array($rrr)){
			
			if($qq['id']==$qqq['id_a']){
	    $s=$qq['answer'];
	    $sh=$qq['order'];	
		}
	}}
	echo "an <br>";
	echo $sh."  ".$s;;
	$i++;
	echo "<br> <br> <br>";
}*/

//$amr->date_line(6,1);
//$r=	$amr->show(1,"id","timetable");
//$i=1;
//while ($q=mysql_fetch_array($r)){
	//$aaa='13:00';
	///$aaa=strtotime('13:00');
	//$f=explode(":", $aaa);
//	echo $f[0]."<br>";
	//$aa=$aa;
//$aaa=strtotime('13:00');
//	$w=1;
//	$aa=date('H:i',$aaa+$w*30*60);
	//$t=1.30;
	//strtotime('10:00');
//	$rr=explode(":", $aa);
	
	//$qq=$aa+"1:30";
	//date('H:i',$qq);
//$aa=$aa.":00";
//echo $aa;
//$aaa=strtotime('13:30');
//$aa=strtotime('14:00');
	//if($q['Start']==$aa)
	//echo $q['Start'];
	//}
	/*$h="13:50";
	$hh="00:00:00";
$aaa=strtotime($h);
$aa=strtotime($hh);
if($aaa<=$aa)
echo "H;fv";*/
?>
