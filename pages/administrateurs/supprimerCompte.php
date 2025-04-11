<?php
require('../../actions/securityAction.php');
// Pour excecuter la requête de changement si un admin veut supprimmer un compte utilisateur pour des raison qui peut gener dans le site
require('../../actions/supprimmerCompteAction.php');
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
    <!-- Les ressources css requise par la page -->
    <link href="../../css/all.min.css" rel="stylesheet">
    <link href="../../css/fontawesome.min.css" rel="stylesheet">
    <link href="../../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <?php
    // Lieu d'affichage des messages d'erreur dans la page "supprimmerCompteAction.php"
    // Si une message d'erreur éxiste, l'afficher
    if (isset($erreur_message)) {
        echo '<p class="erreur_message">' . $erreur_message . '</p>';
    ?>

        <a href="./parametreAdmin.php" class="btn"><i class="fa fa-arrow-left"></i>Retour</a>

    <?php
        // S'il n'y a pas de message d'erreur, afficher l' avertissement avant de supprimmer quoi que se soit
    } else {
    ?>
        <!-- Message d'avertissement avant la suppression -->
        <div class="modifier">
            <span>Voulez-vous vraiment supprimmer le compte de <span class="erreur_message"><?= strtoupper($informationCompteSupprimmer['nom']) . ' ' . $informationCompteSupprimmer['prenom'] ?>
                </span> ,
                cette action sera
                irreversible ?</span>
            <form method="POST">
                <!-- Boutton pour confirmer la requête -->
                <button type="submit" name="oui" class="btn supprimmer">OUI</button>
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