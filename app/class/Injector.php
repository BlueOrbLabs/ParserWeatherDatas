<?php

/*
 * Enregistrer en base de données
 */
class Injector {
    
    private $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function findAll() {
        $sql = 'SELECT * FROM wd_data';
        
        $q = $this->db->query($sql);
        $datas = $q->fetch();
        return $datas;
    }

}
