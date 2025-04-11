<?php
// Vérifier que l'admin est authentifiée,avant de lui afficher la page
require('../../actions/securityAction.php');

require('../../actions/statistique.php');

if ($_SESSION['admin'] == false) {
    header('Location: ../utilisateurs/acceuil.php');

    exit();
}
?>
<!-- Corps d'un fichier HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Ressources CSS requise par notre page -->
    <!-- Pour les icônes de la page -->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!-- Pour le navbar -->
    <link rel="stylesheet" href="../../css/navbar.css">
    <!-- Le corps de notre page admin -->
    <link rel="stylesheet" href="../../css/admin.css">
    <!-- Tout les bouttons de la page -->
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">
    <!-- Le navbar de la page admin -->
    <script defer src="../../js/app.js"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <!-- Visible pour les smartphones -->
        <div class="phone"><i class="fa fa-bars"></i></div>
        <!-- Information sur notre site -->
        <div class="icon">
            <!-- Logo du site -->
            <span class="logo"><img src="../../res/img/logo.png" alt=""></span>
            <span class="text">I-CONSULTE</span>
        </div>
        <!-- Les liens cliquables du site -->
        <nav id="navbar">
            <ul class="navigation">
                <li><a class="lien effetBtn active" id="messages" href="#messages">Messages</a></li>
                <li><a class="lien effetBtn" id="apropos" href="./parametreAdmin.php">Paramètres</a></li>
                <li><a class="lien effetBtn" href="../commun/deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
    <!-- Contenu de la page -->
    <div class="container">
        <h1>Historique</h1>
        <div class="statistique">
            <div class="information">
                <span><i class="fa fa-users"></i></span>
                <h3>Nombre total d'utilisateur : <span class="nombreUtilisateur"><?= $nombreUtilisateurs ?></span></h3>
            </div>
            <div class="information">
                <span><i class="fa fa-person"></i></span>
                <h3>Nouveau membre : <span class="nombreUtilisateur"><?= $nouveauCompte ?></span> depuis les 7 derniers jours <a href="./afficherNouveauMembre.php" class="btn">En savoir plus</a></h3>
            </div>
            <div class="information">
                <span><i class="fa fa-home"></i></span>
                <h3 class="rendezVous">Nouveau demande de Rendez-vous accumulée : <span class="nombreUtilisateur"><?= $nombreRendezVousPasVu ?></span> <a class="btn" href="./rendezVousUtilisateur.php">Voir</a></h3>
            </div>
            <div class="information">
                <span><i class="fa fa-comment"></i></span>
                <h3>Nombre de commentaire cette semaine : <span class="nombreUtilisateur"><?= $nombreCommentaire ?></span><a href="../administrateurs/nouveauCommentaires.php" class="btn">Voir</a></h3>
            </div>
            <div class="information">
                <span><i class="fa fa-clock"></i></span>
                <h3>Nombre de rendez-vous dans moins de 7 jours : <span class="nombreUtilisateur"><?= $nombreRendezVousProche ?></span><a href="./rendezVousProche.php" class="btn">Voir</a></h3>
            </div>
        </div>
        <!-- Bouttons pour retourner tout en haut de la page -->
        <div class="retour" name="Retourner en haut">
            <a href="#admin" class="effetBtn" class="monter"><i class="fa fa-chevron-up"></i></a>
        </div>
        <?php
        // Inclure de footer de la page
        include '../../includes/footer.php';
        ?>
    </div>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>
</body>

</html>