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
if (isset($_GET['Admin'])){

    if (isset($_GET['Add']) && isset($_POST['name']) && isset($_POST['cri']) && isset($_POST['atk']) && isset($_POST['pv']) && isset($_FILES['S1'])) {

        $nomS1 = $data['name'].'_'.str_replace(' ', '_', $_FILES['S1']['name']);

        $data = [
            'name' => $_POST['name'],
            'cri' => $_POST['cri'],
            'atk' => $_POST['atk'],
            'pv' => $_POST['pv'],
            'S1' => $nomS1
        ];

        $New_Perso = new Personnage($data);

        var_dump($New_Perso);
        
        if ($MonManager->addPersonnage($New_Perso)){

            $nom = $_FILES['S1']['tmp_name'];
            $destination = './asset/perso/'.$nomS1;
            move_uploaded_file($nom, $destination);

            header('location:index.php?Admin');
        } else {
            echo "Erreur lors de l'ajout du personnage.";
        }

    } else if (isset($_GET['Del_perso'])) {

        if ($MonManager->deletePersonnage($_GET['Del_perso'])){
            header('location:index.php?Admin');
        } else {
            echo "Erreur lors de la suppression du personnage.";
        }
    } else if (isset($_GET['Modify']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['cri']) && isset($_POST['atk']) && isset($_POST['pv']) ) {

        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'cri' => $_POST['cri'],
            'atk' => $_POST['atk'],
            'pv' => $_POST['pv']
        ];

        if (isset($_FILES['S1']) && $_FILES['S1']['error'] != UPLOAD_ERR_NO_FILE) {
            echo "S1 existe";
            $nomS1 = $data['name'].'_'.str_replace(' ', '_', $_FILES['S1']['name']);
            $data['S1'] = $nomS1;

            // Supprimer l'ancienne image si elle existe
            $oldImage = './asset/perso/'.$_POST['S1_Initial'];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $nom = $_FILES['S1']['tmp_name'];
            $destination = './asset/perso/'.$nomS1;
            move_uploaded_file($nom, $destination);
        } else {
            echo "S1 n'existe pas";
            $data['S1'] = $_POST['S1_Initial'];
            echo "S1 : " . $_FILES['S1']['name'];
        }

        $Modify_Perso = new Personnage($data);

        if ($MonManager->modifyPersonnage($Modify_Perso)){
            var_dump($Modify_Perso);
            header('location:index.php?Admin');
        } else {
            var_dump($Modify_Perso);
            echo $MonManager->modifyPersonnage($Modify_Perso);
            echo "Erreur lors de la modification du personnage.";
        }

    }

    $_SESSION = array();
    session_destroy();
    require_once 'include/admin-view.php';
    
} else if (!isset($_SESSION['perso1']) && !isset($_SESSION['perso2'])) {
    
    if (isset($_SESSION['enter']) && !isset($_POST['perso1']) && !isset($_POST['perso2'])) {

        require_once 'include/choixPerso-view.php';

    } else if (isset($_GET['enter']) && !isset($_POST['perso1']) && !isset($_POST['perso2'])) {

        $_SESSION['enter'] = true;
        header('location:index.php');

    } else if (!isset($_POST['perso1']) && !isset($_POST['perso2'])){

        require_once 'include/acceuil-view.php';
        
    } else {

        $_SESSION['perso1'] = $MonManager->getOnePersonnageById($_POST['perso1']);
    
        $_SESSION['perso2'] = $MonManager->getOnePersonnageById($_POST['perso2']);

        $_SESSION['tour'] = 0;

        var_dump($_SESSION);

        header('location:index.php');
    }
    
} else if (isset($_GET['restart'])) {
    
    $_SESSION = array();
    session_destroy();
    header('location:index.php');

} else {
    // var_dump($_SESSION);

    if ( $_SESSION['perso1']->is_alive() == false || $_SESSION['perso2']->is_alive() == false) {

        //? --- Affichage Fin Combat 

        require_once 'include/finCombat-view.php';

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

