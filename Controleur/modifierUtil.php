<?php 
include "Modele/bdCreationUtilisateur.php";

$utilisateurAModifier= array($_GET['ID'],$_POST['nomUtil'].".".$_POST['prenomUtil'],
$_POST['mailUtil'],$_POST['nomStructureUtil'],$_POST['adresseStructureUtil'],
$_POST['typeStructureUtil'][0],$_POST['typeUtilisateurUtil'][0],$_POST['telUtil']);

modifierUtilisateur($utilisateurAModifier);

header("Refresh:0.9; url=./?action=acceuil");




?>



