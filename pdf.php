<?php
require_once('tcpdf/tcpdf.php');
// include 'db_conn.php';
require_once "conn.php";
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 10, 5, 25, '', 'JPG', '', 'T', false, 200, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Title
        date_default_timezone_set('Asia/Calcutta');
        $tDate = date("F j, Y, g:i a");
        $html = '<p>Thermal Composition 4.0</p>';
        $this->writeHTML($html, true, false, false, false, 'R');
        $this->Cell(160.5, 4, 'Report Generated on: '.$tDate, 0, 0, 'R', 0, '', 0, false, 'T', 'M');       
        
        // $html ='<hr>';
        // $html ='<hr>';
        // $this->writeHTML($html, true, false, false, false, ''); 
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }}
    

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');


$pdf->SetPrintHeader(true); 

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// bg image properties
$pdf->AddPage('L');

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 

$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);

// set bacground image
$img_file = K_PATH_IMAGES.'.jpg';
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// ---------------------------------------------------------
//table starts from here
$pdf->AddPage('L');
$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true); 

$html = '<div style="text-align:center; line-height:60px;">PERSONAL INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl = '<br><table border="1" cellpadding="8">
<tr>
<td style="padding: 10px">Name</td>
<td style="padding: 10px">Shashi</td>
</tr>
<tr>
<td>Email</td>
<td>shashi@machintell.in</td>
</tr>
<tr>
<td>Contact No</td>
<td>7002533125</td>
</tr>
</table><br/>';
date_default_timezone_set('Asia/Calcutta');
$tDate = date("F j, Y, g:i a");
$pdf->writeHTML($tbl, true, false, true, false, 'C');
// ---------------------------------------------------------
$html = '<div style="text-align:center; line-height:60px;">ASSET INFORMATION</div><br/>';
$pdf->writeHTML($html, true, false, true, false, '');
$tbl1 = '<br><table border="1" cellpadding="8">

<tr>
<td>Total Temperature Sensing</td>
<td>3</td>
</tr>
<tr>
<td>Temperature Unit</td>
<td><span>&#176;</span>C</td>
</tr>
<tr>
<td>Report Generated On</td>
<td>'.$tDate.'</td>
</tr>
</table><br/>';
$pdf->writeHTML($tbl1, true, false, true, false, 'C');


$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The contents of these documents are confidential and privileged, intended solely for the recipient's information. Any use, publication, or redistribution without prior written consent from IIT Madras is strictly prohibited.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->AddPage('L');

$html = '<table id="Table_id" border="2" cellpadding="9">';
$html .="
<tr>
<th><strong>Id</strong></th>
<th><strong>S1</strong></th>
<th><strong>S2</strong></th>
<th><strong>S3</strong></th>
<th><strong>deflection</strong></th>
<th><strong>ML Model</strong></th>
<th><strong>Date</strong></th>
</tr>";

$sql = "SELECT * FROM data ORDER BY id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        
    {
        $id = $row["id"];
        $s1 = $row['s1'];
        $s2 = $row["s2"];
        $s3 = $row["s3"];
        $deflection = $row['deflection'];
        $model = $row['model'];
        $s4 = $row["date"];

        $html .="
        <tr>
        <td>".$id."</td>
        <td>". $s1 ."</td>
        <td>". $s2 ."</td>
        <td>". $s3 ."</td>
        <td>". $deflection ."</td>
        <td>". $model ."</td>
        <td>".$s4."</td>
        </tr>";
    }
}
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');


$pdf->AddPage('L');

$txt = <<<EOD
/---------------This Page is Intentionally Left Blank---------------/
EOD;
$pdf->Write(80, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
DISCLAIMER
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
The contents of these documents are confidential and privileged, intended solely for the recipient's information. Any use, publication, or redistribution without prior written consent from IIT Madras is strictly prohibited.
EOD;
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$txt = <<<EOD
/---------------This Page is Intentionally Left Blank---------------/
EOD;
$pdf->Write(60, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->Output('xy1waveguide.pdf', 'I');
?>