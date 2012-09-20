<?php
require_once 'functii.php';

connect();
select_db($link);

resolveBuletine();

define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
define("FOLDER_BULETINE", "uploads/buletine/");
define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine-2/");

function resolveBuletine(){
    define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
    define("FOLDER_BULETINE", "uploads/buletine/");
    define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine-2/");

    echo "\Buletine\n";

    if ($handle = opendir(FOLDER_BULETINE_VECHI)) {
        $i = 0;
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo "$entry\n";
                $buletinNumar = substr($entry, -7, -4);
                $fileSize = filesize(FOLDER_BULETINE_VECHI . $entry) / 1024 / 1024;
                $fileDate = date ("Y-m-d", filemtime(FOLDER_BULETINE_VECHI . $entry));
//                $idRes = insertResursa("Buletin " . $buletinNumar, 1, 1, null, 6, "", $fileDate, "CURRENT_TIMESTAMP()", 0);

                $caleImaginePdf = salveazaImaginePdf($entry);
//                insertAttachment(FOLDER_BULETINE_VECHI . $entry, "", 'pdf', $idRes, $caleImaginePdf, null, $fileSize);

//                copy(FOLDER_BULETINE_VECHI . $entry, FOLDER_BULETINE . $entry);
            }
            $i++;
            if ($i == 1)
                break;
        }
        closedir($handle);
    }
}

function salveazaImaginePdf($numeFisier) {
    define("FOLDER_BULETINE_VECHI", "uploads/buletine-vechi/");
    define("FOLDER_BULETINE", "uploads/buletine/");
    define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine-2/");

    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $d = $im->getImageGeometry();
    $w = $d['width'];
    $h = $d['height'];
    $caleImaginePdf = FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . ".png";
    $im->writeImage($caleImaginePdf);


    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, $w / 2, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag1.png");
    $im->destroy();

    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[0]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, 0, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag4.png");
    $im->destroy();

    $im = new Imagick();
    $im->setResolution(300, 300);
    $im->readImage(FOLDER_BULETINE_VECHI . $numeFisier . "[1]");
    $im->setImageResolution(100,100);
    $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
    $im->setImageFormat("png");
    $im->cropImage($w / 2, $h, $w / 2, 0);
    $im->writeImage(FOLDER_IMAGINI_BULETINE . substr($numeFisier, 0, -4) . "-pag3.png");
    $im->destroy();

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