<?php

/*
 * Ouvrir et traiter les fichiers .txt
 */
class Parser {

    /*
     * Type string
     * Default value 'clientraw'
     */
    private $filename;
    
    private $dirname;

    public function __construct($dirname = 'raw', $filename = 'clientraw') {
        $this->filename = $filename;
        $this->dirname = $dirname;
    }

    /*
     * Traitement des données
     * Return array()
     */
    public function getContent() {
        // Ouverture du fichier .txt
        $raw = $this->open();
        
        // Lecture du fichier
        while (!feof($raw)) {
            $buffer = fgets($raw, 4096);
            // Récupération des données à chaque séparateur = "espace"
            $datas = explode(" ", $buffer);
        }
        // Fermeture du fichier
        fclose($raw);
        return $datas;
    }

    /*
     * Ouverture du fichier
     */
    public function open() {
        return fopen($this->dirname.'/'.$this->filename.'.txt', "r");
    }

}
