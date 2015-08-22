# ParserWeatherDatas
Analyseur de données météo et enregistrement dans BDD.


## Utilisation
Respecter la structure des dossiers:

    /root-  
        |_/raw  
        |   |_clientraw.txt  
        |_Parser.php  
        |_index.php  

1. **Inclure le fichier Parser.php dans votre index.php (ou autre)**

        nclude('Parser.php');

Pour exécuter la Classe et lancer le traitement du fichier

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