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
		$this->AddPage('P', 'A4');
		// set columns
		$this->setEqualColumns(2, 100);
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
		$this->SetFont('freesans', '', 13.5);
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
$pdf->SetCreator("Laurentiu Trica");
$pdf->SetAuthor('Laurentiu Trica');
$pdf->SetTitle('Etichete Proiect 21.000');
$pdf->SetSubject('Etichete Proiect 21.000');

//set margins
$pdf->SetMargins(8, 2, 3, true);
$pdf->SetHeaderMargin(false);
$pdf->SetFooterMargin(false);
$pdf->setPrintHeader(false);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

$result = getBiblioteciFinal();
$text = "";
$i = 0;
while ($row = mysql_fetch_assoc($result)) {
    $i++;

	$spaces1 = 200;
	$spaces = 175;
	$nume_spaces = ($spaces1 - strlen($row["nume"])) * 6;
	$nume_spaces_2 = ($nume_spaces - strlen($row["nume"])) % 6;
	$nume_spaces = $nume_spaces - $nume_spaces_2;
	$nume = str_pad($row["nume"], $nume_spaces, "&#160;");

	$adresa_spaces = ($spaces - strlen($row["adresa"])) * 6;
	$adresa_spaces_2 = ($adresa_spaces - strlen($row["adresa"])) % 6;
	$adresa_spaces = $adresa_spaces - $adresa_spaces_2;
	$adresa = str_pad($row["adresa"], $adresa_spaces, "&#160;");

	$text = $text . "<div align=\"center\"><strong>= COLET CADOU, GRATUIT =</strong></div><br /><strong><u><i>Destinatar:</i></u></strong> "
            . $nume ."<br />".$adresa."<br /><table><tr><td align=\"right\"><img src=\"imprimate.png\" width=\"40\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>";

    if ($i % 4 == 0 || $i % 8 == 0) {
    
    } else {
    }
	//$text .= "<br />";
    if ($i % 8 == 1 || $i % 8 == 5) {
        //$text .= "<br />";
    }

    if ($i % 8 == 0) {
        $pdf->PrintChapter($text, true);
        $text = "";
    }
}

if ($i % 8 != 0) {
    $pdf->PrintChapter($text, true);
}

//Close and output PDF document
$pdf->Output('etichete.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

