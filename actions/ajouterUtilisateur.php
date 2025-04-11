<?php
// Permettre les variables session
session_start();
// connexion à la base de donnée
require('../../connexion.php');

// Quand l'utilisateur appauye sur le boutton ajouter, faire
if (isset($_POST['ajouter'])) {

    // Récupération des 2 champs de mpd dans le formulaire
    $mdpUtilisateur = $_POST['mdp'];
    $confirmerMdp = $_POST['confirmer'];

    // Pour éviter que les utilisateurs malveillants entre des codes html ou requête vers notre base de donnée
    $pseudoUtilisateur = htmlspecialchars($_POST['pseudo']);
    $nomUtilisateur = htmlspecialchars($_POST['nom']);
    $prenomUtilisateur = htmlspecialchars($_POST['prenom']);
    $ageUtilisateur = htmlspecialchars($_POST['age']);
    $emailUtilisateur = htmlspecialchars($_POST['email']);
    $contactUtilisateur = (int)htmlspecialchars($_POST['contact']);
    $date_de_creation = date('d/m/Y');

    // Vérifier si les les deux champs de mot de passe sont le même
    if ($mdpUtilisateur === $confirmerMdp) {

        // si oui, faire
        // Coder le mot de passe avant de n'enregistrer dans la base de donnée 
        $mdpUtilisateur = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);

        // Vérifier d'abord que le nom du nouveau utilisateur soit different des autres déja éxistant
        // Requête de vérification
        $VerifierUtilisateurExistant = $bdd->prepare('SELECT pseudo FROM compte WHERE pseudo = ?');
        $VerifierUtilisateurExistant->execute(array($pseudoUtilisateur));

        // Si le nom éxiste déja, alors
        if ($VerifierUtilisateurExistant->rowCount() > 0) {
            // Mettre les donnée récupérée par la vérification dans le variable resultatsVerification
            $resultatsVerification = $VerifierUtilisateurExistant->fetch();
            // strtoupper() : transformer une chaine de caractère en majuscule
            // Si le nom est déja prise, faire
            if (strtoupper($resultatsVerification['pseudo']) == strtoupper($pseudoUtilisateur)) {
                $erreurMessage = "Pseudo déja éxistant, veuiller en choisir un autre";
            }
            // Si non, faire
        } else {
            if (strlen($contactUtilisateur) == 12) {

                // Réquête d'ajout de l'utilisateur 
                $insererUtilisateur = $bdd->prepare('INSERT INTO compte (pseudo, nom, prenom, age, email, contact, motDePasse, date_de_creation)VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                $insererUtilisateur->execute(array($pseudoUtilisateur, $nomUtilisateur, $prenomUtilisateur, $ageUtilisateur, $emailUtilisateur, '+' . $contactUtilisateur, $mdpUtilisateur, $date_de_creation));

                // Variable session permettant de notifier l'utilisateur que son inscription au site a été validée
                $_SESSION['succes'] = "Opération réussie, connecter vous";
                // Redirection à la page login
                header('Location: login.php');
            } else {
                $erreurMessage = "Champ de contact invalide, veuillez réessayer.";
            }
        }
    } else {
        // Si les deux champs de mot de passe sont differents, afficher
        $erreurMessage = "Vérifier votre mot de passe avant de réessayer";
    }
}
