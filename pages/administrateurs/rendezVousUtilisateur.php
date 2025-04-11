<?php
require('../../actions/securityAction.php');
require('../../actions/selectionRendezVous.php');
if ($_SESSION['admin'] == false) {
    header('Location: ../utilisateurs/acceuil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous utilisateurs</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <div class="rendezVous">
        <?php
        while ($affichageRendezVous = $rendezVous->fetch()) {
        ?>
            <div class="item">
                <div>
                    <h3 class="nom"><?= $affichageRendezVous['pseudo_auteur'] ?></h3>
                    <p class="docteur"><span class="nomdocteur">docteur : </span> <?= $affichageRendezVous['docteur'] ?></p>
                </div>
                <div>
                    <p class="heure"><span class="temp">matin</span> à <?= $affichageRendezVous['date'] ?></p>
                    <p class="lieu"><span class="addresse"> <?= $affichageRendezVous['addresse'] ?></span></p>
                </div>
                <a href="./marquerLue.php?id=<?= $affichageRendezVous['id'] ?>" class="btn">Marquer comme lue</a>
            </div>
        <?php
        }
        if ($nombreRendezVous == 0) {
        ?>
            <div class="vide">
                <h3><span><i class="fa fa-check-circle"></i></span>Vous avez tout lu...</h3>
            </div>
        <?php
        }
        ?>
        <a href="./admin.php" class="fixe btn"><span><i class="fa fa-arrow-left"></i></span>Retour</a>
    </div>

</body>

</html>