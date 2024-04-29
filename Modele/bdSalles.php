<?php
include_once "bdConnexionPDO.php";



/**
	 * recupère la liste de toutes les salles ainsi que leur informations liée de la base de donnée
     * 
	 * @return mixed tableau contenant les salles
	 */

function lesSalles()
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT S.libelle AS libelle,S.id_batiment AS batiment,CS.libelle AS libelleBAT FROM salle S INNER JOIN categorie_salle CS ON S.catego_salle_id = CS.catego_salle_id");
        
        $req->execute();
        
        $ligne = $req->fetchAll();
        

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    if (isset($ligne) && $ligne != null) {

        $ok = $ligne;

    }else{
        echo "fctPAS";
    }
    return $ok;
}

/**
	 * récupère une salle en fonction de son ID
     * 
     * @param $salleID INT contenant l'id d'une salle
     * 
	 * @return mixed booléen, false , si cela ne fonctionne pas sinon un tableau contenant toutes les informations de la salle
	 */


function uneSalleById($salleID)
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT S.libelle,S.id_batiment,CS.libelle FROM salle S INNER JOIN categorie_salle CS ON S.catego_salle_id = CS.catego_salle_id WHERE S.salle_id = :unSalleID ;");
        
        $req->bindParam(":unSalleID", $salleID, PDO::PARAM_INT);

        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    if (isset($ligne) && $ligne != null) {

        $ok = $ligne;

    }else{
        echo "fctPAS";
    }
    return $ok;
}
?>