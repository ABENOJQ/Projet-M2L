<?php
  include "bdConnexionPDO.php";
 
   //FONCTION RECUPERE DONNEE

    function getDonneeBddPourForm(){
        //creation du dictionnaire recuperent toute les donnees necessaire de la bdd
        $dictDonneeReser = array();
       //creation des tableau pour recuperer les donnees
        $resultatPeriode = array();
        $resultatTypeReserv = array();
        $resultatSalle = array();
        $resultatBat = array();
        $resultatCateg = array();

//recuperation des donnees pour les periodes
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT libelle FROM periode;");
        $req->execute();

       
        $i=0;

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
    
        while ($ligne) {
            
            $resultatPeriode[$i] =$ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $i++;
            
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
      
    
//recuperation des donnees pour le type de la reservation
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select libelle from type_reservation");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultatTypeReserv[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    
//recuperation des donnees pour les salles
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select libelle from salle");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultatSalle[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

 
//recuperation des donnees pour le batiment de la salle
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select id_batiment from localisation");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultatBat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
   

//recuperation des donnees pour la categorie de la salle
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select libelle from categorie_salle");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultatCateg[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    

  //remplir le dictionnaire avec les resultats ci-dessus  
    $dictDonneeReser=array("periode"=> $resultatPeriode, "type_res"=> $resultatTypeReserv,
    "salle"=> $resultatSalle,"batiment"=> $resultatBat, "categorie"=> $resultatCateg);

//renvoie le dictionnaire des donnees recuperer
    return $dictDonneeReser;

    }


    
?>

