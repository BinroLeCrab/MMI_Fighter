<?php
require_once 'init.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- favicon -->
        <link rel="icon" type="image/png" href="asset/favicon.png"/>
        <title>MMI FIGHTER</title>
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
<?php
if (isset($_GET['Admin'])){

    if (isset($_GET['Add']) && isset($_POST['name']) && isset($_POST['cri']) && isset($_POST['atk']) && isset($_POST['pv']) && isset($_POST['mana']) && isset($_FILES['S1'])) {

        $nomS1 = 'S1'.$_POST['name'].'_'.str_replace(' ', '_', $_FILES['S1']['name']);
        $nomS2 = 'S2'.$_POST['name'].'_'.str_replace(' ', '_', $_FILES['S2']['name']);
        $nomS3 = 'S3'.$_POST['name'].'_'.str_replace(' ', '_', $_FILES['S3']['name']);

        $data = [
            'name' => $_POST['name'],
            'cri' => $_POST['cri'],
            'atk' => $_POST['atk'],
            'pv' => $_POST['pv'],
            'mana' => $_POST['mana'],
            'S1' => $nomS1,
            'S2' => $nomS2,
            'S3' => $nomS3
        ];

        $New_Perso = new Personnage($data);

        var_dump($New_Perso);
        
        if ($MonManager->addPersonnage($New_Perso)){

            $nom1 = $_FILES['S1']['tmp_name'];
            $destination = './asset/perso/'.$nomS1;
            move_uploaded_file($nom1, $destination);

            $nom2 = $_FILES['S2']['tmp_name'];
            $destination = './asset/perso/'.$nomS2;
            move_uploaded_file($nom2, $destination);

            $nom3 = $_FILES['S3']['tmp_name'];
            $destination = './asset/perso/'.$nomS3;
            move_uploaded_file($nom3, $destination);

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
    } else if (isset($_GET['Modify']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['cri']) && isset($_POST['atk']) && isset($_POST['pv']) && isset($_POST['mana']) ) {

        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'cri' => $_POST['cri'],
            'atk' => $_POST['atk'],
            'pv' => $_POST['pv'],
            'mana' => $_POST['mana'],
        ];

        if (isset($_FILES['S1']) && $_FILES['S1']['error'] != UPLOAD_ERR_NO_FILE) {
            echo "S1 existe";
            $nomS1 = 'S1'.$data['name'].'_'.str_replace(' ', '_', $_FILES['S1']['name']);
            $data['S1'] = $nomS1;

            // Supprimer l'ancienne image si elle existe
            $oldImage1 = './asset/perso/'.$_POST['S1_Initial'];
            if (file_exists($oldImage1)) {
                unlink($oldImage1);
            }

            $nom = $_FILES['S1']['tmp_name'];
            $destination = './asset/perso/'.$nomS1;
            move_uploaded_file($nom, $destination);
        } else {
            echo "S1 n'existe pas";
            $data['S1'] = $_POST['S1_Initial'];
            echo "S1 : " . $_FILES['S1']['name'];
        }

        if (isset($_FILES['S2']) && $_FILES['S2']['error'] != UPLOAD_ERR_NO_FILE) {
            echo "S2 existe";
            $nomS2 = 'S2'.$data['name'].'_'.str_replace(' ', '_', $_FILES['S2']['name']);
            $data['S2'] = $nomS2;

            if ($_POST['S2_Initial'] != '') {


                // Supprimer l'ancienne image si elle existe
                $oldImage2 = './asset/perso/'.$_POST['S2_Initial'];
                if (file_exists($oldImage2)) {
                    unlink($oldImage2);
                }

            }

            $nom = $_FILES['S2']['tmp_name'];
            $destination = './asset/perso/'.$nomS2;
            move_uploaded_file($nom, $destination);
        } else {
            echo "S2 n'existe pas";
            $data['S2'] = $_POST['S2_Initial'];
            echo "S2 : " . $_FILES['S2']['name'];
        }

        if (isset($_FILES['S3']) && $_FILES['S3']['error'] != UPLOAD_ERR_NO_FILE) {
            echo "S3 existe";
            $nomS3 = 'S3'.$data['name'].'_'.str_replace(' ', '_', $_FILES['S3']['name']);
            $data['S3'] = $nomS3;

            if ($_POST['S3_Initial'] != '') {

                // var_dump($_POST['S3_Initial']);

                // Supprimer l'ancienne image si elle existe
                $oldImage3 = './asset/perso/'.$_POST['S3_Initial'];
                if (file_exists($oldImage3)) {
                    unlink($oldImage3);
                }

            }

            $nom = $_FILES['S3']['tmp_name'];
            $destination = './asset/perso/'.$nomS3;
            move_uploaded_file($nom, $destination);
        } else {
            echo "S3 n'existe pas";
            $data['S3'] = $_POST['S3_Initial'];
            echo "S3 : " . $_FILES['S3']['name'];
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

        // var_dump($_SESSION);

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

