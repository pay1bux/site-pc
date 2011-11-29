<?php

function connect() {
	global $link;
	//$link = mysql_connect('localhost', 'root', 'francisc');
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$q = "SET NAMES 'utf8'";
	$r = mysql_query($q);
	return $link;
}

function select_db($link) {
	mysql_select_db('pc-nou', $link) or die('Could not select database.');
}

function insertResursa($titlu, $autor_id, $categorie_id, $tip_id, $continut, $data, $data_adaugare, $views) {

    $q2 = "INSERT INTO resurse(titlu, autor_id, categorie_id, tip_id, continut, data, data_adaugare, views)
	        VALUES('$titlu', '$autor_id', '$categorie_id',  '$tip_id', '$continut', '$data', '$data_adaugare', '$views');";
	$r2 = mysql_query($q2);

	if (!$r2)
	die("Error insertion album: " . $titlu);

	return mysql_insert_id();
}

function checkExistingAuthor($autor) {
	$q = "SELECT id FROM autor WHERE nume = '$autor'";
	$r = mysql_query($q);

	if (mysql_num_rows($r) == 0)
	    return -1;
	$row = mysql_fetch_assoc($r);
	    return $row['id'];
}

function insertAutor($nume) {

    $q2 = "INSERT INTO autor(nume) VALUES('$nume');";
	$r2 = mysql_query($q2);

	if (!$r2)
	die("Error insertion autor: " . $nume);

	return mysql_insert_id();
}

function insertTag($tip_tag_id, $resurse_id, $valoare) {
	$q2 = "INSERT INTO tag (tip_tag_id, resurse_id, valoare) VALUES('$tip_tag_id', '$resurse_id', '$valoare');";
	$r2 = mysql_query($q2);

	if (!$r2)
	die("Error insertion tag: " . $valoare);

	return mysql_insert_id();
}

function checkExistingCategorie($categorie) {
	$q = "SELECT id FROM categorie_resurse WHERE nume = '$categorie'";
	$r = mysql_query($q);

	if (mysql_num_rows($r) == 0)
	    return -1;
	$row = mysql_fetch_assoc($r);
	    return $row['id'];
}

function insertCategorie($categorie) {

    $q2 = "INSERT INTO categorie_resurse(nume) VALUES('$categorie');";
	$r2 = mysql_query($q2);

	if (!$r2)
	die("Error insertion categorie: " . $categorie);

	return mysql_insert_id();
}

function insertAttachment($url, $embed, $format, $resurse_id, $thumb, $durata = null) {
	$q2 = "INSERT INTO attachment (url, embed, format, resurse_id, thumb, durata) VALUES('$url', '$embed', '$format', '$resurse_id', '$thumb', '$durata');";
	$r2 = mysql_query($q2);

	if (!$r2)
	die("Error insertion attachment: " . $embed);

	return mysql_insert_id();
}

function transformInSeconds($durata) {
	$parts = explode(":", $durata);
    $seconds = $parts[2] + $parts[1] * 60 + $parts[0] * 3600;
    return $seconds;
}
