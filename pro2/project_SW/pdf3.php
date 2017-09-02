<?php
include '../clasess/interface.php';
 include '../clasess/database.php';
include '../clasess/url.php';
include '../clasess/control.php';
 $amr=new url; 

$control=new control;
$amr->connect();
$test='Dyar Center';
//============================================================+
require_once('tcpdf/tcpdf.php');



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $i=$_GET['id'];
 $pay=$control->show_payment($i);
$t=$pdf->show_time_table($i);

//set default header data
$pdf->SetCreator(PDF_CREATOR);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $test.' 2015 ',1);

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
$pdf->SetFont('aefurat','B', 20);

// add a page
$pdf->AddPage();
$e=$t['End'];
 $today = date('j /n/ Y'); 

$pdf->Write(0, 'فاتورة للمدرس فى مركز ديار التعليمى', '', 0, 'C', true, 1, false, false, 0);
$b='<br>';
$pdf->writeHTML($b, true, false, false, false, '');
$pdf->SetFont('aefurat','B', 12);
$pdf->Write(0, 'التاريخ : '.$today, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'اسم المدرس :'.$t['name'], '', 0, 'R', true, 0, false, false, 0);
$pdf->writeHTML($b, true, false, false, false, '');
$pdf->writeHTML($b, true, false, false, false, '');
/*
$pdf->Write(0, ' رقم التيلفون : 01124567645 ', '', 0, 'R', true, 0, false, false, 0);
$pdf->writeHTML($b, true, false, false, false, '');
$pdf->writeHTML($b, true, false, false, false, '');
$pdf->Write(0, ' مدرسة : عمر بن الخطالب ', '', 0, 'R', true, 0, false, false, 0);

*/
$e=4444444444;

$pdf->SetFont('aefurat', '', 18);

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="1" cellspacing="3" align="right">
                <tr>

                    <td align="Center"> $i
 </td>
                    <td> فاتورة رقم </td>
                </tr>
                <tr>

                    <td align="Center"> $t[hall_num]
                    </td>
                    <td> قاعة رقم </td>
                </tr>
                <tr>
                    <td align="Center"> $t[vales] جنية
                    </td>
                    <td> قيمة القاعة </td>

                </tr>
                  <tr>
                    <td align="Center"> $t[day]
                     </td>
                    <td> يوم الدرس</td>
                    
                </tr>

                  <tr>
                    <td align="Center"> $t[Start]
                     </td>
                    <td>المعاد</td>
                    
                </tr>
                  <tr>
                    <td align="Center"> $t[sub]
                     </td>
                    <td>المادة</td>
                    
                </tr>
                  <tr>
                    <td align="Center"> $t[level]
                     </td>
                    <td>المستوى</td>
                    
                </tr>
                   <tr>
                    <td align="Center"> $pay
                     </td>
                    <td>طريقة الدفع</td>
                    
                </tr>

            </table>
      <br><br><br><br><br><br><br><br>
           أمضاء<br>
        .............
EOD;
$pdf->writeHTML($b, true, false, false, false, '');

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf2.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>