<?php 

include("Modele/bdFormReservation.php");

function lesPeriodes(){
   //$test="<option>"."pou5"."</option>";
   $resultat="";
  //foreach($a AS array_key($dictDonneeReserv)){
   $dictDonneeReserv=getDonneeBddPourForm() ;
      //  if ($a = "periode"){
   $periode= $dictDonneeReserv["periode"];
    //$periode=[1,2,3];

    for($i=0; count($periode)>$i; $i++){
        $var=$periode[$i];
        $resultat= $resultat."<option>".$var."</option>"." ";
   }

       // }
   
  // }

    return $resultat;
}

function lesTypesDeReservation(){

}

function lesSalles(){

}

function lesBatiments(){

}

function lesCategories(){

}


?>