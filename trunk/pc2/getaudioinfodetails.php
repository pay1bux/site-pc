<?php

    include("getid3/getid3.php");

	function directoryToArray($directory, $recursive, $inspector, $folder_nou) {
		$array_items = array();
		if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if (is_dir($directory. "/" . $file)) {
						if($recursive) {
							$array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive, $inspector, $folder_nou));
						}
					} else {
						$file = $directory . "/" . $file;
						$file = preg_replace("/\/\//si", "/", $file);
                        $size = filesize($file)  / 1024;
                        $play = getAudioFilePlayTime($inspector, $file);
                        rename($file, $folder_nou . basename($file));
                        $file = str_replace("/home1/tineretp/www", "http://tineretpc.net", $file);
                        $array_items[] = array("path" => $file, "size" => $size, "play_time" => $play);
					}
				}
			}
			closedir($handle);
		}
		return $array_items;
	}

    function getAudioFilePlayTime($mp3Getter, $file_path) {
        error_reporting(~E_STRICT);
        $file_info = $mp3Getter->analyze(trim($file_path));

        $mp3Getter->ChannelsBitratePlaytimeCalculations();
        $playTime = round($file_info['playtime_seconds']);

        return $playTime;
    }

    $luni = array('1' => 'Ianuarie', '2' => 'Februarie', '3' => 'Martie', '4' => 'Aprilie', '5' => 'Mai', '6' => 'Iunie'
                , '7' => 'Iulie', '8' => 'August', '9' => 'Septembrie', '10' => 'Octombrie', '11' => 'Noiembrie', '12' => 'Decembrie');

    if (isset($_GET['data'])) {
        $data = $_GET['data'];
    } else {
        $data = date("Y-m-d");
    }
    $expl = explode("-", $data);
    $zi = $expl[2];
    $luna = $expl[1];
    $an = $expl[0];

    $luna_text = $luni[intval($luna)];
    $data_text = $zi . "." . $luna . "." . $an;
    $url_nou = "http://tineretpc.net/audio/" . $luna_text . " " . $an . "/" . $data_text . "/";
    $folder_nou = "/home1/tineretp/www/audio/" . $luna_text . " " . $an . "/" . $data_text . "/";

    if(!file_exists("/home1/tineretp/www/audio/" . $luna_text . " " . $an)) {
        mkdir("/home1/tineretp/www/audio/" . $luna_text . " " . $an);
    }
    if(!file_exists("/home1/tineretp/www/audio/" . $luna_text . " " . $an. "/" . $data_text . "/")) {
        mkdir("/home1/tineretp/www/audio/" . $luna_text . " " . $an. "/" . $data_text . "/");
    }

    $inspector = new getID3();

	$baseDir = "/home1/tineretp/www/upload-arhiva-audio/";
	$files = directoryToArray($baseDir, true, $inspector, $folder_nou);

    $response = array("url_nou" => $url_nou, "files" => $files);
	echo json_encode($response);

?>