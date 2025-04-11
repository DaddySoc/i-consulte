<?php


$base = [
    [2, 5, 3, 0],
    [5, 3, 2, 0],
    [3, 5, 4, 1],
    [2, 4, 4, 2],
    [0, 2, 5, 0],
    [0, 0, 0, 5],
    [2, 4, 2, 5]
];

$lig = 7;
$col = 4;

function afficher($x, $lig, $col): void
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            print(" " . $x[$i][$j] . " ");
        }
        print("<br/>");
    }
}

function lister($x, $col): void
{
    for ($i = 0; $i < $col; $i++) {
        print("  " . $x[$i] . "  ");
    }
}

function soustraire($base, $resultat, $lig, $col): array
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $solution[$i][$j] = $base[$i][$j] - $resultat[$i];
        }
    }
    return $solution;
}

function auCarre($soustraction, $lig, $col): array
{
    for ($i = 0; $i < $lig; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $solution[$i][$j] = $soustraction[$i][$j] * $soustraction[$i][$j];
        }
    }
    return $solution;
}

function sommeValeur($carre, $lig, $col): array
{
    for ($i = 0; $i < $col; $i++) {
        $solution[$i] = 0;
        for ($j = 0; $j < $lig; $j++) {
            $solution[$i] = $solution[$i] + $carre[$j][$i];
        }
    }
    return $solution;
}

function racineValeur($somme, $col): array
{
    $solution = [];
    for ($i = 0; $i < $col; $i++) {
        $solution[$i] = sqrt($somme[$i]);
    }

    return $solution;
}

function rechMin($racine, $col): int
{
    $solution = $racine[0];
    $pos = 0;
    for ($i = 0; $i < $col; $i++) {
        if ($solution > $racine[$i]) {
            $solution = $racine[$i];
            $pos = $i;
        }
    }
    return $pos;
}

function maladie($pos): string
{
    switch ($pos) {
        case 0:
            return "Angine";
            break;
        case 1:
            return "Grippe";
            break;
        case 2:
            return "Rhume";
            break;
        case 3:
            return "Diarrhée";
            break;
        default:
            return "Votre maladie n'est pas réperporiée, veuiller prendre une rendez-vous avec l'un de nos docteurs";
            break;
    }
}


if (isset($_POST['soumettre'])) {


    $mdt = $_POST['maux_de_tete'];
    $mdg = $_POST['maux_de_gorge'];
    $fievre = $_POST['fievre'];
    $temperature = $_POST['temperature'];
    $nez = $_POST['nez'];
    $selleLiquide = $_POST['selleLiquide'];
    $fatigue = $_POST['fatigue'];

    $resultat = [$mdt, $mdg, $fievre, $fievre, $temperature, $nez, $selleLiquide, $fatigue];

    $soustraction = soustraire($base, $resultat, $lig, $col);
    $carre = auCarre($soustraction, $lig, $col);
    $somme = sommeValeur($carre, $lig, $col);
    $racine = racineValeur($somme, $col);
    $min = rechMin($racine, $col);
    $nomMaladie = maladie($min);

    $_SESSION['resultat'] = $nomMaladie;
    $_SESSION['idMaladie'] = $min + 1;
    header("Location: ./resultatConsultation.php");
}
