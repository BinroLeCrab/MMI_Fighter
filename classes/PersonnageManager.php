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
        $stmt = $this->db->prepare('INSERT INTO personnages(name, cri, atk, pv, S1, S2, S3) VALUES(:n, :c, :a, :p, :s1, :s2, :s3)');
        
        $stmt->bindValue(':n', $perso->getName());
        $stmt->bindValue(':c', $perso->getCri());
        $stmt->bindValue(':a', $perso->getAtk());
        $stmt->bindValue(':p', $perso->getPv());
        $stmt->bindValue(':s1', $perso->getS1());
        $stmt->bindValue(':s2', $perso->getS2());
        $stmt->bindValue(':s3', $perso->getS3());

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

        $stmt = $this->db->prepare('UPDATE personnages SET name = :n, cri = :c, atk = :a, pv = :p, S1 = :s1, S2 = :s2, S3 = :s3 WHERE id = :id');

        $stmt->bindValue(':n', $perso->getName());
        $stmt->bindValue(':c', $perso->getCri());
        $stmt->bindValue(':a', $perso->getAtk());
        $stmt->bindValue(':p', $perso->getPv());
        $stmt->bindValue(':s1', $perso->getS1());
        $stmt->bindValue(':s2', $perso->getS2());
        $stmt->bindValue(':s3', $perso->getS3());
        $stmt->bindValue(':id', $perso->getId());

        return $stmt->execute();

        // return $stmt->rowCount();
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