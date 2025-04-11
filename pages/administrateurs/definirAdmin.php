<!-- Page spécial pour un admin de transformer un autre utilisateur en admin -->

<?php

require('../../actions/securityAction.php');
// Pour excecuter la requête de changement si un admin veut definir un autre compte comme admin
require('../../actions/nouveauAdminAction.php');
if ($_SESSION['admin'] == false) {
    header('Location: ../utilisateurs/acceuil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>I-CONSULTE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Les ressources css requise par la page -->
    <link href="../../css/all.min.css" rel="stylesheet">
    <link href="../../css/fontawesome.min.css" rel="stylesheet">
    <link href="../../css/admin.css" rel="stylesheet">
    <!-- Pour les bouttons de la page -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <?php
    // Lieu d'affichage des messages d'erreur dans la page "nouveauAdminAction.php"
    // Si une message d'erreur éxiste, l'afficher
    if (isset($erreur_message)) {
        echo '<p class="erreur_message">' . $erreur_message . '</p>';
    ?>
        <!-- Boutton pour annuler l'opération -->
        <a href="./parametreAdmin.php" class="btn"><i class="fa fa-arrow-left"></i>Retour</a>

    <?php
        // S'il n'y a pas de message d'erreur, afficher l' avertissement avant de modifier quoi que se soit
    } else {
    ?>
        <!-- Message d'avertissement avant la modification -->
        <div class="modifier">
            <span>Voulez-vous faire du compte de <span class="erreur_message"><?= strtoupper($informationCompteChanger['nom']) . ' ' . $informationCompteChanger['prenom'] ?>
                </span> un compte admin,
                cette action sera
                irreversible ?</span>
            <form method="POST">
                <!-- Boutton pour confirmer la requête -->
                <input type="submit" class="btn supprimmer" name="oui" value="OUI">
            </form>
            <!-- Boutton pour annuler la requête -->
            <a href="./parametreAdmin.php" class="btn">NON</a>
        </div>
    <?php
    }
    ?>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>