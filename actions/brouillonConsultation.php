<?php

// use LDAP\Result;

function soustraire($mat, $reponse, $lig, $col): array
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $mat[$i][$j] = $mat[$i][$j] - $reponse[$j];
        }
    }
    return $mat;
}

// Mettre au carrée le tableau
function carre($mat, $lig, $col): array
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $mat[$i][$j] = $mat[$i][$j] * $mat[$i][$j];
        }
    }
    return $mat;
};

// Racine des elements du tableau
function racine($mat, $lig, $col): array
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $mat[$i][$j] = sqrt($mat[$i][$j]);
        }
    }
    return $mat;
};

// Somme du tableau a 2 dimension
function somme($mat, $lig, $col): array
{
    $some = [];
    $tmp = 0;
    for ($i = 0; $i < $col; $i++) {
        for ($j = 0; $j < $lig; $j++) {
            $tmp = $tmp + $mat[$j][$i];
            $some[$i] = $tmp;
        }
        $tmp = 0;
    }
    return $some;
}

// Recherche du minumum
function checkmin($somme, $lig): array
{
    $min = [$somme[1], 1];
    for ($i = 0; $i < $lig; $i++) {
        if ($min[0] > $somme[$i]) {
            $min[0] = $somme[$i];
            $min[1] = $i;
        }
    }
    return $min;
}

function maladie($min): string
{
    // Otrn we case of @ turbo pascal ihany fa en php
    switch ($min[1]) {
        case 0:
            $probleme = 'Allergie';
            break;
        case 1:
            $probleme = 'Grippe';
            break;
        case 2:
            $probleme = 'Rhume';
            break;
        case 3:
            $probleme = 'Diharee';
            break;
        default:
            $probleme = 'Votre maladie n\'est pas répertoriée, veiller contacter un médecin';
    };

    // Renvoyer la resultat
    return $probleme;
}

if (isset($_POST['soumettre'])) {

    // Récuperation du formulaire
    $mdt = (int)$_POST['maux_de_tete'];
    $mdg = (int)$_POST['maux_de_gorge'];
    $fievre = (int)$_POST['fievre'];
    $temperature = (int)$_POST['temperature'];
    $nez = (int)$_POST['nez'];
    $illisible = (int)$_POST['illisible'];
    $fatigue = (int)$_POST['fatigue'];
    $mat = array();

    // Tableau de départ
    $mat = [
        [2, 5, 3, 2, 0, 0, 2],
        [5, 3, 5, 4, 2, 0, 4],
        [3, 2, 4, 4, 5, 0, 2],
        [0, 0, 1, 2, 0, 5, 5]
    ];

    // transformation des données du formulaire en tableau
    $reponse = [$mdt, $mdg, $fievre, $temperature, $nez, $illisible, $fatigue];

    // Coordonnée du matrice de depart
    $lig = 4;
    $col = 7;

    // Calcul (algo nomen' Daddy)

    $mat = soustraire($mat, $reponse, $lig, $col);
    $mat = carre($mat, $lig, $col);
    $mat = racine($mat, $lig, $col);
    $somme = somme($mat, $lig, $col);

    // Rechercher le minimum
    $min = checkmin($somme, 7);

    // Affichage dans la page
    $_SESSION['resultat'] = maladie($min);

    header('LOcation: ./resultatConsultation.php');
}
