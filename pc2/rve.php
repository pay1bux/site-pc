<?php

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
require_once 'functii-rve.php';

connect();
select_db($link);

/**
 * Extend TCPDF to work with multiple columns
 */
class MC_TCPDF extends TCPDF {

	/**
	 * Print chapter
	 * @param $num (int) chapter number
	 * @param $title (string) chapter title
	 * @param $content (string) name of the file containing the chapter body
	 * @param $mode (boolean) if true the chapter body is in HTML, otherwise in simple text.
	 * @public
	 */
	public function PrintChapter($content, $mode=false) {
		// add a new page
		$this->AddPage();
		// set columns
		$this->setEqualColumns(2);
		// print chapter body
		$this->ChapterBody($content, $mode);
	}

	/**
	 * Print chapter body
	 * @param $content (string) name of the file containing the chapter body
	 * @param $mode (boolean) if true the chapter body is in HTML, otherwise in simple text.
	 * @public
	 */
	public function ChapterBody($content, $mode=false) {
		$this->selectColumn();
		// set font
		$this->SetFont('times', '', 15);
		$this->SetTextColor(50, 50, 50);
		// print content
		if ($mode) {
			// ------ HTML MODE ------
			$this->writeHTML($content, true, false, true, false, 'J');
		} else {
			// ------ TEXT MODE ------
			$this->Write(0, $content, '', 0, 'J', true, 0, false, true, 0);
		}
		$this->Ln();
	}
} // end of extended class

// ---------------------------------------------------------
// EXAMPLE
// ---------------------------------------------------------
// create new PDF document
$pdf = new MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 010');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 010', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

$result = getLocalitati();
$text = "";
$i = 0;
while ($row = mysql_fetch_assoc($result)) {
    $i++;
    $text = $text . "<strong>= COLET CADOU, GRATUIT =</strong><br /><strong><u><i>Destinatar:</i></u></strong><br />Reprezentantul localitatii<br />"
            . $row["localitate"] ."<br />in Consiliul Primariei (sau Consilierului local)<br />loc. "
            . $row["localitate"] ."<br />cod " . $row["cod_postal"] ."<br />jud. " . $row["judet"] ."<br /><br /><br />";
    if ($i % 8 == 0) {
        $pdf->PrintChapter($text, true);
        $text = "";
    }
}

// print TEXT
//$pdf->PrintChapter(1, 'LOREM IPSUM [TEXT]', 'tcpdf/cache/chapter_demo_1.txt', false);

// print HTML
//$pdf->PrintChapter(2, 'LOREM IPSUM [HTML]', 'tcpdf/cache/chapter_demo_2.txt', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('etichete.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

