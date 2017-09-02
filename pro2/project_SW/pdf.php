<?php
 	  session_start();
	  include '../clasess/interface.php';
 include '../clasess/database.php';
include '../clasess/url.php';

 $amr=new url; 

$amr->connect();
$test='Dyar Center';
//============================================================+
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$id=$_SESSION['id'];  //session user_id
$id_exam=$_GET['id_exam'];
   if ($pdf->checkID($id) == false) {
   	echo "that id not exist !!!";
   }
   	else
   	{
   		//echo "this id is $id";
   		$selected_query="SELECT  
   		exam.score AS score_all ,
   		exam.name_exam AS name_exam ,
   		subject.subject AS subject,
   		level.level AS level ,
   		user.id AS id ,
   		user.name AS name ,
   		user_value_exame.score AS score,
   		user_value_exame.percent AS percent ,
   		user_value_exame.d_exam AS d_exam 
   		FROM exam inner join subject on exam.id_sub=subject.id 
   		inner join level on exam.id_level=level.id
   		 inner join user on exam.id_user=user.id 
   		 inner join user_value_exame on user_value_exame.id_ex=exam.id 
   		 WHERE exam.id=$id_exam and  user_value_exame.id_user=$id";
		  mysql_query("set names utf8");
        $row=$pdf->getID($selected_query);
   	
   	$html1="<center><h1>تقرير الامتحان رقم : ".$row['id']."</h1></center>";

// set document information
$pdf->SetCreator(PDF_CREATOR);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $test.' 2015 ', $row['id']);

// set header and footer fonts  tcpdf_logo
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

IMPORTANT:
If you are printing user-generated content, tcpdf tag can be unsafe.
You can disable this tag by setting to false the K_TCPDF_CALLS_IN_HTML
constant on TCPDF configuration file.

For security reasons, the parameters for the 'params' attribute of TCPDF
tag must be prepared as an array and encoded with the
serializeTCPDFtagParameters() method (see the example below).

 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


$html = '<table border=".4" cellspacing="0" cellpadding="2">
						<tbody>
							<tr>
								<th>'.$row['subject'].'</th>
								<th>'.$row['level'].' </th>
								<th> '.$row['name_exam'].' </th>
							</tr>

							<tr>
								<td> درجة الطالب  </td>
								<td> درجة الامتحان </td>
								<td> النسبه المئويه </td>

							</tr>

							<tr>
							

								<td> '.$row['score'].'  </td>
								<td> '.$row['score_all'].' </td>
								<td> '.$row['percent'].'%</td>
							</tr>

							<tr>
								<th>'.$row['name'].'</th>
								<th> مدرسه الصديق </th>
								<th> '.$row['d_exam'].'</th>
							</tr>
						</tbody>
					</table>';

$pdf->SetFont('aefurat', '', 18);// output the HTML content
$pdf->writeHTML($html, true, 0, true, 1);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$xc = 105;
$yc = 140;
$r = 50;
//$n='جيد جدا';
$ss=$pdf->student_status($row['percent']);
//$pdf->SetFillColor(0, 0, 255);
//$pdf->PieSector($xc, $yc, $r, 20, 50, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 20, $ss, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, $ss, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
//$pdf->Text(105, 105, 'good');
$pdf->Text(95, 135, $pdf->ne);
//$pdf->Text(120, 155, 'bad');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf.pdf', 'I');
}
//============================================================+
// END OF FILE
//============================================================+



?>
