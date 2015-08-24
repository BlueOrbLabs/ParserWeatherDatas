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

    /*
     * @methode 1 : Récupérer les données délimitées par un séparateur
     * @methode 2 : Récupérer les données ligne par ligne
     */
    private $methode;

    public function __construct($methode = 1, $dirname = '', $filename = '') {
        $this->filename = $filename;
        $this->dirname = $dirname;
        $this->methode = $methode;
    }

    /*
     * Traitement des données
     * Return array()
     */

    public function getContent() {
        // Ouverture du fichier .txt
        $raw = $this->open();

        if ($this->methode == 1) {
            while (!feof($raw)) {
                $buffer = fgets($raw, 4096);
                // Récupération des données à chaque séparateur = "espace"
                $datas = explode(" ", $buffer);
            }
        } elseif ($this->methode == 2) {
            while (($buffer = fgets($raw, 4096)) !== false) {
                $datas[] = preg_replace("/[\n|\r]/", '', $buffer);
            }
        }

        // Fermeture du fichier
        fclose($raw);
        return $datas;
    }

    /*
     * Ouverture du fichier
     */

    public function open() {
        return fopen($this->dirname . '/' . $this->filename . '.txt', "r");
    }

}
