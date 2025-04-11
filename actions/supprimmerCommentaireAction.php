<?php

require('../../connexion.php');

if (isset($_POST['supprimmer'])) {

    if (isset($_GET['id']) and !empty($_GET['id'])) {
        // Verification si le commentaire ayant l'id en parametre existe vraiment
        $verification = $bdd->prepare(("SELECT * FROM commentaires WHERE id = ?"));
        $verification->execute(array($_GET['id']));

        $nombreResultat = $verification->rowCount();

        if ($nombreResultat  == 1) {
            $suppressionCommentaire = $bdd->prepare("DELETE FROM commentaires WHERE id = ?");
            $suppressionCommentaire->execute(array($_GET['id']));

            if ($suppressionCommentaire) {
                header('Location: ./nouveauCommentaires.php');
            }
        } else {
            echo  "Commentaire non trouvée...";
        }
    }
}
