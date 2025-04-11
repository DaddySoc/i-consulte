<?php
session_start();
// Connexion à la base de donnée
require('../../connexion.php');

// Attendre que l'utilisateur appuye sur le boutton se conncter
if (isset($_POST['connecter'])) {

    // Récuperation des données du formulaire
    $pseudoUtilisateur = htmlspecialchars($_POST['pseudo']);
    $mdpUtilisateur = htmlspecialchars($_POST['mdp']);

    // Requête de vérification dans la base de donnée
    $verifierNomUtilisateur = $bdd->prepare('SELECT * FROM compte WHERE pseudo = ?');
    $verifierNomUtilisateur->execute(array($pseudoUtilisateur));

    // Si la requête a rapporté de réponse, faire
    if ($verifierNomUtilisateur->rowCount() > 0) {

        // Mettre les données récupérée la variable informationUtilisateur
        $informationUtilisateur = $verifierNomUtilisateur->fetch();

        // Vérifier si le mot de passe est correcte
        if (password_verify($mdpUtilisateur, $informationUtilisateur['motDePasse'])) {

            // si oui, faire
            // Des variables permettant de passer les contrôles dans les pages internes du site
            $_SESSION['authentification'] = true;
            $_SESSION['id'] = $informationUtilisateur['id'];
            $_SESSION['pseudo'] = $informationUtilisateur['pseudo'];
            $_SESSION['nom'] = $informationUtilisateur['nom'];
            $_SESSION['prenom'] = $informationUtilisateur['prenom'];
            $_SESSION['age'] = $informationUtilisateur['age'];
            $_SESSION['email'] = $informationUtilisateur['email'];
            $_SESSION['contact'] = $informationUtilisateur['contact'];
            $_SESSION['admin'] = $informationUtilisateur['admin'];
            $_SESSION['date_de_creation'] = $informationUtilisateur['date_de_creation'];

            // Si le compte est un  compte admin
            if ($informationUtilisateur['admin'] == 1) {
                // Si oui, redirection vers la page des admins
                header('Location: ../administrateurs/admin.php');
            } else {

                // Si non, redirection à l'écran d'acceuil
                header('Location: ../utilisateurs/acceuil.php');
            }
        } else {
            // si le mot de passe n'est pas correcte, afficher
            $erreurMessage = "Mot de passe érronée";
        }
    } else {

        // Si le nom d'utilisateur n'zst pas correcte, afficher
        $erreurMessage = "Indentifiant érronée";
    }
}
