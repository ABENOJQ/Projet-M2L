<?php
include_once "bdConnexionPDO.php";

/**
	 * créer un fichier xml avec les reservation contenu dans la base de donnée
     * 
	 * @return mixed booléen 
	 */

function fichierXML()
{
  $ok=false;
    
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT reservation_id, U.utilisateur_id AS IDUtil,nom_utilisateur,structure_id,structure_nom,structure_adresse,mail,salle_id,dateHeure, periode_id FROM reservation R INNER JOIN utilisateur U ON U.utilisateur_id=R.utilisateur_id;");

        $req->execute();
        $pers=$req->fetch(PDO::FETCH_ASSOC);
        

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    


    $xml= new XMLWriter();
    $xml->openUri("reservation.xml");
    $xml->startDocument('1.0', 'utf-8');
    $xml->startElement('Reservations');
    

    while($pers){
        $xml->startElement('reservation');
        $xml->writeAttribute('id', $pers['reservation_id']);
        $xml->writeElement('utilisateur_id',$pers['IDUtil']);
        $xml->writeElement('nom',explode(".",$pers['nom_utilisateur'])[0]);
        $xml->writeElement('prenom',explode(".",$pers['nom_utilisateur'])[1]);
        $xml->writeElement('structure_id',$pers['structure_id']);
        $xml->writeElement('structure_nom',$pers['structure_nom']);
        $xml->writeElement('structure_adresse',$pers['structure_adresse']);
        $xml->writeElement('mail',$pers['mail']);
        $xml->writeElement('salle_id',$pers['salle_id']);
        $xml->writeElement('date',$pers['dateHeure']);
        $xml->writeElement('periode',$pers['periode_id']);
        $xml->endElement();
        $pers=$req->fetch(PDO::FETCH_ASSOC);
        $ok=true;
      }
    $xml->endElement();
    $xml->endElement();
   


    return $ok;
}

/**
	 * télécharge un fichier sur le navigateur
     * 
     * @param $nom String contenant le nom du fichier à télécharger
     * @param $situation String contenant le chemin d'accès du fichier à faire télécharger
     * @param  $poids int contenant le poid max du fichier
	 */


function forcerTelechargement($nom, $situation, $poids)
{
  header('Content-Type: application/octet-stream');
  header('Content-Length: '. $poids);
  header('Content-disposition: attachment; filename='. $nom);
  header('Pragma: no-cache');
  header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
  header('Expires: 0');
  readfile($situation);
  exit();
}

?>