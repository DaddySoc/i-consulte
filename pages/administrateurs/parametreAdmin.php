<?php
require('../../actions/securityAction.php');
// Pour afficher les comptes existants dans la base de donnée
require('../../actions/parametreAdminAction.php');
require('../../actions/rechercheUtilisateur.php');
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
    <!-- Ressources css requises pour la page -->
    <link href="../../css/all.min.css" rel="stylesheet">
    <link href="../../css/fontawesome.min.css" rel="stylesheet">
    <link href="../../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">
    <link rel="stylesheet" href="../../css/footer.css">

    <link rel="shortcut icon" href="../../res/img/logo.png">


</head>

<body>
    <div class="parametre">
        <h1>Tout les comptes utilisateurs</h1>
        <div class="compte">
            <form method="get" class="recherche">
                <div class="item">
                    <input type="text" name="nom" required>
                    <label>Rechercher un utilisateur</label>
                    <button type="submit" name="rechercher"><span><i class="fa fa-magnifying-glass"></i></span></button>
                </div>
            </form>
            <section class="utilisateurs">
                <?php
                if (!isset($selectionNom)) {

                    // Boucle permettant d'afficher les comptes éxistant dans la bdd
                    while ($comptes_existant = $tout_les_comptes->fetch()) {
                ?>
                        <div class="profil">
                            <div class="contentBx">
                                <div>
                                    <a class="utilisateur" href="./voirProfilUtilisateur.php?id=<?= $comptes_existant['id'] ?>">
                                        <p class="pseudo"><?= $comptes_existant['pseudo'] ?></p>
                                        <p class="nom"><span class="description">NOM :</span> <?= $comptes_existant['nom'] ?></p>
                                        <p class="prenom"><span class="description">PRENOM :</span> <?= $comptes_existant['prenom'] ?></p>
                                        <span class="date">Membre depuis <?= $comptes_existant['date_de_creation'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    while ($resultatRecheche = $selectionNom->fetch()) {
                    ?>
                        <div class="profil">
                            <div class="contentBx">
                                <div>
                                    <a class="utilisateur" href="./voirProfilUtilisateur.php?id=<?= $resultatRecheche['id'] ?>">
                                        <p class="pseudo"><?= $resultatRecheche['pseudo'] ?></p>
                                        <p class="nom"><span class="description">NOM :</span> <?= $resultatRecheche['nom'] ?></p>
                                        <p class="prenom"><span class="description">PRENOM :</span> <?= $resultatRecheche['prenom'] ?></p>
                                        <span class="date">Membre depuis <?= $resultatRecheche['date_de_creation'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <a href="./admin.php" class="btn fixe"><i class="fa fa-arrow-left"></i>Retour</a>
            </section>
        </div>
    </div>
    <?php
    include('../../includes/footer.php')
    ?>
    <div class="erreur">
        <span><i class="fa fa-exclamation-circle"></i></span>
        <span class="text">Désolé, votre smartphone n'est pas compatible pour le site</span>
    </div>

</body>

</html>