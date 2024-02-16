<?php

if ($_SESSION['perso1']->is_alive() == false) {

    $Gagnant = $_SESSION['perso2'];
    $GagnantJ = 2;
    $Perdant = $_SESSION['perso1'];


} else if ( $_SESSION['perso2']->is_alive() == false) { 

    $Gagnant = $_SESSION['perso1'];
    $GagnantJ = 1;
    $Perdant = $_SESSION['perso2'];


}

?>


<main class="FinCombat_main">

    <h1 class="FinCombat__Titre">WINNER</h1>

    <div class="FinCombat_Joueur">
        <?php if ($GagnantJ == 1) { ?>
            <div class="FinCombat__Gagnant FinCombat--J1" style="--URL: url(../asset/perso/<?= $Gagnant->getS3() ?>)">
        <?php } else { ?>
            <div class="FinCombat__Gagnant FinCombat--J2" style="--URL: url(../asset/perso/<?= $Gagnant->getS3() ?>)">
        <?php } ?>

            <?php if ($GagnantJ == 1) { ?>
                <h2 class="FinCombat__Joueur">J1</h2>
            <?php } else { ?>
                <h2 class="FinCombat__Joueur">J2</h2>
            <?php } ?>

            <p class="FinCombat__Cri">"<?= $Gagnant->getCri() ?>"</p>

            <h3 class="FinCombat__Nom FinCombat__Nom--Winner"><?= $Gagnant->getName() ?></h3>
        </div>

        <?php if ($GagnantJ == 1) { ?>
            <div class="FinCombat__Perdant FinCombat--J2" style="--URL: url(../asset/perso/<?= $Perdant->getS3() ?>)">
        <?php } else { ?>
            <div class="FinCombat__Perdant FinCombat--J1" style="--URL: url(../asset/perso/<?= $Perdant->getS3() ?>)">
        <?php } ?>

            <p class="FinCombat__KO">KO</p>
        
            <?php if ($GagnantJ == 1) { ?>
                <h2 class="FinCombat__Joueur">J2</h2>
            <?php } else { ?>
                <h2 class="FinCombat__Joueur">J1</h2>
            <?php } ?>

            <h3 class="FinCombat__Nom FinCombat__Nom--Loser"><?= $Perdant->getName() ?></h3>

        </div>
    </div>

    <a href='index.php?restart'>Recommencer</a>

</main>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->