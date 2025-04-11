<?php
require('../../actions/securityAction.php');
require('../../actions/consultationAction.php');
if ($_SESSION['admin'] == true) {
    header('Location: ../administrateurs/admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/footer.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <?php
    include("../../includes/navbarUtilisateur.php")
    ?>

    <!-- Bouttons pour retourner tout en haut de la page -->
    <div class="retour" name="Retourner en haut">
        <a href="#acceuil" class="effetBtn" class="monter"><i class="fa fa-chevron-up"></i></a>
    </div>
    <div class="section" id="consultation" class="consultation">
        <h1>Consultation docteur</h1>
        <p class="texte">
            Ce page va vous aider à connaître la maladie dont vous souffrez. Vous n’avez qu’à mettre les symptômes que vous avez, si celle-ci n’est pas encore disponibles et vous avez ce message : « Nous ne sommes pas en mesure de répondre à votre symptôme, veuillez contacter l'un de nos 3 médecin. » Vous pouvez aller dans la page « rendez-vous » pour consulter les médecins et prendre des rendez-vous afin de vous faire soigner.
            Nous avons mis que quelques maladies dans cette page donc votre maladie est susceptible de ne pas se situer dedans.
            Nous avons déjà mis quelques symptôme ci-dessous donc nous vous prions de mettre le degré de ces symptômes car c’est une échelle de 0 à 5. Après avoir terminé cliquez sur soumettre.
            Veuillez entrer vos symptômes !!
            Si votre maladie est deja connue comme les blessures, vous pouvez tout de suite consulter un medecin <a href="./rendezVous.php" class="btn">ICI</a>
        </p>
        <form method="post" class="formulaire">
            <h2>Essayer de décrir le mieux possible votre problème</h2>
            <table class="symptomes">
                <tr>
                    <div class="option">
                        <td>
                            <label>Maux de tête : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="maux_de_tete" type="range" max="5" min="0" value="<?= $mdt ?>">
                            <?php
                            } else {
                            ?>
                                <input name="maux_de_tete" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Maux de gorge : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="maux_de_gorge" type="range" max="5" min="0" value="<?= $mdg ?>">
                            <?php
                            } else {
                            ?>
                                <input name="maux_de_gorge" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Fièvre : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="fievre" type="range" max="5" min="0" value="<?= $fievre ?>">
                            <?php
                            } else {
                            ?>
                                <input name="fievre" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Température : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="temperature" type="range" max="5" min="0" value="<?= $temperature ?>">
                            <?php
                            } else {
                            ?>
                                <input name="temperature" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Nez bouchée : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="nez" type="range" max="5" min="0" value="<?= $nez ?>">
                            <?php
                            } else {
                            ?>
                                <input name="nez" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Selle liquide : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="selleLiquide" type="range" max="5" min="0" value="<?= $selleLiquide ?>">
                            <?php
                            } else {
                            ?>
                                <input name="selleLiquide" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <div class="option">
                        <td>
                            <label>Fatigue : </label>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['soumettre'])) {
                            ?>
                                <input name="fatigue" type="range" max="5" min="0" value="<?= $fatigue ?>">
                            <?php
                            } else {
                            ?>
                                <input name="fatigue" type="range" max="5" min="0" value="1">
                            <?php
                            }
                            ?>
                        </td>
                    </div>
                </tr>
                <tr>
                    <td colspan="2"><button class="btn" name="soumettre" type="submit">Soumettre</button></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include("../../includes/footer.php") ?>
    <?php include('../../includes/erreurEcran.php') ?>

    <script src="../../js/app.js"></script>

</body>

</html>