<?php

// Connexion à la base de donnée
require('../../connexion.php');

// Requête de recuperation de 5 commentaires des utilisateurs
$recupererCommentaires = $bdd->prepare('SELECT * FROM commentaires ORDER BY id DESC LIMIT 7');
$recupererCommentaires->execute();

// On appelera $commentaires la variables qui va afficher les contenus de ce requête à la page d'acceuil