<?php
require('../../connexion.php');

// Nombre de rendez-vous pas encore vue
$rdvPasVue = $bdd->prepare("SELECT * FROM rendezvous WHERE vue = ?");
$rdvPasVue->execute(array(0));

$nombreRendezVousPasVu = $rdvPasVue->rowcount();

// Date zujourd'hui
$maintenant = date('d/m/Y');

// decomposition de la date ajourd'hui
$decoupage = preg_split('[/]', $maintenant);
$jour = (int)$decoupage[0];
$mois = (int)$decoupage[1];
$anne = (int)$decoupage[2];

function transform($x): string
{

    if ($x < 10) {
        $x = '0' . $x;
    } else {
        $x = (string)$x;
    }

    return $x;
}

if ($jour <= 7) {

    $j = transform($jour);
    switch ($jour) {
        case -1:
            transform(31);
            break;
        case -2:
            transform(30);
            break;
        case -3:
            transform(29);
            break;
        case -4:
            transform(28);
            break;
        case -5:
            transform(27);
            break;
        case -6:
            transform(26);
            break;
    }
    $mois--;
} else if ($mois <= 0) {
    $anne--;
    $mois = 12;
} else {
    $j =  transform($jour);
    $j1 = transform($jour - 1);
    $j2 = transform($jour - 2);
    $j3 = transform($jour - 3);
    $j4 = transform($jour - 4);
    $j5 = transform($jour - 5);
    $j6 = transform($jour - 6);
    $j7 = transform($jour - 7);
}

$selectionNouveauCompte = $bdd->prepare("SELECT * FROM compte WHERE date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ? OR date_de_creation = ?");
$selectionNouveauCompte->execute(array($j . '/' . $mois . '/' . $anne, $j1 . '/' . $mois . '/' . $anne, $j2 . '/' . $mois . '/' . $anne, $j3 . '/' . $mois . '/' . $anne, $j4 . '/' . $mois . '/' . $anne, $j5 . '/' . $mois . '/' . $anne, $j6 . '/' . $mois . '/' . $anne, $j7 . '/' . $mois . '/' . $anne));

$nouveauCompte = $selectionNouveauCompte->rowCount();


// Selection du nombre total d'utilisateur
$selectionDonnee = $bdd->prepare('SELECT * FROM compte WHERE `admin` = ?');
$selectionDonnee->execute(array(0));

$nombreUtilisateurs = $selectionDonnee->rowCount();

// Selection du nombre des commentaires
$selectionCommentaire = $bdd->prepare("SELECT * FROM commentaires WHERE temps LIKE ? OR temps LIKE ? OR temps LIKE ? OR temps LIKE ? OR temps LIKE ? OR temps LIKE ? OR temps LIKE ? OR temps LIKE ?");
$selectionCommentaire->execute(array($j . '/' . $mois . '/' . $anne . '%', $j1 . '/' . $mois . '/' . $anne . '%', $j2 . '/' . $mois . '/' . $anne . '%', $j3 . '/' . $mois . '/' . $anne . '%', $j4 . '/' . $mois . '/' . $anne . '%', $j5 . '/' . $mois . '/' . $anne . '%', $j6 . '/' . $mois . '/' . $anne . '%', $j7 . '/' . $mois . '/' . $anne . '%'));

$nombreCommentaire = $selectionCommentaire->rowCount();

// Nombre de commantaire cette semaine

// Rendez-vous dans moins de 7 jours
$jp = $jour;
$jp1 = $jour + 1;
$jp2 = $jour + 2;
$jp3 = $jour + 3;
$jp4 = $jour + 4;
$jp5 = $jour + 5;
$jp6 = $jour + 6;
$jp7 = $jour + 7;

function logique($x, $mois, $anne): string
{
    if ($x > 31) {
        switch ($x) {
            case 32:
                return $anne . "-" . $mois + 1 . "-" . "01";
                break;
            case 33:
                return $anne . "-" . $mois + 1 . "-" . "02";
                break;
            case 34:
                return $anne . "-" . $mois + 1 . "-" . "03";
                break;
            case 35:
                return $anne . "-" . $mois + 1 . "-" . "04";
                break;
            case 36:
                return $anne . "-" . $mois + 1 . "-" . "05";
                break;
            case 37:
                return $anne . "-" . $mois + 1 . "-" . "06";
                break;
            case 38:
                return $anne . "-" . $mois + 1 . "-" . "07";
                break;
        }
    } else if ($mois > 12) {
        $mois = 1;
        $anne++;
        $x = 1;
    } else {
        return $anne . '-' . $mois . '-' . $x;
    }
}

$jp = logique($jp, $mois, $anne);
$jp1 = logique($jp1, $mois, $anne);
$jp2 = logique($jp2, $mois, $anne);
$jp3 = logique($jp3, $mois, $anne);
$jp4 = logique($jp4, $mois, $anne);
$jp5 = logique($jp5, $mois, $anne);
$jp6 = logique($jp6, $mois, $anne);
$jp7 = logique($jp7, $mois, $anne);


$selectionRendezVousProche = $bdd->prepare("SELECT * FROM rendezvous WHERE date LIKE ? OR date LIKE ? OR date LIKE ? OR date LIKE ? OR date LIKE ? OR date LIKE ? OR date LIKE ? OR date LIKE ?");
$selectionRendezVousProche->execute(array($jp, $jp1, $jp2, $jp3, $jp4, $jp5, $jp6, $jp7));


$nombreRendezVousProche = $selectionRendezVousProche->rowCount();
