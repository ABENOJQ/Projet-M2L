<?php

include_once (__DIR__ .'/../Modele/bdsSalleReservation.php'); // Inclure votre modèle ici

//$model = new ReservationModel();

// Gérer les actions en fonction des requêtes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si c'est une requête POST, supposez que c'est une tentative d'ajout de réservation
    $data = [
        "Nom" => $_POST['nom'],
        "Categorie" => $_POST['categorie'],
        "Batiment" => $_POST['batiment'],
        "Periode" => $_POST['periode'],
        "Etat" => $_POST['etat'],
        "Date" => $_POST['date']
    ];
   // $model->insertReservation($data);
}

// Afficher les réservations existantes
$reservations = getlesreservations();
include_once (__DIR__ .'/../Vue/salleReservation.php'); // Charge la vue avec les données récupérées
