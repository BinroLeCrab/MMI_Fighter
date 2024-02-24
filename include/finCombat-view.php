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

    <div class="FinCombat__JoueurContainer">
        <?php if ($GagnantJ == 1) { ?>
            <div class="FinCombat__Gagnant FinCombat--J1" style="--URL: url(../asset/perso/<?= $Gagnant->getS3() ?>)">
        <?php } else { ?>
            <div class="FinCombat__Gagnant FinCombat--J2" style="--URL: url(../asset/perso/<?= $Gagnant->getS3() ?>)">
        <?php } ?>

            <?php if ($GagnantJ == 1) { ?>
                <h2 class="FinCombat__Joueur FinCombat__Joueur--Winner Shadow--J1">J1</h2>
            <?php } else { ?>
                <h2 class="FinCombat__Joueur FinCombat__Joueur--Winner Shadow--J2">J2</h2>
            <?php } ?>

            <p class="FinCombat__Cri Text_Border">"<?= $Gagnant->getCri() ?>"</p>

            <h3 class="FinCombat__Nom FinCombat__Nom--Winner Shadow--J<?= $GagnantJ ?>"><?= $Gagnant->getName() ?></h3>
        </div>

        <div class="FinCombat__ContainerLoser">

            <?php if ($GagnantJ == 1) { ?>
                <div class="FinCombat__Perdant FinCombat--J2" style="--URL: url(../asset/perso/<?= $Perdant->getS3() ?>)">
            <?php } else { ?>
                <div class="FinCombat__Perdant FinCombat--J1" style="--URL: url(../asset/perso/<?= $Perdant->getS3() ?>)">
            <?php } ?>
                <img class="FinCombat__SpriteLoser" src="asset/perso/<?=$Perdant->getS1()?>" alt=""/>
            
            <?php if ($GagnantJ == 1) { ?>
                <h3 class="FinCombat__Nom FinCombat__Nom--Loser FinCombat__Nom--LoserJ2 Text_Border"><?= $Perdant->getName() ?></h3>
            <?php } else { ?>
                <h3 class="FinCombat__Nom FinCombat__Nom--Loser FinCombat__Nom--LoserJ1 Text_Border"><?= $Perdant->getName() ?></h3>
            <?php } ?>
            
            </div>

            <p class="FinCombat__KO">KO</p>
            
            <?php if ($GagnantJ == 1) { ?>
                <h2 class="FinCombat__Joueur FinCombat__Joueur--Loser Shadow--J2">J2</h2>
            <?php } else { ?>
                <h2 class="FinCombat__Joueur FinCombat__Joueur--Loser Shadow--J1">J1</h2>
            <?php } ?>

        </div>
    </div>

    <a href='index.php?restart' class="BTN Text_Border Start_Btn">Restart</a>

</main>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->