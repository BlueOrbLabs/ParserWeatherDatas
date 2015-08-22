<?php
// Configruer votre environement local ou distant
$env = 'local';

// include fichier de configuration local ou distant
if($env == 'local') {
    include('dev.php');
} elseif($env == 'distant') {
    include('prod.php');
} else {
    echo "Pas d'environement trouvé.";
}

// Include connexion à la DB
include('sqlConnect.php');

// Auto-chargement des classes
require 'autoload.php';
