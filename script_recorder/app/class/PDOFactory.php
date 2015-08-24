<?php

/*
 * Regroupe uniquement les requêtes SQL
 */

class PDOFactory {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findLast() {
        $sql = 'SELECT * FROM wd_data ORDER BY date AND time DESC LIMIT 1';

        $q = $this->db->query($sql);
        $datas = $q->fetch();
        return $datas;
    }

    /*
     * requête d'insertion de données
     * 2 paramètres obligatoires sous forme de Array
     * 1 paramètre obligatoire avec une valeur par défaut 'wd_data' peut-être modifié suivant le nom de la table
     */

    public function insert(Array $data_field, Array $data_value, $table = 'wd_data') {
        // Création de la requête en plusieurs parties
        // Nom des champs
        // station_id, date, time ne sont pas dans le clientraw.txt, ou présente des difficultés de chargement ils sont rajoutés manuellement
        $sql = 'INSERT INTO ' . $table . '(station_id, date, time, ';
        foreach ($data_field as $field) {
            if ($field !== end($data_field)) {
                $sql .= $field . ', ';
            } elseif ($field === end($data_field)) {
                $sql .= $field;
            }
        }
        $sql .= ')';

        // Données associées aux champs
        // la valeur Gerzat,_St est à modifer si besoin
        $sql .= ' VALUES(\'Gerzat,_St\', DATE(NOW()), TIME(NOW()), ';
        foreach ($data_value as $value) {
            if ($value !== end($data_value)) {
                $sql .= $this->db->quote($value) . ', ';
            } elseif ($value === end($data_value)) {
                $sql .= $value;
            }
        }
        $sql .= ')';

        // Exécution de la requête
        $this->db->exec($sql);
    }

}
