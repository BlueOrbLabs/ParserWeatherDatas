<?php
/*
 * BDD : Table a 66 colonnes
 */


// Récupération des métas
$metas = fopen("raw/meta.txt", "r");
if ($metas) {
    while (($meta = fgets($metas, 4096)) !== false) {
        $arrayMetas[] =  $meta;
    }
    if (!feof($metas)) {
        echo "Erreur: fgets() a échoué\n";
    }
    fclose($metas);
}

// Récupération des données
$raw = fopen("raw/clientraw.txt", "r");
while (!feof($raw)) {
    $tampon = fgets($raw, 4096);
    $donnee = explode(" ", $tampon);

    $combien = count($donnee) - 1;
    echo "<b>Ce fichier contient ", $combien, " données : </b><br><br>";

    for ($i = 0; $i < $combien; $i++) {
        echo $arrayMetas[$i], " => ", $donnee[$i], "<br>";
    }
}
fclose($raw);

/* Heure et date
 * @Day[35 => day]
 * @Month[36 => month]
 * @Year[141 => year]
 * 
 * @Seconds[31 => second]
 * @Minute[30 => minute]
 * @Hour[29 => hour]
 */
$day = $donnee[35];
$month = $donnee[36];
$year = $donnee[141];

$second = $donnee[31];
$minute = $donnee[30];
$hour = $donnee[29];

echo "<hr />";

$recordset = $db->query("SHOW COLUMNS FROM wd_data");
	$fields = $recordset->fetchAll(PDO::FETCH_ASSOC);
	foreach ($fields as $field) {
		echo $field['Field']."<br/>";
	}



