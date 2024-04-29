<?php
include_once "bdConnexionPDO.php";

 /**
	 * cherche si l'utilisateur et stocké dans la base de donnée ou non
	 * 
	 * @param $utilisateur tableau contenant l'id et le mot de passe de l'utilisateur
	 * retourne booléen en fonction de si la requete et passer ou non
	 */
function authent($utilisateur)
{
    //valeur retournée
    $ok = "false";

    //id et mdp utilisateur qui essaye de s'authentifier
    $idUti = $utilisateur[0];
   
    $mdpUti = $utilisateur[1];
    
    try {
        //connexion PDO
        $cnx = connexionPDO();

        //requete qui recupere id utilisateur, mot de passe et libelle en fonction de l'id et du mdp mis en paramètre 
        $req = $cnx->prepare("select nom_utilisateur,motDePasse,libelle FROM utilisateur U 
        JOIN type_utilisateur TU ON TU.type_utilisateur_id=U.type_utilisateur_id 
        WHERE mail = :idUti AND motDePasse = :mdpUti");
        
        $req->bindParam(":idUti", $idUti, PDO::PARAM_STR);
        $req->bindParam(":mdpUti", $mdpUti, PDO::PARAM_STR);  

        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    if (isset($ligne) && $ligne != null) {

        $ok = $ligne['libelle'];

    }
    return $ok;
}
?>