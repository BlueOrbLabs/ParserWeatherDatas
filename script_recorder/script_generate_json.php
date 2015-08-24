<?php
/*
 * SCRIPT - GENERATE .JSON
 * Enregistrement des données météo dans la BDD
 * Se référer à la documentation pour plus d'informations sur les Parsers et le JsonGenerator
 */

// Initialisation des Parsers pour extraire les données de chaque fichiers
$label = new Parser(2, 'fields', 'label');
$index = new Parser(2, 'fields', 'index');
$field = new Parser(2, 'fields', 'fields');
$value = new Parser(1, '../meteohub', 'clientraw'); // Modifier si besoin le chemin vers le répoirtoire qui coontient votre clienraw.txt

// Récupération des données dans des tableaux
$ArrayLabel = $label->getContent();
$ArrayIndex = $index->getContent();
$ArrayField = $field->getContent();
$ArrayValue = $value->getContent();

// Génération du fichier JSON
$json = new JsonGenerator($ArrayLabel, $ArrayIndex, $ArrayField, $ArrayValue);
$json->generate();
