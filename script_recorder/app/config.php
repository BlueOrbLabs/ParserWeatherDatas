<?php
// Configruer votre environement dev(local) ou prod(distant)
$env = 'dev';

// include fichier de configuration local(dev) ou distant(prod)
if($env == 'dev') {
    include('dev.php');
} elseif($env == 'prod') {
    include('prod.php');
} else {
    echo "Pas d'environement trouvé.";
}

// Include connexion à la DB
// Rien à modifier dans ce fichier sauf si vous avez besoin de modifier les options de PDO
include('sqlConnect.php');

// Auto-chargement des classes (tous les fichiers des classes vont se charger automatiquement)
require 'autoload.php';
