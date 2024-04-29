<?php
include("bdConnexionPDO.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomUtil = null;
    $date = null;
    $periode = null;
    $typeRes = null;
    $salle = null;
    $batiment= null;
    $categorie = null;

    //recuperation des donnees

    if (isset($_POST["util"])) {
        $nomUtil = $_POST["util"];
    } else {
        print "util est vide";
    }

    if (isset($_POST["date"])) {
        $date = $_POST["date"];
    } else {
        print "date est vide";
    }

    if (isset($_POST["periode"])) {
        $periode = $_POST["periode"];
    } else {
        print "periode est vide";
    }

    if (isset($_POST["type_res"])) {
        $typeRes = $_POST["type_res"];
    } else {
        print "type est vide";
    }

    if (isset($_POST["salle"])) {
        $salle = $_POST["salle"];
    } else {
        print "salle est vide";
    }

    if (isset($_POST["bat"])) {
        $batiment = $_POST["bat"];
    } else {
        print "bat est vide";
    }

    if (isset($_POST["categorie"])) {
       // $categorie = $_POST["categorie"];
        $categorie = str_replace(' ', '_', $_POST["categorie"]);
    } else {
        print "categorie est vide";
    }

    //FONCTION ENVOIE DONNEE

    //creation de lid de la reservation
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT MAX(reservation_id) FROM reservation;");
        $req->execute();

        $id_res = $req->fetch(PDO::FETCH_ASSOC);

        $id_res = $id_res['MAX(reservation_id)'] + 1;

    } catch (PDOException $e) {
        print "Erreur !: l'id de la reservation n'a pas pu se generer " . $e->getMessage();
        die();
    }





    //recuperer id de la periode
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT periode_id FROM periode WHERE libelle ='" . $periode . "';");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if (isset($resultat)) {
            $id_periode = $resultat["periode_id"];
            //print $salle.$id_salle.$resultat;
        } else {
            print "erreur periode est null";
        }


    } catch (PDOException $e) {
        print "Erreur !: l'id de la periode n'a pas pu etre trouve" . $e->getMessage();
        die();
    }

    //recuperer id du categorie salle
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT catego_salle_id FROM categorie_salle WHERE libelle ='" . $categorie . "' ;");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if (isset($resultat)) {
            $id_categorie = $resultat["catego_salle_id"];
        } else {
            print "erreur categorie est null";
        }

    } catch (PDOException $e) {
        print "Erreur !: l'id du type de categorie n'a pas pu etre trouve " . $e->getMessage();
        die();
    }

    //recuperer id de la salle
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT salle_id FROM salle WHERE libelle ='" . $salle . "' AND id_batiment ='" . $batiment . "' AND catego_salle_id ='" . $id_categorie . "' ;");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if (isset($resultat)) {
            $id_salle = $resultat["salle_id"];
            //print $salle.$id_salle.$resultat;
        } else {
            print "erreur salle est null";
        }

    } catch (PDOException $e) {
        print "Erreur !: l'id de la salle n'a pas pu etre trouve " . $e->getMessage();
        die();
    }



    //recuperer id du type
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT type_reservation_id FROM type_reservation WHERE libelle ='" . $typeRes . "' ;");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if (isset($resultat)) {
            $id_type = $resultat["type_reservation_id"];
            //print $salle.$id_salle.$resultat;
        } else {
            print "erreur type est null";
        }

    } catch (PDOException $e) {
        print "Erreur !: l'id du type de reservation n'a pas pu etre trouve " . $e->getMessage();
        die();
    }


    //recuperer id du client
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT utilisateur_id FROM utilisateur WHERE nom_utilisateur = '" . $nomUtil . "' ;");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if (isset($resultat)) {
            $id_util = $resultat["utilisateur_id"];
            //print $salle.$id_salle.$resultat;
        } else {
            print "erreur util est null";
        }

    } catch (PDOException $e) {
        print "Erreur !: l'id du client n'a pas pu etre recupere  " . $e->getMessage();
        die();
    }




    // inserer les donnees de la reservation
    try {
        $cnx = connexionPDO();
        //$req = $cnx->prepare("INSERT INTO reservation VALUES $id_res , $date , $id_periode, 'P' , $id_salle, $id_type , $id_util  ;");
        $req = $cnx->prepare("INSERT INTO reservation VALUES (?, ?, ?, 'P', ?, ?, ?);");
        $req->bindParam(1, $id_res);
        $req->bindParam(2, $date);
        $req->bindParam(3, $id_periode);
        $req->bindParam(4, $id_salle);
        $req->bindParam(5, $id_type);
        $req->bindParam(6, $id_util);

        $req->execute();

        //print "reussite!!";

    } catch (PDOException $e) {
        print "Erreur !:  l'insertion des donnees n'a pas fonctionne  " . $e->getMessage();
        die();
    }


}

header("Refresh:0.9; url=./?action=CreerUneReservation");
?>