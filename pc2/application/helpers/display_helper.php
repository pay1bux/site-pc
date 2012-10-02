<?php

function display_text($text) {
    return nl2br($text);
}

function  myTruncate($string, $limit, $break = ".", $pad = "...") {
    // return with no change if string is shorter than $limit
    if (strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if (false !== ($breakpoint = strpos($string, $break, $limit))) {
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}

function prepareDate($data) {
    $luniScurt = array(1 => "IAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAI", 6 => "IUN", 7 => "IUL", 8 => "AUG", 9 => "SEP"
    , 10 => "OCT", 11 => "NOI", 12 => "DEC",);

    $time = strtotime($data);
    $luna = $luniScurt[date('n', $time)];

    return date('d', $time) . " " . $luna;
}

function prepareLunaName($m){
    $luniScurt = array(1 => "IAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAI", 6 => "IUN", 7 => "IUL", 8 => "AUG", 9 => "SEP"
    , 10 => "OCT", 11 => "NOI", 12 => "DEC",);
    $luna = $luniScurt[$m];
    return $luna;
}


function prepareDateWithYear($data) {
    $luni = array(1 => "Ianuarie", 2 => "Februarie", 3 => "Martie", 4 => "Aprilie", 5 => "Mai", 6 => "Iunie", 7 => "Iulie", 8 => "August", 9 => "Septembrie"
    , 10 => "Octombrie", 11 => "Noiembrie", 12 => "Decembrie",);

    $time = strtotime($data);
    $luna = $luni[date('n', $time)];
    $an = date('Y', $time);

    return date('d', $time) . " " . $luna . " " . $an;
}

function getDayName($ziuaSaptamanii) {
    $zile = array("0" => "Duminica", "1" => "Luni", "2" => "Marti", "3" => "Miercuri", "4" => "Joi", "5" => "Vineri", "6" => "Sambata" );
    return $zile[$ziuaSaptamanii];
}

function sec2hms($sec, $padHours = false) {

    // holds formatted string
    $hms = "";

// there are 3600 seconds in an hour, so if we
// divide total seconds by 3600 and throw away
// the remainder, we've got the number of hours
    $hours = intval(intval($sec) / 3600);

// add to $hms, with a leading 0 if asked for
    if ($hours)
        $hms .= ($padHours) ? str_pad($hours, 2, "0", STR_PAD_LEFT) . ':' : $hours . ':';

// dividing the total seconds by 60 will give us
// the number of minutes, but we're interested in
// minutes past the hour: to get that, we need to
// divide by 60 again and keep the remainder
    $minutes = intval(($sec / 60) % 60);

// then add to $hms (with a leading 0 if needed)
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT) . ':';

// seconds are simple - just divide the total
// seconds by 60 and keep the remainder
    $seconds = intval($sec % 60);

// add to $hms, again with a leading 0 if needed
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

// done!
    return $hms;
}

function cropText($text, $charsNr){
    $text = strip_tags($text);
    if (strlen($text) > $charsNr) {
        $text = substr($text, 0, $charsNr);

        if (false !== ($last_space_pos = strrpos($text, " ")))
            $text = substr($text, 0, $last_space_pos) . '...';
    }

    return $text;
}

function utf8_accents_to_ascii_1( $str, $case=0 ){

    $UTF8_LOWER_ACCENTS = array(
        'à' => 'a', 'ô' => 'o', 'ď' => 'd', 'ḟ' => 'f', 'ë' => 'e', 'š' => 's', 'ơ' => 'o',
        'ß' => 'ss', 'ă' => 'a', 'ř' => 'r', 'ț' => 't', 'ň' => 'n', 'ā' => 'a', 'ķ' => 'k',
        'ŝ' => 's', 'ỳ' => 'y', 'ņ' => 'n', 'ĺ' => 'l', 'ħ' => 'h', 'ṗ' => 'p', 'ó' => 'o',
        'ú' => 'u', 'ě' => 'e', 'é' => 'e', 'ç' => 'c', 'ẁ' => 'w', 'ċ' => 'c', 'õ' => 'o',
        'ṡ' => 's', 'ø' => 'o', 'ģ' => 'g', 'ŧ' => 't', 'ș' => 's', 'ė' => 'e', 'ĉ' => 'c',
        'ś' => 's', 'î' => 'i', 'ű' => 'u', 'ć' => 'c', 'ę' => 'e', 'ŵ' => 'w', 'ṫ' => 't',
        'ū' => 'u', 'č' => 'c', 'ö' => 'oe', 'è' => 'e', 'ŷ' => 'y', 'ą' => 'a', 'ł' => 'l',
        'ų' => 'u', 'ů' => 'u', 'ş' => 's', 'ğ' => 'g', 'ļ' => 'l', 'ƒ' => 'f', 'ž' => 'z',
        'ẃ' => 'w', 'ḃ' => 'b', 'å' => 'a', 'ì' => 'i', 'ï' => 'i', 'ḋ' => 'd', 'ť' => 't',
        'ŗ' => 'r', 'ä' => 'ae', 'í' => 'i', 'ŕ' => 'r', 'ê' => 'e', 'ü' => 'ue', 'ò' => 'o',
        'ē' => 'e', 'ñ' => 'n', 'ń' => 'n', 'ĥ' => 'h', 'ĝ' => 'g', 'đ' => 'd', 'ĵ' => 'j',
        'ÿ' => 'y', 'ũ' => 'u', 'ŭ' => 'u', 'ư' => 'u', 'ţ' => 't', 'ý' => 'y', 'ő' => 'o',
        'â' => 'a', 'ľ' => 'l', 'ẅ' => 'w', 'ż' => 'z', 'ī' => 'i', 'ã' => 'a', 'ġ' => 'g',
        'ṁ' => 'm', 'ō' => 'o', 'ĩ' => 'i', 'ù' => 'u', 'į' => 'i', 'ź' => 'z', 'á' => 'a',
        'û' => 'u', 'þ' => 'th', 'ð' => 'dh', 'æ' => 'ae', 'µ' => 'u', 'ĕ' => 'e',
        '.' => '-', '?' => '', ',' => '', '&' => '-', ' ' => '-', ':' => '', '/' => '-'
    );

    $str = str_replace(
        array_keys($UTF8_LOWER_ACCENTS),
        array_values($UTF8_LOWER_ACCENTS),
        $str
    );

    $UTF8_UPPER_ACCENTS = array(
        'À' => 'A', 'Ô' => 'O', 'Ď' => 'D', 'Ḟ' => 'F', 'Ë' => 'E', 'Š' => 'S', 'Ơ' => 'O',
        'Ă' => 'A', 'Ř' => 'R', 'Ț' => 'T', 'Ň' => 'N', 'Ā' => 'A', 'Ķ' => 'K',
        'Ŝ' => 'S', 'Ỳ' => 'Y', 'Ņ' => 'N', 'Ĺ' => 'L', 'Ħ' => 'H', 'Ṗ' => 'P', 'Ó' => 'O',
        'Ú' => 'U', 'Ě' => 'E', 'É' => 'E', 'Ç' => 'C', 'Ẁ' => 'W', 'Ċ' => 'C', 'Õ' => 'O',
        'Ṡ' => 'S', 'Ø' => 'O', 'Ģ' => 'G', 'Ŧ' => 'T', 'Ș' => 'S', 'Ė' => 'E', 'Ĉ' => 'C',
        'Ś' => 'S', 'Î' => 'I', 'Ű' => 'U', 'Ć' => 'C', 'Ę' => 'E', 'Ŵ' => 'W', 'Ṫ' => 'T',
        'Ū' => 'U', 'Č' => 'C', 'Ö' => 'Oe', 'È' => 'E', 'Ŷ' => 'Y', 'Ą' => 'A', 'Ł' => 'L',
        'Ų' => 'U', 'Ů' => 'U', 'Ş' => 'S', 'Ğ' => 'G', 'Ļ' => 'L', 'Ƒ' => 'F', 'Ž' => 'Z',
        'Ẃ' => 'W', 'Ḃ' => 'B', 'Å' => 'A', 'Ì' => 'I', 'Ï' => 'I', 'Ḋ' => 'D', 'Ť' => 'T',
        'Ŗ' => 'R', 'Ä' => 'Ae', 'Í' => 'I', 'Ŕ' => 'R', 'Ê' => 'E', 'Ü' => 'Ue', 'Ò' => 'O',
        'Ē' => 'E', 'Ñ' => 'N', 'Ń' => 'N', 'Ĥ' => 'H', 'Ĝ' => 'G', 'Đ' => 'D', 'Ĵ' => 'J',
        'Ÿ' => 'Y', 'Ũ' => 'U', 'Ŭ' => 'U', 'Ư' => 'U', 'Ţ' => 'T', 'Ý' => 'Y', 'Ő' => 'O',
        'Â' => 'A', 'Ľ' => 'L', 'Ẅ' => 'W', 'Ż' => 'Z', 'Ī' => 'I', 'Ã' => 'A', 'Ġ' => 'G',
        'Ṁ' => 'M', 'Ō' => 'O', 'Ĩ' => 'I', 'Ù' => 'U', 'Į' => 'I', 'Ź' => 'Z', 'Á' => 'A',
        'Û' => 'U', 'Þ' => 'Th', 'Ð' => 'Dh', 'Æ' => 'Ae', 'Ĕ' => 'E',
    );

    $str = str_replace(
        array_keys($UTF8_UPPER_ACCENTS),
        array_values($UTF8_UPPER_ACCENTS),
        $str
    );

    return $str;
}

function slugify($text) {
    $charsNr = 100;
    if (strlen($text) > $charsNr) {
        $text = substr($text, 0, $charsNr);
        if (false !== ($last_space_pos = strrpos($text, " ")))
            $text = substr($text, 0, $last_space_pos);
    }
    $string = utf8_accents_to_ascii_1($text);
    $string = preg_replace("/\W+/","-", strtolower($string));
    $string = preg_replace("/\[-]+/","-", $string);
    $string = preg_replace("/^-(.+)$/","$1", $string);
    $string = preg_replace("/^(.+)-$/","$1", $string);
    return $string;
}

function linkDevotional($titlu, $id) {
    return site_url("devotional/" . slugify($titlu) . "/" . $id);
}