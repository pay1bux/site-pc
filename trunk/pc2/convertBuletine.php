<?php
require_once 'functii.php';

connect();
select_db($link);

resolveBuletine();

define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
define("FOLDER_BULETINE", "uploads/buletine/");
define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine/");

function resolveBuletine(){
    define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
    define("FOLDER_BULETINE", "uploads/buletine/");
    define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine/");

    echo "\Buletine\n";

    if ($handle = opendir(FOLDER_BULETINE_VECHI)) {
        $i = 0;
        $dirFiles = array();
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $dirFiles[] = $file;
            }
        }
        sort($dirFiles);
        foreach($dirFiles as $file) {
            echo "$file\n";
            $buletinNumar = substr($file, -7, -4);
            $fileSize = filesize(FOLDER_BULETINE_VECHI . $file) / 1024 / 1024;
            $fileDate = date ("Y-m-d", filemtime(FOLDER_BULETINE_VECHI . $file));
            $idRes = insertResursa("Buletin " . $buletinNumar, 0, 0, null, 6, "", $fileDate, "CURRENT_TIMESTAMP()", 0);

            $caleThumbPdf = salveazaImaginePdf($file);
            insertAttachment(FOLDER_BULETINE . $file, "", 'pdf', $idRes, $caleThumbPdf, null, $fileSize);

            copy(FOLDER_BULETINE_VECHI . $file, FOLDER_BULETINE . $file);
            $i++;
//            if ($i == 10)
//                break;
        }
        closedir($handle);
    }
}

function salveazaImaginePdf($numeFisier) {
    define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
    define("FOLDER_BULETINE", "uploads/buletine/");
    define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine/");

    // Fa thumbnail
    $im = new Imagick();
    $im->setResolution(43, 43);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $d = $im->getImageGeometry();
    $w = $d['width'];
    $h = $d['height'];
    $im->cropImage($w / 2, $h, $w / 2, 0);
    $caleImaginePdf = FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-thumb.png";
    $im->writeImage($caleImaginePdf);

    // Pagina 1
    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $d = $im->getImageGeometry();
    $w = $d['width'];
    $h = $d['height'];
    $im->cropImage($w / 2, $h, $w / 2, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag1.png");
    $im->destroy();

    // Pagina 4
    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, 0, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag4.png");
    $im->destroy();

    // Pagina 3
    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[1]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, $w / 2, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag3.png");
    $im->destroy();

    // Pagina 2
    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[1]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, 0, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag2.png");
    $im->destroy();

    return $caleImaginePdf;
}