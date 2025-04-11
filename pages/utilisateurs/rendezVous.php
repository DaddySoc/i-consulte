<?php
require('../../actions/securityAction.php');
require('../../actions/EnvoiRendezvous.php');
require('../../actions/verificationDocteur.php');
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
    <title>Rendez-vous</title>
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
    <div class="section rendez_vous" id="rdv">
        <h1>Prendre un rendez-vous</h1>
        <section class="rdv">
            <p class="texte">Vous pouvez prendre rendez-vous avec l'un de nos docteur présenté ci-desous pour vos resoudre vos probleme. Vous choisisser le docteur de votre choix, le momnent du rendez-vous, votre addresse et la date de votre rendez-vous. On s'occupera de vérifier si la date qui vous convient est libre si non, on vous informera a la seconde. IL EST A NOTER QUE VOUS DEVEZ AU MOINS CHOISIR UNE DATE QUI N'EST PAS ENCORE PASSE (DATE FUTUR)</p>
            <p class="texte">Il est a noter que votre rendez-vous ne sera pas prise en compte si l'addresse est invalide.</p>
            <form method="post">
                <div class="msg">
                    <?php
                    if (isset($_SESSION['succes'])) {
                    ?>
                        <p class="succes"><?= $_SESSION['succes'] ?></p>
                    <?php
                        unset($_SESSION['succes']);
                    } else
                if (isset($_SESSION['erreur'])) {
                    ?>
                        <p class="probleme"><?= $_SESSION['erreur'] ?></p>
                    <?php
                        unset($_SESSION['erreur']);
                    }
                    ?>
                </div>
                <?php
                if (isset($docteurChoisit)) {
                ?>
                    <select name="docteur">
                        <option value="doc<?= $docteurChoisit ?>">Docteur <?= $docteurChoisit ?></option>
                    </select>
                <?php
                } else {

                ?>
                    <div class="item">
                        <label>Choisisser le docteur</label>
                        <select name="docteur">
                            <option value="doc1">Docteur RAFIDIMANANTSOA Imahery</option>
                            <option value="doc2">Rakotonindrina Christian</option>
                            <option value="doc3">INFI RASAMIARISOAMALALA Verohanitra</option>
                        </select>
                    </div>
                <?php
                }
                ?>
                <div class="item">
                    <label>Selectionner le moment du rendez-vous</label>
                    <select name="temps">
                        <option value="matin">Matin(8h->11h)</option>
                        <option value="apresMidi">Apres-midi(13h->16h)</option>
                    </select>
                </div>
                <div class="item mail">
                    <input type="text" name="addresse" required>
                    <label class="saisie">Entrer votre addresse</label>
                </div>

                <div class="item">
                    <label>Choisir la date</label>
                    <input type="date" name="jour" required>
                </div>
                <button type="submit" class="btn" name="rdv">Prendre rendez-vous</button>
            </form>
        </section>
    </div>
    <?php include("../../includes/footer.php") ?>
    <?php include('../../includes/erreurEcran.php') ?>

    <script src="../../js/app.js"></script>


</body>

</html>