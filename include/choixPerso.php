<?php

$persos = $MonManager->getList();

?>

<h1>Choisissez vos personnages</h1>
<form class="ChoixPerso" action='index.php' method='post'>
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

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->