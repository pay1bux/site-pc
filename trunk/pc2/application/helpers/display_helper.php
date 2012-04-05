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
    $luni = array(1 => "IAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAI", 6 => "IUN", 7 => "IUL", 8 => "AUG", 9 => "SEP"
    , 10 => "OCT", 11 => "NOI", 12 => "DEC",);

    $time = strtotime($data);
    $luna = $luni[date('n', $time)];

    return date('d', $time) . " " . $luna;
}

function prepareDateWithYear($data) {
    $luni = array(0 => "Ianuarie", 1 => "Februarie", 2 => "Martie", 3 => "Aprilie", 4 => "Mai", 5 => "Iunie", 6 => "Iulie", 7 => "August", 8 => "Septembrie"
    , 10 => "Octombrie", 11 => "Noiembrie", 12 => "Decembrie",);

    $time = strtotime($data);
    $luna = $luni[date('m', $time)];
    $an = date('Y', $time);

    return date('d', $time) . " " . $luna . " " . $an;
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