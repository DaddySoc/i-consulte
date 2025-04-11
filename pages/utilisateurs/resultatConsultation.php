<?php
require('../../actions/securityAction.php');
require('../../actions/consultationAction.php');
require('../../connexion.php');
if ($_SESSION['admin'] == true) {
    header('Location: ../administrateurs/admin.php');
    exit();
}

$selectionDescription = $bdd->prepare('SELECT * FROM maladies WHERE id = ?');
$selectionDescription->execute(array($_SESSION['idMaladie']));
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat Consultation</title>
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
    <?php include("../../includes/navbarUtilisateur.php");
    ?>
    <div class="section">
        <h1>Résultat du consultation : </h1>
        <?php
        if ($_SESSION['resultat'] == "Votre maladie n'est pas réperporiée, veuiller prendre une rendez-vous avec l'un de nos docteurs") {
        ?>
            <p>Nous ne somme pas en mesure de repondre a votre symptôme, veuiller contacter l'un de nos 3 médecin.</p>
        <?php
        } else {
        ?>
            <p>Après consultation, vous avez peut être la <span class="maladie"><?= $_SESSION['resultat'] ?></span>.</p>
            <?php
            while ($description = $selectionDescription->fetch()) {
            ?>
                <p class="texte"><?= $description['texte'] ?></p>
        <?php
            }
        }
        ?>
        <div class="nosDocteur">
            <div class="docteur">
                <span class="image">
                    <img src="../../res/img/doc1.jpg" alt="">
                </span>
                <div class="informationDocteur">
                    <h4 class="nom">Docteur RAFIDIMANANTSOA Imahery</h4>
                    <h4 class="specialite">Urgentiste(service mobile)</h4>
                    <h4 class="description">Il siege actuellement au poste de docteur à HJRA, avec plus de 10ans d'expérience dans le domaine de la médecine </h4>
                    <a href="./rendezVous.php?numero=1" class="btn">Voir plus</a>
                </div>
            </div>
            <div class="docteur">
                <span class="image">
                    <img src="../../res/img/doc2.jpeg" alt="">
                </span>
                <div class="informationDocteur">
                    <h4 class="nom">Rakotonindrina Christian</h4>
                    <h4 class="specialite">Toxicologie et Urgentiste</h4>
                    <h4 class="description">trés motivé et peut se deplacer à domicile, avec une bonne maîtrise dans la domaine de la médecine </h4>
                    <a href="./rendezVous.php?numero=2" class="btn">Voir plus</a>
                </div>
            </div>
            <div class="docteur">
                <span class="image">
                    <img src="../../res/img/doc3.jpg" alt="">
                </span>
                <div class="informationDocteur">
                    <h4 class="nom">INFI RASAMIARISOAMALALA Verohanitra</span>
                        <h4 class="specialite">Urgentiste</span>
                            <h4 class="description">Une femme dynamique et très adroit dans son métier, elle peut aussi se déplacer à domicile </h4>
                            <a href="./rendezVous.php?numero=3" class="btn">Voir plus</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("../../includes/footer.php") ?>
    <?php include('../../includes/erreurEcran.php') ?>
    <script src="../../js/app.js"></script>

</body>

</html>