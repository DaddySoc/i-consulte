<?php

require('../../connexion.php');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    // Verification de l'existance de ce rendez-vous
    $verification = $bdd->prepare("SELECT * FROM rendezvous WHERE id = ?");
    $verification->execute(array($_GET['id']));

    $nombreResultat = $verification->rowCount();

    if ($nombreResultat == 1) {
        $suprimmer = $bdd->prepare("DELETE FROM rendezvous WHERE id = ?");
        $suprimmer->execute(array($_GET['id']));

        if ($suprimmer) {
            header('Location: ./rendezVousProche.php');
        } else {
            echo "Une erreur a été rencontrée...";
        }
    } else {
        echo "Rendez-vous non trouvée...";
    }
}
