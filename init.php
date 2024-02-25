<?php

require_once 'log/log.php';

function chargerClasse($classe) {
    require 'classes/'.$classe.'.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, LOGIN, MDP);
$MonManager = new PersonnageManager($db);

?>