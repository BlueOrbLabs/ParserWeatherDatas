# ParserWeatherDatas
Analyseur de données météo et enregistrement dans BDD.


## Utilisation
Respecter la structure des dossiers:
/root-  
    |_/raw  
    |   |_clientraw.txt  
    |_Parser.php  
    |_index.php  

Inclure le fichier Parser.php dans votre index.php (ou autre)

    <?php include('Parser.php'); ?>

Pour exécuter la Classe et lancer le traitement du fichier :

    <?php
        $parser = new Parser();
        $datas = $parser->getContent();
    ?>

Par défaut le Classe est configurée avec un nom de fichier : 'raw/clientraw.txt'
Pour changer de nom de fichier, il faut passer un argument à la Classe de type string : 'dossier/fichier' (sans le .txt)

    <?php
        $parser = new Parser('raw/newname');
        ...
    ?>

Pour affichier le résultats, une simple boucle foreach() car la Classe retourne un Array().
Exemple :

    <?php
    foreach ($datas as $data) {
                echo $data."<br />";
            }
    ?>