<?php
require('../../actions/securityAction.php');
require('../../actions/profilUtilisateur.php');
if ($_SESSION['admin'] == false) {
    header('Location: ../utilisateurs/acceuil.php');

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
        <a href="./parametreAdmin.php" title="Retourner a la page message" class="btnRetour"><i class="fa fa-arrow-left"></i></a>
    </div>
    <div class="profile">
        <div class="nom">
            <span class="icone">
                <i class="fa fa-user"></i>
            </span>
            <h3>
                <?= $resultat['pseudo'] ?>
            </h3>
        </div>
        <div class="informationPerso">
            <p class="gras">Information sur l'utilisateur :</p>
            <span class="espace">
                <p class="gras"> Nom complet : </p><?= $resultat['nom'] ?> <?= $resultat['prenom'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Age : </p><?= $resultat['age'] ?> ans
            </span>
            <span class="espace">
                <p class="gras"> Email : </p> <?= $resultat['email'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Contact : </p> <?= $resultat['contact'] ?>
            </span>
            <span class="espace">
                <p class="gras"> Membre depuis : </p> <?= $resultat['date_de_creation'] ?>
            </span>
        </div>
        <a href="./supprimerCompte.php?id=<?= $resultat['id'] ?>" class="btn" title="Modifier ce profil"><i class="fa fa-pen"></i> Supprimmer ce
            compte</a>
        <a href="./definirAdmin.php?id=<?= $resultat['id'] ?>" class="btn" title="Modifier ce profil"><i class="fa fa-pen"></i> Definir ce compte comme un compte administrateur</a>
    </div>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>