<?php

// Connexion à la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=meteogerzat63;charset=utf8', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}