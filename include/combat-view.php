<?php

if (isset($_POST['Pers1_act'])) {

    if ($_POST['Pers1_act'] == 'Attaquer') {
        $action = $_SESSION['perso1']->attaque($_SESSION['perso2']);
    } else if ($_POST['Pers1_act'] == 'Capacité 1') {
        $action = $_SESSION['perso1']->capacite1($_SESSION['perso2']);
    } else if ($_POST['Pers1_act'] == 'Capacité 2') {
        $action = $_SESSION['perso1']->capacite2($_SESSION['perso2']);
    } else if ($_POST['Pers1_act'] == 'Soin') {
        $action = $_SESSION['perso1']->soin();
    }

} else if (isset($_POST['Pers2_act'])) {

    if ($_POST['Pers2_act'] == 'Attaquer') {
        $action = $_SESSION['perso2']->attaque($_SESSION['perso1']);
    } else if ($_POST['Pers2_act'] == 'Capacité 1') {
        $action = $_SESSION['perso2']->capacite1($_SESSION['perso1']);
    } else if ($_POST['Pers2_act'] == 'Capacité 2') {
        $action = $_SESSION['perso2']->capacite2($_SESSION['perso1']);
    } else if ($_POST['Pers2_act'] == 'Soin') {
        $action = $_SESSION['perso2']->soin();
    }
}

?>

<main class="Combat_main">

    <section class="SpriteBack">
        <img class="js_ImgPersoJ1" src="asset/perso/<?= $_SESSION['perso1']->getS2() ?>" alt="" />
        <img class="js_ImgPersoJ2" src="asset/perso/<?= $_SESSION['perso2']->getS2() ?>" alt="" />
    </section>


    <div class="Combat__Header">
        <?= $_SESSION['perso1']->combatAff() ?>
        <h2 class="VS">VS</h2>
        <?= $_SESSION['perso2']->combatAff() ?>
    </div>

    <section class="Combat_SectAct">


        <div class="Action js_action">

            <?php 

            if (isset($action)) {
                if (isset($_SESSION['Action'])){
                    $_SESSION['Action'] .= $action;
                } else {
                    $_SESSION['Action'] = $action;
                }
            }

            if (isset($_SESSION['Action'])) {
                echo $_SESSION['Action'];
            }
            ?>
        </div>

    <?php

    if ($_SESSION['tour'] % 2 == 0) { 
                
    ?>

        
        <!-- <p>tour perso 1</p> -->

        <form class="Form_Action_j1" action='index.php' method='post'>
            <input type="submit" class="BTN btn_Action BtnAtk" name="Pers1_act" value="Attaquer" />
            <div class="btn_Action_Not__Container">
                <input type="submit" class="BTN btn_Action BtnCap1" name="Pers1_act" value="Capacité 1" />
                <span class="Info__Container"><span class="btn_Action_Not">Indisponnible pour le moment...</span></span>
            </div>
            <div class="btn_Action_Not__Container">
                <input type="submit" class="BTN btn_Action BtnCap2" name="Pers1_act" value="Capacité 2" />
                <span class="Info__Container"><span class="btn_Action_Not">Indisponnible pour le moment...</span></span>
            </div>
            <input type="submit" class="BTN btn_Action BtnSoi" name="Pers1_act" value="Soin" />
        </form>

        <form class="Form_Action_j2" action='index.php' method='post'>
            <input type="submit" class="BTN btn_Action BtnAtk" name="Pers2_act" value="Attaquer" disabled />
            <input type="submit" class="BTN btn_Action BtnCap1" name="Pers2_act" value="Capacité 1" disabled />
            <input type="submit" class="BTN btn_Action BtnCap2" name="Pers2_act" value="Capacité 2" disabled />
            <input type="submit" class="BTN btn_Action BtnSoi" name="Pers2_act" value="Soin" disabled />
        </form>

    <?php

    } else { 

    ?>
        <!-- <p>tour perso 2</p> -->

        <form class="Form_Action_j1" action='index.php' method='post'>
            <input type="submit" class="BTN btn_Action BtnAtk" name="Pers1_act" value="Attaquer" disabled />
            <input type="submit" class="BTN btn_Action BtnCap1" name="Pers1_act" value="Capacité 1" disabled />
            <input type="submit" class="BTN btn_Action BtnCap2" name="Pers1_act" value="Capacité 2" disabled />
            <input type="submit" class="BTN btn_Action BtnSoi" name="Pers1_act" value="Soin" disabled />
        </form>

        <form class="Form_Action_j2" action='index.php' method='post'>
            <input type="submit" class="BTN btn_Action BtnAtk" name="Pers2_act" value="Attaquer" />
            <div class="btn_Action_Not__Container">
                <input type="submit" class="BTN btn_Action BtnCap1" name="Pers1_act" value="Capacité 1" />
                <span class="Info__Container"><span class="btn_Action_Not">Indisponnible pour le moment...</span></span>
            </div>
            <div class="btn_Action_Not__Container">
                <input type="submit" class="BTN btn_Action BtnCap2" name="Pers1_act" value="Capacité 2" />
                <span class="Info__Container"><span class="btn_Action_Not">Indisponnible pour le moment...</span></span>
            </div>
            <input type="submit" class="BTN btn_Action BtnSoi" name="Pers2_act" value="Soin" />
        </form>

    <?php

        
    }

    $_SESSION['tour']++;
    ?>

    </section>
</main>

<script type="text/javascript" src="js/scroll_action.js"></script>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->