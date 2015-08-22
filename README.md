# ParserWeatherDatas
Analyseur de données météo et enregistrement dans BDD.

## Connexion BDD

1. **Inclure le fichier de connexion**

        include('sqlConnect.php');

2. **Configurer le base**

    Mettre vos informations de connexion dans le fichier config.php

## Utilisation
Respecter la structure des dossiers:

    /root-  
        |_/raw  
        |   |_clientraw.txt  
        |_Parser.php  
        |_index.php  

1. **Inclure le fichier Parser.php dans votre index.php (ou autre)**

        include('Parser.php');

2. **Exécuter la Classe et lancer le traitement du fichier**

         $parser = new Parser();
         $datas = $parser->getContent();

    La Classe Parser() accepte deux arguments(falcultatif) pour modifier le nom du répertoire et/ou fichier :

        new Parser('dirname', 'filename');

    Configuration par défaut :

        new Parser('raw', 'clientraw');

3. **Afficher le résultats, une simple boucle foreach() car la Classe retourne un Array()**

    *Exemple :*

        foreach ($datas as $data) {
             echo $data."<br />";
        }