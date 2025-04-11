<?php

require("../../connexion.php");

if (isset($_GET['id']) and !empty($_GET['id'])) {

    // Verification si le rendez-vous ayant cette id est vraiment pas lue 
    $verification = $bdd->prepare("SELECT * FROM rendezvous WHERE id = ? AND vue = ?");
    $verification->execute(array($_GET['id'], 0));

    // S'il n'est pas encore lue, faire
    $resultatVerification = $verification->rowCount();

    if ($resultatVerification == 1) {
        //Si il y a de résultat, faire
        // Requête de modification du rendez-vous
        $marquerCommeLue = $bdd->prepare("UPDATE `rendezvous` SET `vue` = ? WHERE `rendezvous`.`id` = ?");
        header("Location: ../pages/administrateur/rendezVousUtilisateur.php");
        $marquerCommeLue->execute(array(1, $_GET['id']));

        header('Location: ./rendezVousUtilisateur.php');
    } else {
        // Si il n'y a pas de résultat, faire 
        $erreurMessage = "Ce message est déja lue";
    }
} else {
    // Si l'id en parametre est invalide, faire
    $erreurMessage = "Aucune demande de rendez-vous trouvée...";
}
