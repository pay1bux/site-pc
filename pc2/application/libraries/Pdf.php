<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {
    function __construct() {
        parent::__construct();
    }

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
        $this->SetFont('times', '', 12);
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

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', '', 12);
        // Page number
        $this->Cell(0, 10, '- '.$this->getAliasNumPage().' -', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    // end of extended class
}

?>