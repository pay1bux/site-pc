<?php

function connect() {
	global $link;
	//$link = mysql_connect('localhost', 'root', 'francisc');
	$link = mysql_connect('localhost', 'root', 'lalala');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$q = "SET NAMES 'utf8'";
	$r = mysql_query($q);
	return $link;
}

function select_db($link) {
	mysql_select_db('rve', $link) or die('Could not select database.');
}

function getLocalitati() {
	$q = "SELECT * FROM localitati limit 100";
	$r = mysql_query($q);

    return $r;
}

function getBiblioteci() {
	$q = "SELECT * FROM biblioteci";
	$r = mysql_query($q);

    return $r;
}

function getBiblioteciFinal() {
	$q = "SELECT * FROM biblioteci_final";
	$r = mysql_query($q);

    return $r;
}

function insertBiblioteciFinal($nume, $adresa) {
	$q = "INSERT into biblioteci_final (nume, adresa) VALUES ('$nume', '$adresa')";
	$r = mysql_query($q);

    return $r;
}
