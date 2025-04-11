<?php
// Connexion à la base de donnée
require('../../connexion.php');

// Si l' utilisateur clique sur le boutton prendre rendez-vous, faire
if (isset($_POST['valider'])) {

    // Récupération des données dans le formulaire
    // nl2br() pour que les sauts de lighes soit prise en compte dans l'insertion dans la base de donnée
    // htmlspecialchars pour eviter que l'utilisateur ecrive des requêtes vers notre base de donnée (une faille de sécurité)
    $contenu_message = nl2br(htmlspecialchars($_POST['contenu']));
    $type_message = 'message';
    $temps = date('d/m/Y H:i:s');

    // Requête d'ajout de rendez-vous
    $insererRender_vous = $bdd->prepare(
        'INSERT INTO commentaires (
        id_auteur, pseudo_auteur, contenu, temps
        )VALUES(
            ?, ?, ?, ?)'
    );
    $insererRender_vous->execute(array($_SESSION['id'], $_SESSION['pseudo'], $contenu_message, $temps));

    // Renvoyer une message de succes vers l'utilisateur
    $succesMsg = "Merci d'avoir commentée...";
}
