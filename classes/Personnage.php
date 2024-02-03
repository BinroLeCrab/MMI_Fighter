<?php

class Personnage {

    private $id;
    private $name;
    private $cri;
    private $atk;
    private $pv;
    private $pv_max;

    private $S1;

    //? -------------------------GETTERS-------------------------------

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCri() {
        return $this->cri;
    }

    public function getAtk() {
        return $this->atk;
    }

    public function getPv() {
        return $this->pv;
    }

    public function getS1() {
        return $this->S1;
    }

    //? -------------------------SETTERS-------------------------------

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCri($cri) {
        $this->cri = $cri;
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

    public function setS1($S1) {
        $this->S1 = $S1;
    }

    private function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) { 
            $method = 'set'.ucfirst($key); 
            if (method_exists($this, $method)) { 
                $this->$method($value); 
            } 
        }
    }

    public function __construct($data) {
        $this->hydrate($data);
        $this->setPvMax($data['pv']);
    }

    public function crier() {
        return $this->getCri()."<br>";
    } 
    
    public function combatAff() {
        $reponse = "<div class=\"PvBar\" style=\"--Pv: ".($this->pv/$this->pv_max*100)."%\"></div>\n";
        $reponse .= "<p>".$this->name." attaque de ".$this->atk.", ".$this->pv." PV</p>\n";
        return $reponse;
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

    public function selectAff ($cote) {
        $reponse = "<div style=\"--URL: url(../asset/perso/".$this->getS1().");\" class=\"SelectCards Sj".$cote." js_Persoj".$cote."\"\">\n";
        
        $reponse.= "  <input type=\"radio\" id=\"".$this->getName().$cote."\" name=\"perso".$cote."\" value=\"".$this->getId()."\" />\n";

        // $reponse.= "  <label for=\"".$this->getName().$cote."\">".$this->getName()."</label>\n";

        $reponse.= "  <label for=\"".$this->getName().$cote."\">\n";

        $reponse.= "      <div class=\"Stats\">\n";

        $reponse.= "          <div class=\"nbStats\">\n";
        $reponse.= "              <p>".$this->getPv()."</p>\n";
        $reponse.= "              <img src=\"asset/PV.svg\" alt=\"PV\">\n";
        $reponse.= "          </div>\n";
        $reponse.= "          <div class=\"nbStats\">\n";
        $reponse.= "              <p>".$this->getAtk()."</p>\n";
        $reponse.= "              <img src=\"asset/ATK.svg\" alt=\"Attaque\">\n";
        $reponse.= "          </div>\n";

        $reponse.= "      </div>\n";

        $reponse.="       <p class=\"js_NamePers\">".$this->getName()."</p>\n";

        $reponse.="   </label>\n";

        $reponse.= "</div>\n";

        return $reponse;
    }

    public function attaque (Personnage $perso_cible) {
        $perso_cible->setPv($perso_cible->pv += - $this->atk);

        $reponse = "<hr>";

        $reponse .= $this->name . " attaque " . $perso_cible->name . " ! Dégats : " . $this->atk . "<br>";

        if ($perso_cible->is_alive()) {
            $reponse .= "PV restants : " . $perso_cible->pv . "<br>";
        } else {
            header('location:index.php');
        }
        return $reponse;
    }

}

?>