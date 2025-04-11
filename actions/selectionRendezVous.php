<?php

// connexion a la base de donnée
require('../../connexion.php');

// Requête pour afficher les demandes de rendez-vous cumulée 
$rendezVous = $bdd->prepare("SELECT * FROM rendezvous WHERE vue = ?");
$rendezVous->execute(array(0));

$nombreRendezVous = $rendezVous->rowCount();
