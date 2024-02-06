<?php

$persos = $MonManager->getAllPersonnage();

?>

<h1>Choisissez vos personnages</h1>
<form class="ChoixPerso" action='index.php' method='post'>
    <div class="GrillePerso GPj1">
        <h2>Personnage 1</h2>

        <?php foreach ($persos as $perso) {
            echo $perso->selectAff("1");
        }
        ?>
    </div>
    <div class="GrillePerso GPj2">
        <h2>Personnage 2</h2>
        <?php foreach ($persos as $perso) {
            echo $perso->selectAff("2");
        }
        ?>
    </div>
    <input type="submit" class="Start_Btn js_Start" value="FIGHT !" disabled/>

    <a href='index.php?Admin' class="Lien">Liste des personnages</a>
</form>

<script type="text/javascript" src="js/perso_select.js"></script>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->