<?php
require_once 'functii.php';

connect();
select_db($link);

resolveArhiva();

function resolveArhiva(){
    echo "\nArhiva\n";

    $q = "SELECT * FROM pec_videos_list WHERE category_id = 7";
    $r = mysql_query($q);

    while ($row = mysql_fetch_assoc($r)) {
        $raw_title = $row['title'];
        $title_parts = explode("-", $raw_title);

        $titlu = trim($title_parts[0]);

        $data_eveniment = trim($title_parts[1]);
        var_dump($data_eveniment);
        $data_zi = substr($data_eveniment, 0, 2);
        $data_luna = substr($data_eveniment, 3, 2);
        $data_an = substr($data_eveniment, 5, 2);
        $data = "20" . $data_an . "-" . $data_luna . "-" . $data_zi;

        $data_adaugare = $row['datainsert'];

        $autor = $title_parts[2];
        $autor = trim(str_replace("Predica ", "", $autor));
        var_dump($autor);

        $autor_poarta_cerului = "Poarta Cerului";
        $autor_id = checkExistingAuthor($autor_poarta_cerului);
        if ($autor_id == -1) {
            $autor_id = insertAutor($autor_poarta_cerului);
        }

        $resurse_id = insertResursa($titlu, 1, null, 1, null, $data, $data_adaugare);

        // evenimente: Binecuvantare copii Sarbatoarea Multumirii Botez Nou Testamental Ordinare diaconi Cantata
        // unknown ***** Partea 2
        // despartitori: si / & / &amp;

        if ($autor == '' || strpos($autor, "****") != -1)
            continue;
        $tag_id = insertTag(1, $resurse_id, $autor);
    }
}

?>