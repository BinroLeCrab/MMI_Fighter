<?php

$persos = $MonManager->getList();

// var_dump($persos);

?>

<h1>Choisissez vos personnages</h1>
<form action='index.php' method='post'>
    <div>
        <h2>Personnage 1</h2>

        <?php foreach ($persos as $perso) {
            echo $perso->selectAff("1");
        }
        ?>
    </div>
    <div>
        <h2>Personnage 2</h2>
        <?php foreach ($persos as $perso) {
            echo $perso->selectAff("2");
        }
        ?>
    </div>
    <input type="submit" value="FIGHT !"/>
</form>