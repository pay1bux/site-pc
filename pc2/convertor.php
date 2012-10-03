<?php
require_once 'functii.php';

connect();
select_db($link);

//resolvePrograme();
//resolveTineret();
//resolveStudii();
//resolveEvenimente();
resolvePrograme();

function resolvePrograme(){
    echo "\nArhiva\n";

    // Select programe
    $q = "SELECT * FROM pec_videos_list WHERE category_id = 7 order by id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $raw_title = $row['title'];
        $title_parts = explode("-", $raw_title);

        $titlu = trim($title_parts[0]);
//        TODO: Insert text date in title

        $data_eveniment = trim($title_parts[1]);
        $data_zi = substr($data_eveniment, 0, 2);
        $data_luna = substr($data_eveniment, 3, 2);
        $data_an = substr($data_eveniment, 6, 2);
        $data = "20" . $data_an . "-" . $data_luna . "-" . $data_zi;
        $data_adaugare = $row['datainsert'];

        if (sizeof($title_parts) > 2) {
            $autor = $title_parts[2];
            $autor = trim(str_replace("Predica ", "", $autor));
            $autor = trim(str_replace("predica ", "", $autor));
        }
        else {
            $autor = null;
        }
        var_dump($autor);

        //$autor_poarta_cerului = "Poarta Cerului";
        $autor_id = checkExistingAuthor($autor);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor);
        }

        $resurse_id = insertResursa($titlu, $autor_id, null, null, 1, null, $data, $data_adaugare, $row['views']);

        // evenimente: Binecuvantare copii Sarbatoarea Multumirii Sarbatoarea Roadelor Botez Nou Testamental Ordinare diaconi Cantata Nunta
        // unknown ***** Partea 2
        // despartitori: si / & / &amp;

        if ($autor != null && $autor != '' && strpos($autor, "****") === false && strpos($autor, "Partea 2") === false) {
            if ($autor == 'Binecuvantare copii') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Sarbatoarea Roadelor') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Sarbatoarea Multumirii') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Botez Nou Testamental') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Ordinare diaconi') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Cantata') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif (strpos($autor, "Nunta") !== false) {
                insertTag(7, $resurse_id, $autor);
            }
            else {
                $multipli = false;
                if (strpos($autor, " si ") !== false) {
                    $autori = explode(" si ", $autor);
                    $multipli = true;
                }
                if (strpos($autor, " &amp; ") !== false) {
                    $autori = explode(" &amp; ", $autor);
                    $multipli = true;
                }
                if (strpos($autor, " & ") !== false) {
                    $autori = explode(" & ", $autor);
                    $multipli = true;
                }
                if ($multipli) {
                    foreach ($autori as $aut) {
                      insertTag(1, $resurse_id, $aut);
                    }
                } else {
                    insertTag(1, $resurse_id, $autor);
                }
            }
        }

        $src = $row['source'];
        if ($row['description'] != '' && strpos($row['embed_code'], "href") === false) {
            $src = str_replace('Pentru a descarca programul <a href="', '', $row['description']);
            $src = str_replace('Pentru a descarca programul <a href=', '', $src);
            $pos = strpos($src, '"');
            $src = substr($src, 0, $pos);
        }
        insertAttachment($src, $row['embed_code'], 'flv', $resurse_id, $row['source_thumb']);
    }
}

function resolveTineret(){
    echo "\nTineret\n";

    // Select tineret
    $q = "SELECT * FROM pec_videos_list WHERE category_id = 4 order by id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $raw_title = $row['title'];
        $raw_title = str_replace('Sambata 2', 'Sambata - 2', $raw_title);
        $title_parts = explode("-", $raw_title);

        $titlu = trim($title_parts[0]);
        var_dump($titlu);

        $data_eveniment = trim($title_parts[1]);
        $data_zi = substr($data_eveniment, 0, 2);
        $data_luna = substr($data_eveniment, 3, 2);
        $data_an = substr($data_eveniment, 6, 2);
        $data = "20" . $data_an . "-" . $data_luna . "-" . $data_zi;
        $data_adaugare = $row['datainsert'];

        if (sizeof($title_parts) > 2) {
            $autor = $title_parts[2];
            $autor = trim(str_replace("Predica ", "", $autor));
            $autor = trim(str_replace("predica ", "", $autor));
            $autor = trim(str_replace("Marturie ", "", $autor));
        }
        else {
            $autor = null;
        }
        var_dump($autor);

        $autor_poarta_cerului = "Poarta Cerului";
        $autor_id = checkExistingAuthor($autor_poarta_cerului);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor_poarta_cerului);
        }

        $resurse_id = insertResursa($titlu . " " . $data_eveniment, $autor_id, null, null, 10, null, $data, $data_adaugare, $row['views']);

        // evenimente: Masa Rotunda Marturii Echipa Teen Challange Conferinta Concert
        // unknown ***** Partea 2
        // despartitori: si / & / &amp;

        if ($autor != null && $autor != '' && strpos($autor, "****") === false && strpos($autor, "Tineret") === false) {
            if ($autor == 'Masa Rotunda') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif ($autor == 'Marturii Echipa Teen Challange') {
                insertTag(7, $resurse_id, $autor);
            }
            elseif (strpos($autor, 'Conferinta') !== false) {
                insertTag(7, $resurse_id, $autor);
            }
            elseif (strpos($autor, 'Concert') !== false) {
                insertTag(7, $resurse_id, $autor);
            }
            else {
                $multipli = false;
                if (strpos($autor, " si ") !== false) {
                    $autori = explode(" si ", $autor);
                    $multipli = true;
                }
                if (strpos($autor, " &amp; ") !== false) {
                    $autori = explode(" &amp; ", $autor);
                    $multipli = true;
                }
                if (strpos($autor, " & ") !== false) {
                    $autori = explode(" & ", $autor);
                    $multipli = true;
                }
                if ($multipli) {
                    foreach ($autori as $aut) {
                      insertTag(1, $resurse_id, $aut);
                    }
                } else {
                    insertTag(1, $resurse_id, $autor);
                }
            }
        }

        $src = $row['source'];
        if ($row['description'] != '' && strpos($row['embed_code'], "href") === false) {
            $src = str_replace('Pentru a descarca programul <a href="', '', $row['description']);
            $src = str_replace('Pentru a descarca programul <a href=', '', $src);
            $pos = strpos($src, '"');
            $src = substr($src, 0, $pos);
        }
        insertAttachment($src, $row['embed_code'], 'flv', $resurse_id, $row['source_thumb']);
    }
}

function resolveStudii(){
    echo "\nStudii\n";

    // Select studii cu categorie
    $q = "SELECT l.*, cat.title as categorie, autor.title as autor
            FROM pec_videos_list l, pec_videos_nodes cat, pec_videos_categories2 autor
            WHERE l.id_cat2 = autor.id AND l.id_node = cat.id AND l.category_id = 5 order by l.id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $data = null;
        $data_adaugare = $row['datainsert'];

        $titlu = trim($row['title']);
        var_dump($titlu);

        $autor = $row['autor'];
        $autor_id = checkExistingAuthor($autor);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor);
        }

        $categorie = $row['categorie'];
        $categorie = str_replace('Titlu Studiu: ', '', $categorie);
        $categorie_id = checkExistingCategorie($categorie);
        if ($categorie_id == -1) {
            $categorie_id = insertCategorie($categorie);
        }

//        TODO: Insert meniu from nodes

        $resurse_id = insertResursa($titlu, $autor_id, $categorie_id, null, 2, null, $data, $data_adaugare, $row['views']);

        $src = $row['source'];
        if ($row['description'] != '' && strpos($row['embed_code'], "href") === false) {
            $src = str_replace('Pentru a descarca programul <a href="', '', $row['description']);
            $src = str_replace('Pentru a descarca programul <a href=', '', $src);
            $pos = strpos($src, '"');
            $src = substr($src, 0, $pos);
        }
        insertAttachment($src, $row['embed_code'], 'flv', $resurse_id, $row['source_thumb']);
    }

    // Select studii fara categorie
    $q = "SELECT l.*
            FROM pec_videos_list l
            WHERE l.category_id = 5 AND l.title like '%Sambata%' order by l.id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $data = null;
        $data_adaugare = $row['datainsert'];

        $titlu = trim($row['title']);
        var_dump($titlu);

        $autor = '';
        if (strpos($titlu, "Nelu Filip") !== false) {
            $autor = "Nelu Filip";
        }
        if (strpos($titlu, "Doru Hriscu") !== false) {
            $autor = "Doru Hriscu";
        }
        $autor_id = checkExistingAuthor($autor);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor);
        }

        $categorie = "Diverse";
        $categorie_id = checkExistingCategorie($categorie);
        if ($categorie_id == -1) {
            $categorie_id = insertCategorie($categorie);
        }

//        TODO: Insert meniu from nodes

        $resurse_id = insertResursa($titlu, $autor_id, $categorie_id, null, 2, null, $data, $data_adaugare, $row['views']);

        $src = $row['source'];
        if ($row['description'] != '' && strpos($row['embed_code'], "href") === false) {
            $src = str_replace('Pentru a descarca programul <a href="', '', $row['description']);
            $src = str_replace('Pentru a descarca programul <a href=', '', $src);
            $pos = strpos($src, '"');
            $src = substr($src, 0, $pos);
        }
        insertAttachment($src, $row['embed_code'], 'flv', $resurse_id, $row['source_thumb']);
    }
}

function resolveEvenimente(){
    echo "\nEvenimente\n";

    // Select evenimente
    $q = "SELECT * FROM pec_videos_list WHERE category_id = 3 order by id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $data = null;
        $data_adaugare = $row['datainsert'];

        $titlu = trim($row['title']);
        var_dump($titlu);

        $autor_poarta_cerului = "Poarta Cerului";
        $autor_id = checkExistingAuthor($autor_poarta_cerului);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor_poarta_cerului);
        }

        $resurse_id = insertResursa($titlu, $autor_id, null, null, 1, null, $data, $data_adaugare, $row['views']);

        insertTag(7, $resurse_id, $titlu);

        $src = $row['source'];
        if ($row['description'] != '' && strpos($row['embed_code'], "href") === false) {
            $src = str_replace('Pentru a descarca programul <a href="', '', $row['description']);
            $src = str_replace('Pentru a descarca programul <a href=', '', $src);
            $pos = strpos($src, '"');
            $src = substr($src, 0, $pos);
        }
        insertAttachment($src, $row['embed_code'], 'flv', $resurse_id, $row['source_thumb']);
    }
}

function resolveAudio(){
    echo "\nAudio\n";

    // Select evenimente
    $q = "SELECT l.*, c.title as cat2_titlu FROM pec_audio_list l left join pec_audio_categories2 c on l.id_cat2 = c.id order by id";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $tipuri_resurse = array("3" => "5", "4" => "3", "5" => "4", "6" => "9", "7" => "11", );
        $data = null;
        $data_adaugare = $row['datainsert'];
        $rawTitle = str_replace("&amp;", "si", $row['title']);
        $title_parts = explode("-", $rawTitle);

        $autor = trim($title_parts[0]);
        var_dump($autor);

        // TODO: nu insereaza caracterul '
        $pos = strpos($rawTitle, "-");
        $titlu = trim(substr($rawTitle, $pos + 1, strlen($rawTitle) - $pos));
        var_dump($titlu);

        $tip_id = $tipuri_resurse[$row["id_cat1"]];

        $autor_id = checkExistingAuthor($autor);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor);
        }
        $id_meniu = 0;
        if ($row['cat2_titlu']) {
            $id_meniu = checkExistingMeniu($tip_id, $row['cat2_titlu']);
            if ($id_meniu == -1) {
                $id_meniu = insertMeniu($tip_id, $row['cat2_titlu']);
            }
        }

        $resurse_id = insertResursa($titlu, $autor_id, null, $id_meniu, $tip_id, null, $data, $data_adaugare, $row['views']);

        insertAttachment($row['source'], null, 'mp3', $resurse_id, null, transformInSeconds($row['durata']), $row['marimea']);
    }
}

?>