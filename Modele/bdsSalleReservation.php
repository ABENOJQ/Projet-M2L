<?php
include "bdConnexionPDO.php";

/**
	 * récupère les reservations des salles
*/
function getlesreservations() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT reservation_id FROM reservation");
        $req->execute();

        $resultat = [];

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $id_reservation = $ligne["reservation_id"];

            $reqs1 = $cnx->prepare("SELECT salle_id FROM reservation WHERE reservation_id = :id_reservation");
            $reqs1->bindParam(':id_reservation', $id_reservation);
            $reqs1->execute();
            
            $result= $reqs1->fetch(PDO::FETCH_ASSOC);
            $id_salle = $result["salle_id"];

            $reqs2 = $cnx->prepare("SELECT libelle FROM salle WHERE salle_id = :id_salle");
            $reqs2->bindParam(':id_salle', $id_salle);
            $reqs2->execute();

            $laSalle = $reqs2->fetch(PDO::FETCH_ASSOC);

            $reqc1 = $cnx->prepare("SELECT catego_salle_id FROM salle WHERE salle_id = :id_salle");
            $reqc1->bindParam(':id_salle', $id_salle);
            $reqc1->execute();
            
            $result= $reqc1->fetch(PDO::FETCH_ASSOC);
            $id_categorie = $result["catego_salle_id"];

            $reqc2 = $cnx->prepare("SELECT libelle FROM salle WHERE catego_salle_id = :id_categorie");
            $reqc2->bindParam(':id_categorie', $id_categorie);
            $reqc2->execute();

            $laCategorie = $reqc2->fetch(PDO::FETCH_ASSOC);

            $reqb = $cnx->prepare("SELECT id_batiment FROM salle WHERE salle_id = :id_salle");
            $reqb->bindParam(':id_salle', $id_salle);
            $reqb->execute();

            $leBatiment = $reqb->fetch(PDO::FETCH_ASSOC);

            $reqp1 = $cnx->prepare("SELECT periode_id FROM reservation WHERE reservation_id = :id_reservation");
            $reqp1->bindParam(':id_reservation', $id_reservation);
            $reqp1->execute();
            
            $result= $reqp1->fetch(PDO::FETCH_ASSOC);
            $id_periode = $result["periode_id"];

            $reqp2 = $cnx->prepare("SELECT libelle FROM periode WHERE periode_id = :id_periode");
            $reqp2->bindParam(':id_periode', $id_periode);
            $reqp2->execute();

            $laPeriode = $reqp2->fetch(PDO::FETCH_ASSOC);

            $reqe1 = $cnx->prepare("SELECT etat_id FROM reservation WHERE reservation_id = :id_reservation");
            $reqe1->bindParam(':id_reservation', $id_reservation);
            $reqe1->execute();
            
            $result= $reqe1->fetch(PDO::FETCH_ASSOC);
            $id_etat = $result["etat_id"];

            $reqe2 = $cnx->prepare("SELECT libelle FROM etat WHERE etat_id = :id_etat");
            $reqe2->bindParam(':id_etat', $id_etat);
            $reqe2->execute();

            $lEtat = $reqe2->fetch(PDO::FETCH_ASSOC);

            $reqd = $cnx->prepare("SELECT dateHeure FROM reservation WHERE reservation_id = :id_reservation");
            $reqd->bindParam(':id_reservation', $id_reservation);
            $reqd->execute();

            $laDate = $reqd->fetch(PDO::FETCH_ASSOC);

            $resultat[] = [
                "Nom" => $laSalle["libelle"],
                "Categorie" => $laCategorie["libelle"],
                "Batiment" => $leBatiment["id_batiment"],
                "Periode" => $laPeriode["libelle"],
                "Etat" => $lEtat["libelle"],
                "Date" => $laDate["dateHeure"]
            ];
        }

        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
}

function getReservations() {
    // Ajoutez votre logique pour récupérer les réservations depuis la base de données
    // Retournez les données nécessaires au contrôleur
    return getlesreservations();
}
?>
