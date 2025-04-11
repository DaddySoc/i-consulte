<?php

require('../../connexion.php');

$tout_les_comptes = $bdd->prepare('SELECT id, pseudo, nom, prenom, email, contact, age, date_de_creation FROM compte WHERE admin = ?');
$tout_les_comptes->execute(array(0));
