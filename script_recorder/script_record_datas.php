<?php
/*
 * SCRIPT - RECORD DATAS
 * Enregistrement des données météo dans la BDD
 * Se référer à la documentation pour plus d'informations sur le JsonParser
 */

// Initialisation du JsonParser et décodage du fichier
$jsonParser = new JsonParser();
$jsonParser->decode();

// Récupération des données dans des tableaux
// field = Nom des colonnes de la Table
// value = Données météo
$fields = $jsonParser->getValues('field');
$values = $jsonParser->getValues('value');

// Initialisation de l'enregistreur
$recorder = new PDOFactory($db);

// Insertion des données dans la BDD
$recorder->insert($fields, $values);
