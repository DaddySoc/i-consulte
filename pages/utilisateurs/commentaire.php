<?php
require('../../actions/securityAction.php');
// Récuperer les commentaires de 5 ultilisateurs
require('../../actions/recupererCommentaires.php');
// Requis si l'utilisateur veut envoyer un commentaire
require('../../actions/commentaireAction.php');
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
    <title>Avis des autres utilisateurs</title>
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../swiper-3.0.1/dist/css/swiper.min.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
</head>

<body>
    <?php include("../../includes/navbarUtilisateur.php") ?>

    <!-- Bouttons pour retourner tout en haut de la page -->
    <div class="retour" name="Retourner en haut">
        <a href="#acceuil" class="effetBtn" class="monter"><i class="fa fa-chevron-up"></i></a>
    </div>
    <div class="section contact" id="contact">
        <h1>Envoyer un commentaire</h1>
        <p class="texte">
            Pour votre bien être nous avons conçues ce page pour avoir des avis ou des conseils pour nous ou bien aussi des messages que vous voulez adressez aux autres utilisateurs qui visitent ce page au même titre que vous. Que ce soit des encouragements, des prières ou bien des conseils pour la santé, …
            Veuillez ne pas mettre des choses inappropriés car vous pouvez être banni de notre page.

        </p>
        <h3>Ce que dise les utilisateurs</h3>
        <!-- Affiicher 7 commentaires des utilisateurs -->
        <section id="testimonials" class="testimonials">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    while ($commentaires = $recupererCommentaires->fetch()) {
                    ?>
                        <div class="swiper-slide">
                            <h2><?= $commentaires['pseudo_auteur'] ?></h2>
                            <span><?= $commentaires['contenu'] ?></span>
                        </div>
                    <?php

                    }
                    ?>
                </div>
                <!-- Bouttons en bas pour marquer les commentaires -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Envoyer un commentaires -->
            <form method="POST">
                <?php
                if (isset($succesMsg)) {
                    echo '<p style="color: lightgreen">' . $succesMsg . '</p>';
                }
                ?>
                <div class="item">
                    <textarea required name="contenu" cols="30" rows="10"></textarea>
                    <label>Votre avis...</label>
                </div>
                <button type="submit" name="valider" class="btn effetBtn">Envoyer</button>
            </form>
        </section>
    </div>

    <?php include("../../includes/footer.php") ?>
    <?php include('../../includes/erreurEcran.php') ?>


    <script src="../../swiper-3.0.1/dist/js/swiper.min.js"></script>
    <script src="../../js/acceuil.js"></script>
    <script>
        // Initialisation des animation des commentaires

        var swiper = new Swiper(".swiper-container", {
            pagination: ".swiper-pagination",
            paginationClickable: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: 3500,
            autoplayDisableOnInteraction: false,
        });
    </script>
</body>

</html>