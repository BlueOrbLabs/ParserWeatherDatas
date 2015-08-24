<?php

/*
 * Parser du fichier JSON
 */
class JsonParser {

    private $file_path;
    private $json_data;

    public function __construct($dirname = '.', $filename = 'weather_datas') {
        $this->file_path = $dirname . '/' . $filename . '.json';
    }

    /*
     * Décodage du fichier json
     * Return Object
     */
    public function decode() {
        $json_file = file_get_contents($this->file_path);
        $json_data = json_decode($json_file);
        $this->json_data = $json_data;
    }

    /*
     * Récupération des données suivant un type données
     * Types possibles : 'label', 'field', 'value', 'index'
     * Return Array
     */
    public function getValues($type) {
        foreach ($this->json_data->weather_data as $data) {
            $datas[] = $data->$type;
        }
        return $datas;
    }

}
