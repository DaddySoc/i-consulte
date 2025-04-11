<?php
// Ressource requise pour ajouter un nouveau utilisateur du site
require('../../actions/ajouterUtilisateur.php');
?>
<!-- Corps d'un ficher HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/loginInscription.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <form method="POST">
        <!-- Titre de la page -->
        <h1>S'inscrire au site</h1>
        <?php
        // Si il y a une message d'erreur venant de la page 'ajouterUtilisateur.php', on l'affiche
        if (isset($erreurMessage)) {
            echo '<p class="erreur_message">' . $erreurMessage . '</p>';
        }
        ?>
        <!-- Les champs du formulaire d'inscription -->
        <!-- Le nom -->
        <div class="item">
            <?php
            if (isset($nomUtilisateur)) {
            ?>
                <input type="text" name="nom" autocomplete="off" required value="<?= $nomUtilisateur ?>">
            <?php
            } else {

            ?>
                <input type="text" name="nom" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Nom</label>
        </div>
        <!-- Le prenom -->
        <div class="item">
            <?php
            if (isset($prenomUtilisateur)) {
            ?>
                <input type="text" name="prenom" autocomplete="off" required value="<?= $prenomUtilisateur ?>">
            <?php
            } else {

            ?>
                <input type="text" name="prenom" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Prenom</label>
        </div>
        <!-- Le pseudo qu'il va utiliser dans le site -->
        <div class="item">
            <?php
            if (isset($pseudoUtilisateur)) {
            ?>
                <input type="text" name="pseudo" autocomplete="off" required value="<?= $pseudoUtilisateur ?>">
            <?php
            } else {

            ?>
                <input type="text" name="pseudo" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Pseudo</label>
        </div>
        <!-- L'âge -->
        <div class="item">
            <?php
            if (isset($ageUtilisateur)) {
            ?>
                <input type="number" name="age" autocomplete="off" required value="<?= $ageUtilisateur ?>">
            <?php
            } else {

            ?>
                <input type="number" name="age" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Age</label>
        </div>
        <!-- L'email de l'utilisateur -->
        <div class="item">
            <?php
            if (isset($emailUtilisateur)) {
            ?>
                <input type="email" name="email" autocomplete="off" required value="<?= $emailUtilisateur
                                                                                    ?>">
            <?php
            } else {

            ?>
                <input type="email" name="email" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Email</label>
        </div>
        <!-- Son contact (numero de telephone) -->
        <div class=" item">
            <?php
            if (isset($contactUtilisateur)) {
            ?>
                <input type="text" name="contact" autocomplete="off" required value="<?= '+' . $contactUtilisateur ?>">
            <?php
            } else {

            ?>
                <input type="text" name="contact" value="+261" autocomplete="off" required>
            <?php
            }
            ?>
            <label for="Username">Contact</label>
        </div>
        <!-- Le mot de passe de son compte -->
        <div class="item">
            <div class="pass"></div>
            <input type="password" id="password" maxlength="25" required name="mdp" autocomplete="off">
            <label for="password">Mot de passe</label>
        </div>
        <!-- Confirmer le mot de passe saisi -->
        <div class="item">
            <input type="password" maxlength="25" required autocomplete="off" name="confirmer">
            <label>Réecrire le mot de passe</label>
        </div>
        <!-- Boutton pour envoyer le formulaire d'inscription au site -->
        <button type="submit" class="btn" name="ajouter"><span><i class="fa fa-check"></i></span>S'inscrire</button>
        <!-- Boutton pour annuler -->
        <a href="./login.php" class="btn" name="creer"><i class="fa fa-arrow-left"></i> Retour</a>
    </form>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>