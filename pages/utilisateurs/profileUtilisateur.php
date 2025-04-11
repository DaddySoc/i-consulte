<?php
require('../../actions/securityAction.php');
if ($_SESSION['admin'] == true) {
    header('Location: ../administrateurs/admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <div>
        <!-- Boutton pour retouner à l'écran d'acceuil -->
        <a href="./acceuil.php" class="btnRetour"><i class="fa fa-arrow-left"></i></a>
    </div>
    <div class="profile">
        <div class="nom">
            <span class="icone">
                <i class="fa fa-user"></i>
            </span>
            <h3>
                <?= $_SESSION['pseudo'] ?>
            </h3>
        </div>
        <div class="informationPerso">
            <p class="gras">Information sur l'utilisateur :</p>
            <span class="espace">
                <p class="gras"> Nom complet : </p><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Age : </p><?= $_SESSION['age'] ?> ans
            </span>
            <span class="espace">
                <p class="gras"> Email : </p> <?= $_SESSION['email'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Contact : </p> <?= $_SESSION['contact'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Membre depuis : </p> <?= $_SESSION['date_de_creation'] ?>
            </span>
        </div>
        <a href="./modifierProfil.php" class="btn"><i class="fa fa-pen"></i> Modifier</a>
    </div>
    <?php include('../../includes/erreurEcran.php') ?>

</body>

</html>