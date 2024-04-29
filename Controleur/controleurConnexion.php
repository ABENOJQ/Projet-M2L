<?php

include_once "Modele/bdAuthentification.php";

if (isset($_POST['email']) && isset($_POST['password'])){
    $roleUti = authent(array($_POST['email'], $_POST['password']));

    if (isset($roleUti) && $roleUti != null && $roleUti != "false") {
        $_SESSION['posteUtilisateurIdentifié'] = getRoleUtilisateur($roleUti);
        header("Refresh:0.9; url=./?action=acceuil");
   
    }
}




?>



