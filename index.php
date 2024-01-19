<?php
require_once 'Personnage.php';

$Gandalf = new Personnage("Gandalf", 100, 500);
$Sauron = new Personnage("Sauron", 0, 1000);

var_dump($Gandalf);
var_dump($Sauron);

echo "Gandalf attaque de ".$Gandalf->getAtk()." et a actuellement ".$Gandalf->getPv()." pv <br>";
echo $Gandalf->crier();

$Gandalf->regenerer(30);



echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);
echo $Gandalf->attaque($Sauron);


$Sauron->regenerer(30);
?>