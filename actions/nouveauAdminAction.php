<?php

// Connexion à la base de donnée
require('../../connexion.php');

// Si la variable id est non vide et passée en parametre dans l'URL, faire
if (isset($_GET['id']) and !empty($_GET['id'])) {

    // Récuperation de l'id pacée en paramètre
    $idCompteAChanger = $_GET['id'];

    // Vérifier si le compte existe pour de vrai
    $verifierSiCompteExistant = $bdd->prepare('SELECT id, nom, prenom, `admin` FROM compte WHERE id = ?');
    $verifierSiCompteExistant->execute(array($idCompteAChanger));

    // Si un compte portant l'id existe, faire
    if ($verifierSiCompteExistant->rowCount() > 0) {

        // Donnée récuperée que l'on affichera sur la page "modifier comme admin.php" cad nom et prenom du compte
        $informationCompteChanger = $verifierSiCompteExistant->fetch();

        // Si le compte portant l'id dans le paramètre de l'URL n' est pas encore une compte admin, faire
        if ($informationCompteChanger['admin'] == 0) {

            // Si le Boutton oui a été cliquée, faire
            if (isset($_POST['oui'])) {


                // Requête permettant de transformer le compte en question en compte admin
                $definirAdmin = $bdd->prepare('UPDATE `compte` SET `admin` = ? WHERE `compte`.`id` = ?');
                $definirAdmin->execute(array('1', $idCompteAChanger));

                // Redirection à l'écran paramètre de l'admin
                header('Location: ../parametreAdmin.php');
            }
        } else {
            $erreur_message = "Le compte de " . $informationCompteChanger['nom'] . ' ' . $informationCompteChanger['prenom'] . " est déja un compte admin...";
        }
        // Si le compte indiquée par l'id dans le paramètre n'éxiste pas, afficher dans la page "modifier comme admin.php" le message d'erreur
    } else {
        $erreur_message = "Aucun compte trouvée";
    }
} else {
    // Si l'id est vide ou ne se trouve pas dans le parametre du site
    $erreur_message = "Aucun compte trouvée";
}
