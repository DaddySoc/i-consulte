<?php
require('../../actions/securityAction.php');
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
    <title>A propos</title>
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
    <?php include("../../includes/navbarUtilisateur.php") ?>
    <!-- Bouttons pour retourner tout en haut de la page -->
    <div class="retour" name="Retourner en haut">
        <a href="#acceuil" class="effetBtn" class="monter"><i class="fa fa-chevron-up"></i></a>
    </div>
    <div class="section" id="a_propos">
        <h1>Qui sommes nous ?</h1>
        <div class="carte">
            <div class="carte_contenu">
                <p>Nous sommes une communauté de 7 jeunes étudiants 1ère année universitaires qui à pour objectif de rendre accessible le domaine médicales, tous les sectionrmations sur notre site
                    sont totalement gratuit pour l'instant sauf les prises de rendez-vous avec nos partenaires les médecins. </p>
            </div>
            <a class="nous" href="../../res/nous/nous.html" target="blank">
                <div title="En savoir plus" class="carte_contenu">
                    <p>
                        Les 7 membres qui compose notre groupe sont : <br>
                    <table>
                        <tr>
                            <td>ANDRIANAIVO Andry Hasina</td>
                            <td> Numéro 149</td>
                        </tr>
                        <tr>
                            <td>ANDRIANAMBININA Norbertho Victory</td>
                            <td>Numéro 122</td>
                        <tr>

                            <td>RAHERIMANANTENA Fedro Hubert</td>
                            <td>Numéro 145</td>
                        </tr>
                        <tr>
                            <td> RAJAOFERA Tsitohaina Jonathan</td>
                            <td>Numéro 144</td>
                        </tr>
                        <tr>
                            <td>RAMPENOMANANA Faraniaina Tahiana Flavien</td>
                            <td>Numéro 128</td>
                        </tr>
                        <tr>
                            <td> RANDRIANARIVELO Heriniaina</td>
                            <td>Numéro 124</td>
                        </tr>
                        <tr>
                            <td>RANDRIANARISON Nomenjanahary Judicael</td>
                            <td> Numéro 156</td>
                        </tr>
                    </table>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <?php include("../../includes/footer.php") ?>
    <?php include('../../includes/erreurEcran.php') ?>

    <script src="../../js/app.js"></script>

</body>

</html>