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
        require_once 'choixPerso.php';
        // echo"b";
    } else {

        echo "a";
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

    if ( $_SESSION['perso1']->is_alive() == false) {


        echo $_SESSION['perso1']->getName()." est mort <br>";
        echo $_SESSION['perso2']->getName()." a gagné ! <br>";

    } else if ( $_SESSION['perso2']->is_alive() == false) {


        echo $_SESSION['perso2']->getName()." est mort <br>";
        echo $_SESSION['perso1']->getName()." a gagné ! <br>";

    } else {

        if (isset($_GET['perso1'])) {

            if ($_GET['perso1'] == 'atk') {
                echo $_SESSION['perso1']->attaque($_SESSION['perso2']);
            }

        } else if (isset($_GET['perso2'])) {

            if ($_GET['perso2'] == 'atk') {
                echo $_SESSION['perso2']->attaque($_SESSION['perso1']);
            }

        }

        // var_dump($_SESSION['perso1']);
        // var_dump($_SESSION['perso2']);
        // var_dump($_SESSION['tour']);

        echo "Tour : ".$_SESSION['tour']."<br>";
        
        echo $_SESSION['perso1']->combatAff();
        echo $_SESSION['perso2']->combatAff();
        // echo $_SESSION['perso1']->crier();
        
        // $_SESSION['perso1']->regenerer(30);
        
        

        if ($_SESSION['tour']%2 == 0) {
            echo "tour perso 1";

            echo "<a href='index.php?perso1=atk' class=\"btn_Action BtnAtk\">Attaquer</a>\n";
            echo "<a href='index.php?perso1=atk' class=\"btn_Action BtnCap1\">Capacité 1</a>\n";
            echo "<a href='index.php?perso1=atk' class=\"btn_Action BtnCap2\">Capacité 2</a>\n";
            echo "<a href='index.php?perso1=atk' class=\"btn_Action BtnSoi\">Soin</a>\n";

            $_SESSION['tour']++;
        } else {
            echo "tour perso 2";

            echo "<a href='index.php?perso2=atk' class=\"btn_Action BtnAtk\">Attaquer</a>\n";
            echo "<a href='index.php?perso2=atk' class=\"btn_Action BtnCap1\">Capacité 1</a>\n";
            echo "<a href='index.php?perso2=atk' class=\"btn_Action BtnCap2\">Capacité 2</a>\n";
            echo "<a href='index.php?perso2=atk' class=\"btn_Action BtnSoi\">Soin</a>\n";

            $_SESSION['tour']++;
        }

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

