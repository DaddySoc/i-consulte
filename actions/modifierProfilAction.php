<?php

// Se connecter à la base de donnée
require('../../connexion.php');

if (isset($_POST['modifier'])) {
    // Récuperer les données du formulaire de modification
    $nouveauPseudo = htmlspecialchars($_POST['pseudo']);
    $nouveauEmail = htmlspecialchars($_POST['email']);
    $nouveauContact = (int)htmlspecialchars($_POST['contact']);

    if (strlen($nouveauContact) == 12) {

        // Requête de modification sans modifier le mot de passe
        $modifier_bdd = $bdd->prepare('UPDATE `compte` SET `pseudo` = ?, `email` = ?, `contact` = ? WHERE `id` = ?');
        $modifier_bdd->execute(array($nouveauPseudo, $nouveauEmail, '+' . $nouveauContact, $_SESSION['id']));

        // Changement des variables qui permet de passer les vérifications dans le site
        $_SESSION['pseudo'] = $nouveauPseudo;
        $_SESSION['email'] = $nouveauEmail;
        $_SESSION['contact'] = $nouveauContact;

        if ($modifier_bdd) {
            // Redirection à la page profil
            header('Location: profileUtilisateur.php');
        } else {
            $erreurMessage = 'Une erreur s\est produite.';
        }
    } else {
        $erreurMessage = "Contact invalide.";
    }
}
