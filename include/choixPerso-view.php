<?php

$persos = $MonManager->getAllPersonnage();

?>

<main class="PersoMain">
    <h1>Choisissez vos personnages</h1>
    <section class="SpriteBack">
        <img class="js_ImgPersoJ1 spriteJ1--NotSelect" src="" alt="" />
        <img class="js_ImgPersoJ2 spriteJ2--NotSelect" src="" alt="" />
    </section>
    <section class="Choix_Haut">
        <div class="sectionJ1 sectionJ1--NotSelect">
            <h2>J1</h2>
            <div class="js_StatsPersoJ1 Text_Border Bloc_Stat">
                <div class="nbStats">
                    <p class="js_PV">PV</p>
                    <img class="IconHaut" src="asset/PV.svg" alt="PV">
                </div>
                <div class="nbStats">
                    <p class="js_Atk">ATK</p>
                    <img class="IconHaut" src="asset/ATK.svg" alt="ATK">
                </div>
            </div>
            <div class="Text_Border Bloc_Nom_Cit">
                <h3 class="js_NomPersoJ1">Personnage 1</h3>
                <!-- <p>"Il a des penchant bizarre, mais on l'aime bien quand même !"</p> -->
            </div>
        </div>
        <h2 class="VS">VS</h2>
        <div class="sectionJ2 sectionJ2--NotSelect">
            <h2>J2</h2>
            <div class="js_StatsPersoJ2 Text_Border Bloc_Stat">
                <div class="nbStats">
                    <p class="js_PV">PV</p>
                    <img class="IconHaut" src="asset/PV.svg" alt="PV">
                </div>
                <div class="nbStats">
                    <p class="js_Atk">ATK</p>
                    <img class="IconHaut" src="asset/ATK.svg" alt="ATK">
                </div>
            </div>
            <div class="Text_Border Bloc_Nom_Cit">
                <h3 class="js_NomPersoJ2">Personnage 2</h3>
                <!-- <p>"Il a des penchant bizarre, mais on l'aime bien quand même !"</p> -->
            </div>
        </div>
    </section>
    <section class="Choix_Bas">
        <form class="ChoixPerso" action='index.php' method='post'>
            <div class="GrillePerso GPj1">


                <?php foreach ($persos as $perso) {
                    echo $perso->selectAff("1");
                }
                ?>
            </div>
            <div class="GrillePerso GPj2">

                <?php foreach ($persos as $perso) {
                    echo $perso->selectAff("2");
                }
                ?>
            </div>
            <input type="submit" class="BTN Text_Border Start_Btn js_Start" value="FIGHT !" disabled />

        </form>
        <a href='index.php?Admin' class="Lien">Liste des personnages</a>
    </section>
</main>

<script type="text/javascript" src="js/perso_select.js"></script>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->