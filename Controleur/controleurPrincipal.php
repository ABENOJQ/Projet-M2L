<?php

/**
	 * récupère la page que l'on a mis en paramètre si l'utilisateur y a accès
     * 
     * @param $action String contenant le nom de la page que l'on veut obtenir
     * 
	 * @return mixed string contenant le nom d'une page 
	 */
function controleurPrincipal($action)
{
    $laPage = "";
    if (isset($_SESSION['posteUtilisateurIdentifié'])) {
        $lesClefPageTab = getTabPageRole($_SESSION['posteUtilisateurIdentifié']);

        $laPage = $lesClefPageTab['acceuil'];


        if (array_key_exists($action, $lesClefPageTab)) {
            $laPage = $lesClefPageTab[$action];
        }
    }

    return $laPage;


}

/**
	 * récupère le role d'un utilisateur
     * 
     * @param $roleSession STRING contenant un role 
     * 
	 * @return mixed STRING contenant un role
	 */
function getRoleUtilisateur($roleSession)
{

    if (isset($roleSession)) {
        switch ($roleSession) {

            case "utilisateur":
                $role = "utilisateur";
                break;

            case "responsable":
                $role = "responsable";
                break;

            case "secretaire":
                $role = "secretaire";
                break;

            case "administrateur":
                $role = "administrateur";
                break;

            default:
                $role = "utilisateur non identifié";
                break;


        }


    } else {
        $role = "utilisateur non identifié";

    }
    return $role;

}

/**
	 * Renvoie un string en fonction de sur quelle bouton on appuie (sur le bouton connecter/deconnecter)
     * 
	 * @return mixed STRING, contenant ce qui sera ecrit sur le bouton 
	 */
function pageDecoReco()
{
    if(isset($_SESSION['posteUtilisateurIdentifié'])){
        $keyBouton = getTabPageRole($_SESSION['posteUtilisateurIdentifié'])['CoDeco'];
        if (strpos($keyBouton, "deconnexion")) {
            return "Déconnectez-vous";
        }else{
            return "Connectez-vous";
        }
    }else{ return "Connectez-vous";}


}

/**
	 * récupère les pages dont le role de l'utilisateur mis en parametre à accès
     * 
     * @param $roleSession STRING contenant un role utilisateur
     * 
	 * @return mixed tableau contenant les salles
	 */
function getTabPageRole($roleSession)
{

    $roleSession = getRoleUtilisateur($roleSession);
    $lesPages = array("acceuil" => "Vue/acceuil.php");


    switch ($roleSession) {
        

        case "utilisateur":
            $lesPages = array(
                "CoDeco" => "Controleur/deconnexion.php",
                "acceuil" => "Vue/acceuil.php",
                "salles" => "Vue/salles.php",
                "NonAffiche" => array("CoDeco")
            );
            break;

        case "responsable":
            $lesPages = array(
                "CoDeco" => "Controleur/deconnexion.php",
                "acceuil" => "Vue/acceuil.php",
                "salles" => "Vue/salles.php",
                "Reservations" => "Vue/salleReservation.php",
                "controleurRes" => "Vue/salleReservation.php",
                "CreerUneReservation" => "Vue/formReservation.php",
                "ActReserv" => "Modele/actFormReservation.php",
                "NonAffiche" => array("CoDeco","controleurRes","ActReserv")
            );
            break;

        case "secretaire":
            $lesPages = array(
                "CoDeco" => "Controleur/deconnexion.php",
                "acceuil" => "Vue/acceuil.php",
                "salles" => "Vue/salles.php",
                "GenererPDF" => "Controleur/lesReservationXML.php",
                "Reservations" => "Vue/salleReservation.php",
                "controleurRes" => "Vue/salleReservation.php",
                "CreerUneReservation" => "Vue/formReservation.php",
                "ActReserv" => "Modele/actFormReservation.php",
                "NonAffiche" => array("CoDeco","GenererPDF","controleurRes","ActReserv")
            );
            break;

        case "administrateur":
            $lesPages = array(
                "CoDeco" => "Controleur/deconnexion.php",
                "acceuil" => "Vue/acceuil.php",
                "salles" => "Vue/salles.php",
                "lesUtilisateurs" => "Vue/utilisateurs.php",
                "unUtilisateur" => "Vue/unUtilisateur.php",
                "creerUnUtilisateur" => "Vue/creerUnUtilisateur.php",
                "addUtil" => "Controleur/ajouteUtilisateur.php",
                "modifierUtil" => "Vue/modifierUtilisateur.php",
                "controleModifierUtil" => "Controleur/modifierUtil.php",
                "supprimerUtil" => "Controleur/supprimerUtilisateur.php",
                "NonAffiche" => array("CoDeco","addUtil","unUtilisateur","modifierUtil","supprimerUtil","controleModifierUtil")
            );
            break;

        case "utilisateur non identifié":
            $lesPages = array(
                "CoDeco" => "Vue/authentification.php",
                "connexion" => "Controleur/controleurConnexion.php",
                "acceuil" => "Vue/acceuil.php",
                "NonAffiche" => array("CoDeco","connexion")
            );
            break;

        default:
            $lesPages = array("Probleme" => "Vue/alerte.php");
            break;


    }

    return $lesPages;

}






















?>