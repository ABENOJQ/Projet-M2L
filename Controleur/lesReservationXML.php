<?php 
include "Modele/bdReservationXML.php";

fichierXML();

/*$filename ="reservation";
header("Content-Type: text/html/force-download");
header("Content-Disposition: attachment; filename=".$filename.".xml");*/
forcerTelechargement("reservation.xml","C:/wamp64/www/Valres2/reservation.xml", 10000);
header("Refresh:0.9; url=./?action=acceuil");
?>


