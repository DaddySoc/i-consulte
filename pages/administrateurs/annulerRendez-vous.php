<?php require('../../actions/annulerRendezVous.php');
if ($_SESSION['admin'] == false) {
    header('Location: ../utilisateurs/acceuil.php');

    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuler rendez-vous</title>
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

</head>

<body>
    <div class="supprimmerCommentaire">
        <form method="post">
            <h1>Voulez-vous Vraiment annuler ce rendez-vous ?</h1>
            <button type="submit" name="annuler" class="btn"><i class="fa fa-check"></i>OUI</button>
            <a href="./rendezVousProche.php" class="btn"><i class="fa fa-x-mark"></i>NON</a>
        </form>
    </div>
    <?php include('../../includes/erreurEcran.php') ?>
</body>

</html>