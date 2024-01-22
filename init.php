<?php

require_once 'log.php';

function chargerClasse($classe) {
    require 'classes/'.$classe.'.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname='.DBNAME, LOGIN, MDP);
$MonManager = new PersonnageManager($db);

?>