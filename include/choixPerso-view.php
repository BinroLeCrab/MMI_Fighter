<?php

$persos = $MonManager->getAllPersonnage();

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
    <input type="submit" class="js_Start" value="FIGHT !" disabled/>

    <a href='index.php?Admin'>Liste des personnages</a>
</form>

<script type="text/javascript" src="js/perso_select.js"></script>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->