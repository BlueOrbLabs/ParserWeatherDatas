<?php
/*
 * Générateur du fichie rJSON
 */
class JsonGenerator {

    private $labels;
    private $indexes;
    private $fields;
    private $values;

    /*
     *  4 paramètres à mettre obligatoirement qui sont tous des Array
     */
    public function __construct(Array $labels, Array $indexes, Array $fields, Array $values) {
        $this->labels = $labels;
        $this->indexes = $indexes;
        $this->fields = $fields;
        $this->values = $values;
    }

    /*
     * Méthode hydrate pour constituer le tableau des différentes données
     * Return Array
     */
    public function hydrate() {

        $iteration = count($this->indexes);
        for ($i = 0; $i < $iteration; $i++) {
            $AllDatas[] = Array(
                'label' => $this->labels[$i],
                'index' => $this->indexes[$i],
                'field' => $this->fields[$i],
                'value' => $this->values[intval($this->indexes[$i])]
            );
        }
        return $AllDatas;
    }

    /*
     * Méthode pour générer le fichier en lui injectant les données
     */
    public function generate($dirname = '.', $filename = 'weather_datas') {
        // Création du chemin pointant sur le fichier json
        $file_path = $dirname . '/' . $filename . '.json';
        
        // si le fichier existe, on le supprime
        if (file_exists($file_path)) {
            @unlink($file_path);
        }
        // Création du fichier json
        $json_content['weather_data'] = $this->hydrate();
        $fp = fopen($file_path, "w+");
        fseek($fp, 0);
        fwrite($fp, json_encode($json_content, JSON_PRETTY_PRINT));
        fclose($fp);
    }

}
