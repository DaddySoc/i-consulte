<?php

// La page qui permet a un utilisateur ou un admin de se deconnecter d'une appareil

// Permettre les variables session
session_start();

ini_set('display_errors', 0);
error_reporting(E_ALL);
?>
<!-- Corps d'un ficher HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Les ressources CSS utilisée -->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!-- Pour le corps de la page -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Pour tout les bouttons -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">

</head>

<body>
    <!-- Corps de la page -->
    <div class="deconnexion">
        <span>Voulez- vous vraiment vous déconnecter ? </span>
        <!-- Boutton pour confirmer la déconnexion a l'appareil -->
        <a href="../../actions/deconnexionAction.php" class="btn"><span><i class="fa fa-check"></i></span> Oui</a>
        <?php

        // Si le compte connecté est un compte admin, faire
        if ($_SESSION['admin'] == 1) {
        ?>
            <!-- Boutton pour les admins pour retourner à la page admin -->
            <a href="../administrateurs/admin.php" class="btn"><span><i class="fa fa-xmark"></i></span> Non</a>
        <?php
            // sinon, faire
        } else {
        ?>
            <!-- Boutton pour les utilisateurs pour retourner à la page utilisateur -->
            <a href="../utilisateurs/acceuil.php" class="btn"><span><i class="fa fa-xmark"></i></span> Non</a>
        <?php
        }
        ?>
    </div>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>