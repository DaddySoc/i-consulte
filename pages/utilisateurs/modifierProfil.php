<!-- Page pour que les utilisateur puisse modifier son profile -->
<?php
// Vérifier que l'utilisateur est authentifiée
require('../../actions/securityAction.php');
// Ressource pour pouvoir modifier un compte
require('../../actions/modifierProfilAction.php');
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
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link href="../../css/modifierProfil.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
    </script>
</head>

<body>
    <div class="profile">
        <form method="POST">
            <h2>Modifier votre profil</h2>
            <?php
            if (isset($erreurMessage)) {
                echo '<p class="erreur_message">' . $erreurMessage . '</p>';
            }
            ?>

            <div class="item">
                <input type="text" name="pseudo" required value="<?= $_SESSION['pseudo'] ?>">
                <label for="">Pseudo</label>
            </div>
            <div class="item">
                <input type="email" name="email" required value="<?= $_SESSION['email'] ?>">
                <label for="">E-mail</label>
            </div>
            <div class="item">
                <input type="text" name="contact" required value="+<?= $_SESSION['contact'] ?>">
                <label for="">Contacte</label>
            </div>
            <!-- <div class="afficherMdp">
                <label id="aff_mdp">
                    <input id="checkbox" checked="checked" type="checkbox">
                    Modifier le mot de passe
                </label>
            </div> -->
            <div class="mdp">
            </div>
            <button type="submit" name="modifier" class="btn">
                <i class="fa fa-check"></i>
                Modifier
            </button>
            <a class="btn" href="./profileUtilisateur.php"><i class="fa fa-arrow-left"></i>Annuler</a>
        </form>
    </div>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>