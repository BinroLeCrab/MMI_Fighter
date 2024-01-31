<?php

if (isset($_POST['Pers1_act'])) {

    if ($_POST['Pers1_act'] == 'Attaquer') {
        $action = $_SESSION['perso1']->attaque($_SESSION['perso2']);
    }

} else if (isset($_POST['Pers2_act'])) {

    if ($_POST['Pers2_act'] == 'Attaquer') {
        $action = $_SESSION['perso2']->attaque($_SESSION['perso1']);
    }

} 

?>

<p>Tour :<?= $_SESSION['tour'] ?></p>

<div>
    <?= $_SESSION['perso1']->combatAff() ?>
    <?= $_SESSION['perso2']->combatAff() ?>
</div>

<?php if (isset($action)) {?>

<div>
    <?= $action ?>
</div>

<?php } ?>

<?php 

if ($_SESSION['tour'] % 2 == 0) { 
    
?>
    <p>tour perso 1</p>

    <form action='index.php' method='post'>
        <input type="submit" class="btn_Action BtnAtk" name="Pers1_act" value="Attaquer" />
        <input type="submit" class="btn_Action BtnCap1" name="Pers1_act" value="Capacité 1" />
        <input type="submit" class="btn_Action BtnCap2" name="Pers1_act" value="Capacité 2" />
        <input type="submit" class="btn_Action BtnSoi" name="Pers1_act" value="Soin" />
    </form>

    <form action='index.php' method='post'>
        <input type="submit" class="btn_Action BtnAtk" name="Pers2_act" value="Attaquer" disabled />
        <input type="submit" class="btn_Action BtnCap1" name="Pers2_act" value="Capacité 1" disabled />
        <input type="submit" class="btn_Action BtnCap2" name="Pers2_act" value="Capacité 2" disabled />
        <input type="submit" class="btn_Action BtnSoi" name="Pers2_act" value="Soin" disabled />
    </form>

<?php

    $_SESSION['tour']++;

} else { 

?>
    <p>tour perso 2</p>

    <form action='index.php' method='post'>
        <input type="submit" class="btn_Action BtnAtk" name="Pers1_act" value="Attaquer" disabled />
        <input type="submit" class="btn_Action BtnCap1" name="Pers1_act" value="Capacité 1" disabled />
        <input type="submit" class="btn_Action BtnCap2" name="Pers1_act" value="Capacité 2" disabled />
        <input type="submit" class="btn_Action BtnSoi" name="Pers1_act" value="Soin" disabled />
    </form>

    <form action='index.php' method='post'>
        <input type="submit" class="btn_Action BtnAtk" name="Pers2_act" value="Attaquer" />
        <input type="submit" class="btn_Action BtnCap1" name="Pers2_act" value="Capacité 1" />
        <input type="submit" class="btn_Action BtnCap2" name="Pers2_act" value="Capacité 2" />
        <input type="submit" class="btn_Action BtnSoi" name="Pers2_act" value="Soin" />
    </form>

<?php

    $_SESSION['tour']++;
}

?>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->