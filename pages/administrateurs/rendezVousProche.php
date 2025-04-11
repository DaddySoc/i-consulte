<?php
// Vérifier que l'admin est authentifiée,avant de lui afficher la page
require('../../actions/securityAction.php');

require('../../actions/statistique.php');


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
    <title>Rendez-vous proche</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!-- Pour le navbar -->
    <link rel="stylesheet" href="../../css/navbar.css">
    <!-- Le corps de notre page admin -->
    <link rel="stylesheet" href="../../css/admin.css">
    <!-- Tout les bouttons de la page -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <div class="rendezVous">
        <h1>Les rendez-vous dans moins de 7 jours : </h1>
        <?php
        while ($rendezVousProche = $selectionRendezVousProche->fetch()) {
        ?>
            <div class="item">
                <div>
                    <h3 class="nom"><?= $rendezVousProche['pseudo_auteur'] ?></h3>
                    <p class="docteur"><span class="nomdocteur">docteur : </span> <?= $rendezVousProche['docteur'] ?></p>
                </div>
                <div>
                    <p class="heure"><span class="temp">matin</span> à <?= $rendezVousProche['date'] ?></p>
                    <p class="lieu"><span class="addresse"> <?= $rendezVousProche['addresse'] ?></span></p>
                </div>
                <a href="./annulerRendez-vous.php?id=<?= $rendezVousProche['id'] ?>" class="btn">Annuler ce rendez-vous</a>
            </div>
        <?php
        }
        $nombreRenderzVous = $selectionRendezVousProche->rowCount();
        if ($nombreRenderzVous == 0) {
        ?>
            <div class="vide">
                <span><i class="fa fa-check"></i></span>
                <span>Pas de rendez-vous proche</span>
            </div>
        <?php
        }
        ?>
    </div>
    <a href="./admin.php" class="btn fixe"><i class="fa fa-arrow-left"></i>Retour</a>

    <?php include('../../includes/erreurEcran.php') ?>
</body>

</html>