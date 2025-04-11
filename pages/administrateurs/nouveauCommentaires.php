<?php
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
    <title>Commentaires des 7 derniers jours</title>

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
    <section class="nouveau">
        <h1 style="text-align: center;">Les nouveaux commentaires au cours de ces 7 derniers jours : </h1>
        <?php
        while ($nouveauxCommentaires = $selectionCommentaire->fetch()) {
        ?>
            <div class="commentaire">
                <div class="contentBx">
                    <p class="pseudo"><span class="description">Auteur :</span> <?= $nouveauxCommentaires['pseudo_auteur'] ?></p>
                    <p class="nom"><span class="description">Message :</span> <?= $nouveauxCommentaires['contenu'] ?></p>
                    <span class="date">Le <?= $nouveauxCommentaires['temps'] ?></span>
                    <a href="./supprimmerCommentaire.php?id=<?= $nouveauxCommentaires['id'] ?>" class="btn"><i class="fa fa-trash"></i>Suprimmer ce commentaire</a>
                </div>
            </div>
        <?php
        }
        ?>
        <a href="./admin.php" class="btn fixe"><i class="fa fa-arrow-left"></i>Retour</a>
    </section>
    <?php include('../../includes/erreurEcran.php') ?>
</body>

</html>