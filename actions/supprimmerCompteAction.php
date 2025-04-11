<?php

// Connexion à la base de donnée
require('../../connexion.php');

// Si la variable id est non vide et passée en parametre dans l'URL, faire
if (isset($_GET['id']) and !empty($_GET['id'])) {

    // Vérifier si le compte existe pour de vrai
    $verifierSiCompteExistant = $bdd->prepare('SELECT id, nom, prenom, `admin` FROM compte WHERE id = ?');
    $verifierSiCompteExistant->execute(array($_GET['id']));

    // Si un compte portant l'id existe, faire
    if ($verifierSiCompteExistant->rowCount() > 0) {

        // Donnée récuperée que l'on affichera sur la page "supprimmerCompte.php" cad nom et prenom du compte
        $informationCompteSupprimmer = $verifierSiCompteExistant->fetch();

        // Si le compte portant l'id dans le paramètre de l'URL n' est pas encore une compte admin, faire
        if ($informationCompteSupprimmer['admin'] == 0) {

            // Si le Boutton oui a été cliquée, faire
            if (isset($_POST['oui'])) {

                // Requête permettant de supprimmer le compte ayant l'id en paramatre
                $suprimmer = $bdd->prepare('DELETE FROM compte WHERE id = ?');
                $suprimmer->execute(array($_GET['id']));

                // Redirection à l'écran paramètre de l'admin
                header('Location: parametreAdmin.php');
            }
        } else {
            $erreur_message = "Le compte de " . $informationCompteSupprimmer['nom'] . ' ' . $informationCompteSupprimmer['prenom'] . " est un compte admin, vous ne pouvez pas la supprimmer";
        }
        // Si le compte indiquée par l'id dans le paramètre n'éxiste pas, afficher dans la page "modifier comme admin.php" le message d'erreur
    } else {
        $erreur_message = "Aucun compte trouvée";
    }
} else {
    // Si l'id est vide ou ne se trouve pas dans le parametre du site
    $erreur_message = "Aucun compte trouvée";
}
