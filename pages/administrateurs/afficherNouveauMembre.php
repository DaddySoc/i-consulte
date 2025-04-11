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
    <title>Nouveau membre</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/bouttons.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <h1 style="text-align: center;">Les nouveaux inscrits au cours de ces 7 derniers jours : </h1>
    <section class="nouveau">
        <?php
        while ($compteNouveau = $selectionNouveauCompte->fetch()) {
        ?>
            <div class="profil">
                <div class="contentBx">
                    <div>
                        <a class="utilisateur" href="./voirProfilUtilisateur.php?id=<?= $compteNouveau['id'] ?>">
                            <p class="pseudo"><?= $compteNouveau['pseudo'] ?></p>
                            <p class="nom"><span class="description">NOM :</span> <?= $compteNouveau['nom'] ?></p>
                            <p class="prenom"><span class="description">PRENOM :</span> <?= $compteNouveau['prenom'] ?></p>
                            <span class="date">Membre depuis <?= $compteNouveau['date_de_creation'] ?></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <a href="./admin.php" class="btn fixe"><i class="fa fa-arrow-left"></i>Retour</a>
    </section>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>