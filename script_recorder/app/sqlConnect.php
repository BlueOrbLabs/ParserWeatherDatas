<?php
// Connexion à la base de donnée
try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pwd, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}