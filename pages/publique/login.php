<!-- La page de connexion au site -->

<?php
// Ressource néccesire pour l'authentification de l'utilisateur ou l'admin
require('../../actions/loginAction.php');
?>
<!-- Corps d'un ficher HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-CONSULTE</title>
    <!-- Les ressources CSS requises pour la page -->
    <!-- Pour les icones -->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!-- Pour la page login -->
    <link rel="stylesheet" href="../../css/loginInscription.css">
    <!-- Pour tout les bouttons -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">

</head>

<body>
    <form method="POST">
        <!-- Titre de la page -->
        <h1>Se connecter</h1>
        <?php
        // S'il y a un erreur dans la page de ressource (loginAction.php), il faut l'afficher
        if (isset($erreurMessage)) {
            echo '<p style="color: red;">' . $erreurMessage . '</p>';
        }
        // S'il y a un message de succès dans la page de ressource (loginAction.php), il faut l'afficher
        if (isset($_SESSION['succes']) && $_SESSION['succes'] != NULL) {
            echo '<p style="color: lightgreen;">' . $_SESSION['succes'] . '</p>';
            $_SESSION['succes'] = NULL;
        }
        if (isset($_SESSION['message'])) echo '<p style="color: orange">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
        ?>
        <!-- Champ pour entrer le pseudo -->
        <div class="username item">
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
            <label for="pseudo">Pseudo</label>
        </div>
        <!-- Champ pour entrer le mdp -->
        <div class="password item">
            <div class="pass">
                <?php
                if (isset($mdpUtilisateur)) {
                ?>
                    <input type="password" id="password" name="mdp" autocomplete="off" required value="<?= $mdpUtilisateur ?>">
                <?php
                } else {

                ?>
                    <input type="password" id="password" name="mdp" autocomplete="off" required>
                <?php
                }
                ?>
                <label for="password">Mot de passe</label>
                <span><i class="fa fa-eye" id="icon"></i></span>
            </div>
            <!-- Icone pour afficher les caractères du mdp -->
        </div>
        <!-- Boutton pour se connecter au site -->
        <button type="submit" class="btn" name="connecter"><i class="fa fa-check"></i>Se connecter</button>
        <!-- Boutton pour les utilisateurs qui n'ont pas de compte lui permettant d'en créer une -->
        <a href="./ajouterUtilisateur.php" class="btn" name="creer"><i class="fa fa-add"></i> Créer un compte</a>
    </form>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
    <script src="../../js/loginInscription.js">
    </script>
</body>

</html