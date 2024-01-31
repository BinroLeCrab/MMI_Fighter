<?php

if ($_SESSION['perso1']->is_alive() == false) { ?>

    <p><?= $_SESSION['perso1']->getName() ?> est KO.</p>
    <p><?= $_SESSION['perso2']->getName() ?> a gagné !</p>

<?php
} else if ( $_SESSION['perso2']->is_alive() == false) { ?>

    <p><?= $_SESSION['perso2']->getName() ?> est KO.</p>
    <p><?= $_SESSION['perso1']->getName() ?> a gagné !</p>

<?php
}

?>

<!-- 
     _____     _____
    |  _  |   |  _  |
   -| | | |---| | | |-
    |_____| 7 |_____|  ~B!nro~
    
-->