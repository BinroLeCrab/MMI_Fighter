<?php

class Personnage {

    private $name;
    private $atk;
    private $pv;
    private $pv_max;

    //? -------------------------FUNCTION-------------------------------

    public function getName() {
        return $this->name;
    }

    public function getAtk() {
        return $this->atk;
    }

    public function getPv() {
        return $this->pv;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAtk($atk) {
        if ($atk > 0) {
            $this->atk = $atk;
        } else {
            $this->atk = 0;
        }
    }

    public function setPv($pv) {
        if ($pv > 0) {
            $this->pv = $pv;
        } else {
            $this->pv = 0;
        }
    }

    public function setPvMax($pv) {
        if ($pv > 0) {
            $this->pv_max = $pv;
        } else {
            $this->pv_max = 0;
        }
    }

    function __construct($name, $atk, $pv) {
        $this->setName($name);
        $this->setAtk($atk);
        $this->setPv($pv);
        $this->setPvMax($pv);
    }

    public function crier() {
        return "Vous ne passerez pas !<br>";
    } 

    public function regenerer(int $x=NULL) {
        if (is_null($x)) {
            $this->setPv($this->pv_max);
        } else {
            $this->setPv($this->pv += $x);
        }
    }

    public function is_alive () {
        if ($this->pv > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function attaque (Personnage $perso_cible) {
        $perso_cible->setPv($perso_cible->pv += - $this->atk);

        $reponse = "<hr>";

        $reponse .= $this->name . " attaque " . $perso_cible->name . " ! Dégats : " . $this->atk . "<br>";

        if ($perso_cible->is_alive()) {
            $reponse .= "PV restants : " . $perso_cible->pv . "<br>";
        } else {
            $reponse .= $perso_cible->name . " est mort !<br>";
        }
        return $reponse;
    }

}

?>