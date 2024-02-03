<?php

class PersonnageManager {
    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }

    public function addPersonnage(Personnage $perso) :bool {
        $stmt = $this->db->prepare('INSERT INTO personnages(name, cri, atk, pv) VALUES(:n, :c, :a, :p)');
        
        $stmt->bindValue(':n', $perso->getName());
        $stmt->bindValue(':c', $perso->getCri());
        $stmt->bindValue(':a', $perso->getAtk());
        $stmt->bindValue(':p', $perso->getPv());

        $stmt->execute();
        
        return $stmt->rowCount();
    }

    public function deletePersonnage($id) :bool {
        $stmt = $this->db->prepare('DELETE FROM personnages WHERE id = :id');
        $stmt->bindValue(':id', $id);
        
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function modifyPersonnage(Personnage $perso) :bool {
        $stmt = $this->db->prepare('UPDATE personnages SET name = :n, cri = :c, atk = :a, pv = :p WHERE id = :id');
        $stmt->bindValue(':n', $perso->getName());
        $stmt->bindValue(':c', $perso->getCri());
        $stmt->bindValue(':a', $perso->getAtk());
        $stmt->bindValue(':p', $perso->getPv());
        $stmt->bindValue(':id', $perso->getId());

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getAllPersonnage() :array {
        $stmt = $this->db->query('SELECT * FROM personnages ORDER BY id');

        while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $persos[] = new Personnage($donnees);
        }

        return $persos;
    }

    public function getOnePersonnageById($id) :Personnage {
        $stmt = $this->db->prepare('SELECT * FROM personnages WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $donnees = $stmt->fetch(PDO::FETCH_ASSOC);

        $perso = new Personnage($donnees);
        return $perso;

    }

}

?>