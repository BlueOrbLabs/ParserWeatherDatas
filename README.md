# ParserWeatherDatas
Analyseur de données météo et enregistrement dans BDD.

## Releases
    Version 1.0  

## Connexion BDD

1. **Inclure le fichier de connexion**

        require 'app/config.php';

2. **Configurer le base**

    Mettre vos informations de connexion dans le fichier dev.php pour le localhost, et prod.php pour la BD distante.
    Dans le fichier config.php configurer la variable $env : Mettre 'local' ou 'distant'

## Les dossiers et fichiers
Il est préférable de ne pas modifier la structure des dossiers, ni changer les noms des fichiers.

    /root-  
        |_/ meteohub  
            |_clientraw.txt  
        |  
        |_/ script_recorder  
            |_/ Doc  
            |_/ app  
        |  
        |_index.php  
        |_weather_datas.json  
        |_script_generate_json.php  
        |_script_record_datas.php  

## Installation
Placer le dossier "script_recorder" à la racine de votre site ou dans le dossier racine contenant "meteohub" comme l'exmple précédent.
Il est possible de modifier le nom des fichiers et dossiers en modifiants les arguments passés aux différentes classes, dans les deux fichiers script_[..].php.

Il faudra aussi configurer le fichier app/prod.php et mettre vos identifiants de connexion à la BDD de votre serveur.

        app/prod.php = connexion au serveur distant
        app/dev.php = connexion au serveur localhost

Dans le fichier app/config.php à la varaible $env il faudra soit mettre 'prod' ou 'dev' suivant l'environement (prod = distant, dev = local).

        $env = 'prod'; // en mode prod(production) le site est sur l'hébergeur et utilise les informations de connexion de prod.php

## Utilisation
Programméer une tâche CRON, la faire poiter sur la page **[root]/script_recorder/index.php?send_data=true**


## Choisir les données utiles
Pour enlever ou rajouter des données, il faut éditer les ficheir du dossier "fields" ( fields.txt, index.txt, label.txt)
Et supprimer ou rajouter  les données que vous souhaitez avoir.