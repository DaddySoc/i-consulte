<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <?php
    if (isset($_SESSION['authentification'])) {
        if ($_SESSION['admin'] == 1) {
    ?>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/commandeNavbar.js"></script>
    <script src="./js/acceuil.js"></script>
    <?php
        } else {
        ?>
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./js/commandeNavbar.js"></script>
    <script defer src="./js/acceuil.js"></script>

    <?php
        }
    } else {
        ?>
    <link rel="stylesheet" href="./css/login et inscription.css">
    <?php
    }
    ?>

</head>