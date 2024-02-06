<?php

$persos = $MonManager->getAllPersonnage();

?>

<section class="Admin">

    <a href='index.php'>Retour à l'accueil.</a>

    <table>
        <tr>
            <th>Id</th>
            <th>Sprite 1</th>
            <th>Nom</th>
            <th>Cri</th>
            <th>Attaque</th>
            <th>PV</th>
        </tr>

        <?php foreach ($persos as $perso) { ?>
        <tr>
            <?php if (isset($_GET['Mod_perso']) && $_GET['Mod_perso'] == $perso->getId()) { ?>

            <form action='index.php?Admin&Modify' enctype="multipart/form-data" method='post'>
                <input type="hidden" name="id" value="<?= $perso->getId() ?>" />
                <input type="hidden" name="S1_Initial" value="<?= $perso->getS1() ?>" />
                <td><?= $perso->getId() ?></td>
                <!-- <td><img class="Tabl_Sprite" src="asset/perso/<?= $perso->getS1() ?>" alt=""/></td> -->
                <td>
                    <img class="Tabl_Sprite" src="asset/perso/<?= $perso->getS1() ?>" alt=""/>
                    <input type="file" name="S1" value="<?= $perso->getS1() ?>"/>
                </td>
                <td><input type="text" name="name" value="<?= $perso->getName() ?>" required /></td>
                <td><input type="text" name="cri" value="<?= $perso->getCri() ?>" required /></td>
                <td><input type="number" name="atk" value="<?= $perso->getAtk() ?>" required /></td>
                <td><input type="number" name="pv" value="<?= $perso->getPv() ?>" required /></td>
                <td><input type="submit" name="mod_perso" value="Modifier" /></td>
            </form>

            <?php } else { ?>

            <td><?= $perso->getId() ?></td>
            <td><img class="Tabl_Sprite" src="asset/perso/<?= $perso->getS1() ?>" alt=""/></td>
            <td><?= $perso->getName() ?></td>
            <td><?= $perso->getCri() ?></td>
            <td><?= $perso->getAtk() ?></td>
            <td><?= $perso->getPv() ?></td>
            <td><a href='index.php?Admin&Mod_perso=<?= $perso->getId() ?>'>Modifier</a> | <a href='index.php?Admin&Del_perso=<?= $perso->getId() ?>'>Supprimer</a></td>

            <?php } ?>
        </tr>
        <?php } ?>
    </table>

    <?php if (isset($_GET['Add_perso'])) { ?>

        <form action='index.php?Admin&Add' enctype="multipart/form-data" method='post'>
            <input type="text" name="name" placeholder="Nom" required />
            <input type="text" name="cri" placeholder="Cri" required />
            <input type="number" name="atk" placeholder="Attaque" required />
            <input type="number" name="pv" placeholder="PV" required />
            <input type="file" name="S1" required />
            <input type="submit" name="add_perso" value="Ajouter" />
        </form>
    <?php } else { ?>
        <a href='index.php?Admin&Add_perso'>Ajouter un personnage</a>
    <?php } ?>
</section>