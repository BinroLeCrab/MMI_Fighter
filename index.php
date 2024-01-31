<?php
require_once 'init.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>MMI FIGHTER</title>
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
<?php
if (!isset($_SESSION['perso1']) && !isset($_SESSION['perso2'])) {
    
    if (!isset($_POST['perso1']) && !isset($_POST['perso2'])) {

        require_once 'include/choixPerso.php';

    } else {

        $_SESSION['perso1'] = $MonManager->getObject($_POST['perso1']);
    
        $_SESSION['perso2'] = $MonManager->getObject($_POST['perso2']);

        $_SESSION['tour'] = 0;

        var_dump($_SESSION);

        header('location:index.php');
    }
    
} else if (isset($_GET['restart'])) {
    
    $_SESSION = array();
    session_destroy();
    header('location:index.php');

} else {

    if ( $_SESSION['perso1']->is_alive() == false || $_SESSION['perso2']->is_alive() == false) {

        //? --- Affichage Fin Combat 

        require_once 'include/finCombat-view.php';

        echo $_SESSION['perso1']->getName()." est mort <br>";
        echo $_SESSION['perso2']->getName()." a gagné ! <br>";

    } else {

        //? --- Affichage Combat

        require_once 'include/combat-view.php';
    }
    
    echo "<a href='index.php?restart'>Recommencer</a>\n";   
    
    // $_SESSION['perso2']->regenerer(30);
}


?>
    </body>
</html>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->

