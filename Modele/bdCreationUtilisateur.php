<?php
include_once "bdConnexionPDO.php";

/**
	 * récupère les différents type de structure contenu dans la base de donnée
     * 
	 * @return mixed booléen, false, si la requete ne passe pas sinon un tableau 
	 */
function lesTypesStructures()
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT libelle FROM type_structure;");
        
        $req->execute();
        
        $ligne = $req->fetchAll(PDO::FETCH_COLUMN);
        

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
	 * récupère les différents type d'utilisateur contenu dans la base de donnée
     * 
	 * @return mixed booléen, false, si la requete ne passe pas sinon un tableau 
	 */
function lesTypesUtilisateurs()
{
    $ok = "false";
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT libelle FROM type_utilisateur;");
        
        $req->execute();
        
        $ligne = $req->fetchAll(PDO::FETCH_COLUMN, 0);
        

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
	 * récupère l'id du dernier utilisateur contenu dans la base de donnée
     * 
	 * @return mixed booléen, false, si la requete ne passe pas sinon un entier
	 */
function utilisteurDernierID(){
    $ok= false;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("Select MAX(utilisateur_id) from utilisateur");

        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    if (isset($ligne) && $ligne != null) {

        $ok = $ligne;

    }
    return $ok;


}


/**
	 * ajoute un utilisateur
     * 
     * @param $unUtilsateur un tableau contenant l'id, le nom, le mail, le nom de la structure, le mdp, l'adresse de la structure, l'id de la structure, 
     * le type de l'utilisateur et le numero de telephone
     * 
	 * @return mixed booléen 
	 */

function ajouteUtilisateur($unUtilisateur){
    $ok = "false";


    $idUti = intval(utilisteurDernierID()['MAX(utilisateur_id)'])+1;

    $nomUti = $unUtilisateur[0];

    $mailUti = $unUtilisateur[1];

    $structNOM = $unUtilisateur[2];

    $mdpUti = $unUtilisateur[3];

    $structADRESSE = $unUtilisateur[4];

    $structID = $unUtilisateur[5];

    $typeUtiID = $unUtilisateur[6];

    $nTel = $unUtilisateur[7];
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO `utilisateur`(`utilisateur_id`, `nom_utilisateur`, `mail`, `structure_nom`, `motDePasse`, 
        `structure_adresse`, `structure_id`, `type_utilisateur_id`, `n_telephone`) 
        VALUES ( :idUti , :nomUti , :mailUti , :mdpUti , :structNOM , :structADRESSE , :structID , :typeUtiID , :nTel )");
        
        $req->bindParam(":idUti", $idUti, PDO::PARAM_STR);
        $req->bindParam(":nomUti", $nomUti, PDO::PARAM_STR);
        $req->bindParam(":mailUti", $mailUti, PDO::PARAM_STR);
        $req->bindParam(":structNOM", $structNOM, PDO::PARAM_STR);
        $req->bindParam(":mdpUti", $mdpUti, PDO::PARAM_STR);
        $req->bindParam(":structADRESSE", $structADRESSE, PDO::PARAM_STR); 
        $req->bindParam(":structID", $structID, PDO::PARAM_INT);
        $req->bindParam(":typeUtiID", $typeUtiID, PDO::PARAM_STR_CHAR);
        $req->bindParam(":nTel", $nTel, PDO::PARAM_INT);

        $req->execute();
        
        $ok=$req;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

  
    return $ok;


}

/**
	 * supprime un utilisateur
     * 
     * @param $utilisateurID id de l'utilisateur à supprimer
     * 
	 */



function supprimerUtilisateurByID($utilisateurID){
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("DELETE FROM utilisateur WHERE utilisateur_id= :utilID");

        $req->bindValue(":utilID",$utilisateurID,PDO::PARAM_INT);


        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }


}

/**
	 * modifier un utilisateur
     * 
     * @param $unUtilsateur un tableau contenant l'id, le nom, le mail, le nom de la structure, le mdp, l'adresse de la structure, l'id de la structure, 
     * le type de l'utilisateur et le numero de telephone
     * 
	 * @return mixed booléen, false , si cela ne fonctionne pas sinon le nombre de ligne modifier en int
	 */


function modifierUtilisateur($unUtilisateur){
    $ok = "false";


    $idUti = $unUtilisateur[0];

    $nomUti = $unUtilisateur[1];

    $mailUti = $unUtilisateur[2];

    $structNOM = $unUtilisateur[3];

    $structADRESSE = $unUtilisateur[4];

    $structID = $unUtilisateur[5];

    $typeUtiID = $unUtilisateur[6];

    $nTel = $unUtilisateur[7];
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE utilisateur
        SET nom_utilisateur = :nomUti , mail = :mailUti , structure_nom = :structNOM , 
        structure_adresse = :structADRESSE , structure_id = :structID , type_utilisateur_id = :typeUtiID , 
        n_telephone = :nTel 
        WHERE utilisateur_id = :idUti ");
        
        $req->bindParam(":idUti", $idUti, PDO::PARAM_STR);
        $req->bindParam(":nomUti", $nomUti, PDO::PARAM_STR);
        $req->bindParam(":mailUti", $mailUti, PDO::PARAM_STR);
        $req->bindParam(":structNOM", $structNOM, PDO::PARAM_STR);
        $req->bindParam(":structADRESSE", $structADRESSE, PDO::PARAM_STR); 
        $req->bindParam(":structID", $structID, PDO::PARAM_INT);
        $req->bindParam(":typeUtiID", $typeUtiID, PDO::PARAM_STR_CHAR);
        $req->bindParam(":nTel", $nTel, PDO::PARAM_INT);

        $req->execute();
        
        $ok=$req;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

  
    return $ok;







}






?>

