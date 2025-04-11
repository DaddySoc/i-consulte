<?php
// Vérifier que l'utilisateur est bien authentifiée
require('../../actions/securityAction.php');
if ($_SESSION['admin'] == true) {
    header('Location: ../administrateurs/admin.php');
    exit();
}
?>
<!-- Structure HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-CONSULTE</title>
    <!-- Pour les icones -->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!-- Navbar -->
    <link rel="stylesheet" href="../../css/navbar.css">
    <!-- Le corps de la page -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Tout les bouttons de la page -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <!-- Annimation de l'affichage des commentaires -->
    <link rel="stylesheet" href="../../swiper-3.0.1/dist/css/swiper.min.css">

    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="stylesheet" href="../../css/footer.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">

</head>

<body>
    <?php include("../../includes/navbarUtilisateur.php") ?>

    <!-- Bouttons pour retourner tout en haut de la page -->
    <div class="retour" name="Retourner en haut">
        <a href="#acceuil" class="effetBtn" class="monter"><i class="fa fa-chevron-up"></i></a>
    </div>
    <div class="apercu">
        <img src="../../res/img/logo.png" alt="logo_de_I-consulte">
        <h2>I-CONSULTE</h2>
        <p class="texte"><span class="grand">"</span>La santé a portée de tous !<span class="grand">"</span></p>
        <a href="#acceuil" class="btn">Commencer</a>
    </div>
    <div class="section acceuil" id="acceuil">
        <div class="images">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img" src="../../res/img/consultation.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="img" src="../../res/img/contact.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="img" src="../../res/img/gain de temps.png">
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <p class="texte">
            Bienvenue cher utilisateurs, nous sommes ravis de vous aider et vous donner le plus de satisfaction possible à l’aide de ce site web pour la santé et le bien-être de tous. Nous sommes ici aussi pour vous donner le plus de données afin de savoir quelle maladie vous souffrez ou bien aussi vous conseillez de prendre des rendez-vous auprès des médecins qui sont nos partenaires.
            Ce site va vous permettre de gagner du temps précieux car elle va vous permettre de connaitre la maladie dont vous souffrez même si ce n’est encore que des possibilités parmi tous les maladies vous pouvez aussi prendre de rendez-vous si la réponse ne vous satisfait pas car votre bien être est le plus important pour nous cher utilisateurs. Vous pouvez des à présent faire ce qui vous est utile dans notre site. Merci !!!

        </p>
    </div>
    <?php include '../../includes/footer.php' ?>
    <?php include('../../includes/erreurEcran.php') ?>

    <!-- Annimation des commentaires -->
    <script src="../../swiper-3.0.1/dist/js/swiper.min.js"></script>
    <!-- La page javaScript du site -->
    <script src="../../js/acceuil.js"></script>
    </script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 30
        });
    </script>
    <!-- <script src="./js/commandeNavbar.js"></script> -->
</body>

</html>