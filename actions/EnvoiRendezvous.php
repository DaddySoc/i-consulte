<?php

ini_set('display_errors', 0);
error_reporting(E_ALL);

require('../../connexion.php');

$maintenant = date("d-m-Y");

function possible($jour, $mois, $annee, $jourMaintenant, $moisMaintenant, $anneeMaintenant)
{
    if ($annee == $anneeMaintenant) {
        if ($mois == $moisMaintenant) {
            if ($jour > $jourMaintenant) {
                return 1;
            } else return 0;
        } else if ($mois > $moisMaintenant) {
            return 1;
        } else {
            return 0;
        }
    } else {
        if ($annee > $anneeMaintenant) {
            return 1;
        } else {
            return 0;
        }
    }
}

if (isset($_POST['rdv'])) {

    $mail = $_SESSION['email'];
    $contact = $_SESSION['contact'];
    $docteur = $_POST['docteur'];
    $moment = htmlspecialchars($_POST['jour']);
    $temps = htmlspecialchars($_POST['temps']);

    if ($temps === 'matin') {
        $matin = (int)1;
    } else {
        $matin = (int)0;
    }
    $addresse = htmlspecialchars($_POST['addresse']);

    // Verifier si le jours de rendez-vous est déja occupée

    $validationRendezVous = $bdd->prepare("SELECT * FROM rendezvous WHERE ((date = ? AND docteur = ?)AND matin = ?);
    ");
    $validationRendezVous->execute(array($moment, $docteur, $matin));

    $nombreResultat = $validationRendezVous->rowCount();

    // Si le moment choisi n'est pas encore prise, on peut confirmer le rendez-vous
    if ($nombreResultat == '0') {
        // Verification que la date est valide
        $decoupeMaintenant = preg_split('[-]', $maintenant);

        $jour = $decoupeMaintenant[0];
        $mois = $decoupeMaintenant[1];
        $annee = $decoupeMaintenant[2];

        // Date de rendez-vous de l'utilisateur
        $decoupeMoment = preg_split('[-]', $moment);
        $utilisateurAnnee = $decoupeMoment[0];
        $utilisateurMois = $decoupeMoment[1];
        $utilisateurJour = $decoupeMoment[2];

        // Faire en sorte que la date entrée soit a venir
        $valide = possible($utilisateurJour, $utilisateurMois, $utilisateurAnnee, $jour, $mois, $annee);

        if ($valide == 1) {
            // Requête d'enregistrement
            $enregistrement = $bdd->prepare('INSERT INTO rendezvous (id_auteur, pseudo_auteur, docteur, date, addresse, matin)VALUES(?, ?, ?, ?, ?, ?)');
            $enregistrement->execute(array($_SESSION['id'], $_SESSION['pseudo'], $docteur, $moment, $addresse, $matin));
            $_SESSION['succes'] = "Demande de rendez-vous prise en compte";
        } else {
            $_SESSION['erreur'] = "Nous avons rencontrée une erreur dans votre jours de rendez-vous...";
        }
    } else {
        $_SESSION['erreur'] = "Désolé, veuillez trouver un autre temps car celle ci est déja occupée";
    }
}
