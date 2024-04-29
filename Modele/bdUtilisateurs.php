<?php
include_once "bdConnexionPDO.php";

/**
	 * récupère tous les utilisateurs
     * 
	 * @return mixed booléen, false , si cela ne fonctionne pas sinon un tableau contenant tous les utilisateurs
	 */
function lesUtilisateurs()
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT utilisateur_id,nom_utilisateur FROM utilisateur;");
        
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
	 * récupère un utilisateur en fonction de son ID
     * 
     * @param $salleID INT contenant l'id d'un utilisateur
     * 
	 * @return mixed booléen, false , si cela ne fonctionne pas sinon un tableau contenant toutes les informations de l'utilisateur
	 */
function uneUtilisateurById($utilisateurID)
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT nom_utilisateur, mail, n_telephone, structure_nom, structure_adresse, TU.libelle AS libelleUt, TS.libelle AS libelleStruc
        FROM utilisateur U
        INNER JOIN type_structure TS ON TS.structure_id = U.structure_id
        INNER JOIN type_utilisateur TU ON TU.type_utilisateur_id=U.type_utilisateur_id
        WHERE U.utilisateur_id = :unutilisateurID ;");
        
        $req->bindParam(":unutilisateurID", $utilisateurID, PDO::PARAM_INT);

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

