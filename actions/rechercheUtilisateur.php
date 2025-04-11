<?php

require('../../connexion.php');

if (isset($_GET['rechercher'])) {
    $nom = $_GET['nom'];

    $selectionNom = $bdd->prepare("SELECT * FROM `compte` WHERE `nom` LIKE ? OR `prenom` LIKE ? OR `pseudo` LIKE ?;");
    $selectionNom->execute(array('%' . $nom . '%', '%' . $nom . '%', '%' . $nom . '%'));
}
