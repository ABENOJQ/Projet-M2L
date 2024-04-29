<?php 

if (!isset($_SESSION)) {
    session_start();
}


//suppression de cookie de Session
session_unset();

//suppression de la session
session_destroy();

header("Refresh:0.9; url=./?action=acceuil");

?>