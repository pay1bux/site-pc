<?php

require_once 'functii-rve.php';

connect();
select_db($link);

$result = getBiblioteci();

while ($row = mysql_fetch_assoc($result)) {
	$nume = $row['nume'];
	$adresa = $row['adresa'];

	if (($pos = mb_strpos($nume, 'Biblioteca')) > 0) {
		$antet = '';
		if (mb_strlen($adresa) > 0)
			$antet = ", ";

		$adresa .= $antet . mb_substr($nume, 0, $pos);
		$nume = mb_substr($nume, $pos);
	}
	else if (($pos = mb_strpos($nume, 'Casa Corpului Didactic')) > 0) {
		$antet = '';
		if (mb_strlen($adresa) > 0)
			$antet = ", ";

		$adresa .= $antet . mb_substr($nume, 0, $pos);
		$nume = mb_substr($nume, $pos);
		
	}
	insertBiblioteciFinal($nume, $adresa);

}
