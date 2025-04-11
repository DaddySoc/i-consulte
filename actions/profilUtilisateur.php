<?php

require('../../connexion.php');

if (isset($_GET['id']) and !empty($_GET['id'])) {

    $id_profil = $_GET['id'];

    $recupererProfil = $bdd->prepare('SELECT * FROM compte WHERE id = ?');
    $recupererProfil->execute(array($id_profil));

    $resultat = $recupererProfil->fetch();
} else {
    header(('Location: parametreAdmin.php'));
}
