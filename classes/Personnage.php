<?php

class Personnage {

    private $id;
    private $name;
    private $cri;
    private $atk;
    private $pv;
    private $pv_max;

    private $S1;
    private $S2;
    private $S3;

    private $soin = 50;

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

    public function getS2() {
        return $this->S2;
    }

    public function getS3() {
        return $this->S3;
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

    public function setS2($S2) {
        $this->S2 = $S2;
    }

    public function setS3($S3) {
        $this->S3 = $S3;
    }

    //? -------------------------METHODES-------------------------------

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
        return $this->getCri();
    } 
    
    public function combatAff() {
        $reponse = "<div class=\"Text_Border CombatHeader__PVandINFO\">\n";

        $reponse .= "   <div class=\"PvBar\" style=\"--Pv: ".($this->pv/$this->pv_max*100)."%\"></div>\n";

        $reponse .= "   <div class=\"Bloc_Stat\">\n";
        $reponse .= "       <div class=\"nbStats\">\n";
        $reponse .= "           <p>".$this->getAtk()."</p>\n";
        $reponse .= "           <img class=\"IconHaut\" src=\"asset/ATK.svg\" alt=\"ATK\">\n";
        $reponse .= "       </div>\n";
        $reponse .= "       <div class=\"nbStats\">\n";
        $reponse .= "           <p>".$this->getPv()."</p>\n";
        $reponse .= "           <img class=\"IconHaut\" src=\"asset/PV.svg\" alt=\"PV\">\n";
        $reponse .= "       </div>\n";
        $reponse .= "   </div>\n";

        $reponse .= "   <img class=\"CombatHeader__IMG\" src=\"asset/perso/".$this->getS1()."\" alt=\"\">\n";

        $reponse .= "   <p class=\"CombatHeader__Name\">".$this->getName()."</p>\n";

        $reponse .= "</div>\n";

        return $reponse;
    }

    private function regenerer(int $x=NULL) {
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

        $reponse.= "  <label class=\"Text_Border\" for=\"".$this->getName().$cote."\">\n";

        $reponse.= "      <div class=\"Stats js_Stats\">\n";

        $reponse.= "          <div class=\"nbStats\">\n";
        $reponse.= "              <p class=\"js_PV\">".$this->getPv()."</p>\n";
        $reponse.= "              <img src=\"asset/PV.svg\" alt=\"PV\">\n";
        $reponse.= "          </div>\n";
        $reponse.= "          <div class=\"nbStats\">\n";
        $reponse.= "              <p class=\"js_ATK\">".$this->getAtk()."</p>\n";
        $reponse.= "              <img src=\"asset/ATK.svg\" alt=\"Attaque\">\n";
        $reponse.= "          </div>\n";

        $reponse.= "      </div>\n";

        $reponse.="       <p class=\"js_NamePers\">".$this->getName()."</p>\n";

        $reponse.="       <img src=\"./asset/perso/".$this->getS2()."\" class=\"js_ImgPers Sprite\" alt=\"\">\n";

        $reponse.="   </label>\n";

        $reponse.= "</div>\n";

        return $reponse;
    }

    public function attaque (Personnage $perso_cible) {
        $perso_cible->setPv($perso_cible->pv += - $this->atk);

        $reponse = "<hr>";

        $reponse .= "<p>" . $this->name . " attaque " . $perso_cible->name . " ! Dégats : " . $this->atk . "</p>\n";

        if ($perso_cible->is_alive()) {
            $reponse .= "PV restants : " . $perso_cible->pv . "<br>";
        } else {
            header('location:index.php');
        }
        return $reponse;
    }

    public function capacite1 (Personnage $perso_cible) {

        // var_dump($this);

        $reponse = "<hr>";

        $reponse .= "<p>" . $this->name . " passe son tour en essayant une features encore indisponnible...</p>\n";

        if ($perso_cible->is_alive()) {
            $reponse .= "<p>" . $perso_cible->getName() . " est surpris.</p>";
        } else {
            header('location:index.php');
        }

        return $reponse;
    }

    public function capacite2 (Personnage $perso_cible) {

        // var_dump($this);

        $reponse = "<hr>";

        $reponse .= "<p>" . $this->name . " passe son tour en essayant une features encore indisponnible...</p>\n";

        if ($perso_cible->is_alive()) {
            $reponse .= "<p>" . $perso_cible->getName() . " est surpris.</p>";
        } else {
            header('location:index.php');
        }

        return $reponse;
    }

    public function soin () {

        if ($this->pv == $this->pv_max) {
            return "<hr><p>" . $this->name . " est déjà au maximum de ses PV !</p>\n";
        } else if ($this->pv + $this->soin > $this->pv_max) {
            $gain = $this->pv_max - $this->pv;

            $this->regenerer();

            $reponse = "<hr>";

            $reponse .= "<p>" . $this->name . " se soigne de " . $gain . " PV !</p>\n";

            $reponse .= "PV restants : " . $this->pv . "<br>";

            return $reponse;
        } else {
            $this->regenerer($this->soin);

            $reponse = "<hr>";

            $reponse .= "<p>" . $this->name . " se soigne de " . $this->soin . " PV !</p>\n";

            $reponse .= "PV restants : " . $this->pv . "<br>";

            return $reponse;
        }
        
    }
}

?>