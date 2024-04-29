<?php 
include "Modele/bdCreationUtilisateur.php";


supprimerUtilisateurByID($_GET['ID']);
header("Refresh:0.9; url=./?action=lesUtilisateurs");

?>


