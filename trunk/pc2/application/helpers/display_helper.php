<?php

function display_text($text) {
	return nl2br($text);
}

function  myTruncate($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

function prepareDate($data) {
    $luni = array(0 => "IAN", 1 => "FEB", 2 => "MAR", 3 => "APR", 4 => "MAI", 5 => "IUN", 6 => "IUL", 7 => "AUG", 8 => "SEP"
                , 10 => "OCT", 11 => "NOI", 12 => "DEC", );

    $time = strtotime($data);
    $luna = $luni[date('m', $time)];

    return date('d', $time) . " " . $luna;
}

function prepareDateWithYear($data) {
    $luni = array(0 => "Ianuarie", 1 => "Februarie", 2 => "Martie", 3 => "Aprilie", 4 => "Mai", 5 => "Iunie", 6 => "Iulie", 7 => "August", 8 => "Septembrie"
                , 10 => "Octombrie", 11 => "Noiembrie", 12 => "Decembrie", );

    $time = strtotime($data);
    $luna = $luni[date('m', $time)];
    $an = date('Y', $time);

    return date('d', $time) . " " . $luna . " " . $an;
}