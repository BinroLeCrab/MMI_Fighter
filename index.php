<?php
require_once 'Personnage.php';
session_start();


if (!isset($_SESSION['perso1']) && !isset($_SESSION['perso2'])) {
    $Gandalf = new Personnage("Gandalf", 100, 500);
    $_SESSION['perso1'] = $Gandalf;

    $Sauron = new Personnage("Sauron", 0, 1000);
    $_SESSION['perso2'] = $Sauron;
}

var_dump($_SESSION['perso1']);
var_dump($_SESSION['perso2']);

echo "Gandalf attaque de ".$_SESSION['perso1']->getAtk()." et a actuellement ".$_SESSION['perso1']->getPv()." pv <br>";
echo $_SESSION['perso1']->crier();

// $_SESSION['perso1']->regenerer(30);

if (isset($_GET['atk'])) {
    echo $_SESSION['perso1']->attaque($_SESSION['perso2']);
} else if (isset($_GET['restart'])) {
    $_SESSION = array();
    session_destroy();
    header('location:index.php');
}



echo "<a href='index.php?atk'>Attaquer</a>\n";
echo "<a href='index.php?restart'>Recommencer</a>\n";


// $_SESSION['perso2']->regenerer(30);
?>