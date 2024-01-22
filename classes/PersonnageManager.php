<?php

class PersonnageManager {
    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }

    public function getList() {
        $stmt = $this->db->query('SELECT * FROM personnages ORDER BY id');

        while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $persos[] = new Personnage($donnees);
        }

        return $persos;
    }

    public function getObject($id) {
        $stmt = $this->db->prepare('SELECT * FROM personnages WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

            $perso = new Personnage($donnees);
            return $perso;

    }

}

?>