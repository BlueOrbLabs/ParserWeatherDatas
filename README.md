# ParserWeatherDatas
Analyseur de données météo et enregistrement dans BDD.

## Connexion BDD

1. **Inclure le fichier de connexion**

        require 'app/config.php';

2. **Configurer le base**

    Mettre vos informations de connexion dans le fichier dev.php pour le localhost, et prod.php pour la BD distante.
    Dans le fichier config.php configurer la variable $env : Mettre 'local' ou 'distant'

## Utilisation
Respecter la structure des dossiers:

    /root-  
        |_/app  
            |_/class  
                |_Parser.php  
                |_Injector.php  
        |_/raw  
            |_clientraw.txt  

1. **Exécuter la Classe et lancer le traitement du fichier**

         $parser = new Parser();
         $datas = $parser->getContent();

    La Classe Parser() accepte deux arguments(falcultatif) pour modifier le nom du répertoire et/ou fichier :

        new Parser('dirname', 'filename');

    Configuration par défaut :

        new Parser('raw', 'clientraw');

2. **Afficher le résultats, une simple boucle foreach() car la Classe retourne un Array()**

    *Exemple :*

        foreach ($datas as $data) {
             echo $data."<br />";
        }