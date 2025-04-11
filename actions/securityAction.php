<?php
session_start();
ini_set('display_errors', 0);
error_reporting(E_ALL);


if (!isset($_SESSION['authentification'])) {
    $_SESSION['message'] = "Vous devez d'abord vous connecter !";
    if ($_SESSION['admin'] == 1) {
        header('Location: ../../admin.php');
    } else {
        header('Location: ../../acceuil.php');
    }
}
