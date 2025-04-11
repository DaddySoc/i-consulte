<?php
require('../../actions/marquerLueAction.php');
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
    <title>Marquer comme lue</title>

    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/bouttons.css">
    <link rel="stylesheet" href="../../css/compatibilite.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>
    <?php
    if (isset($erreurMessage)) {
    ?>
        <div class="erreurLectureRendezVous">
            <h3><?= $erreurMessage ?></h3>
            <a href="./rendezVousUtilisateur.php" class="btn"><span><i class="fa fa-arrow-left"></i></span>Retour</a>
        </div>
    <?php
    }
    ?>
</body>

</html>