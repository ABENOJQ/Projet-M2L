<!DOCTYPE html>
<?php 

if (!isset($_SESSION)) {
  session_start();
}

include "controleur/controleurPrincipal.php";
//include "controleur/controleurConnexion.php";

if (!isset($_SESSION['posteUtilisateurIdentifié'])){
  $_SESSION['posteUtilisateurIdentifié']=getRoleUtilisateur("");
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valres2</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="css/css-me.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
  </head>
  <body class="bg-orange-200">

  <?php
  $action="";
 
try{

  if (isset($_GET["action"])){
    
    $action = $_GET["action"];
    if($action == "CoDecoR"){
      $Pages=controleurPrincipal("CoDeco");
    }else{
      $Pages=controleurPrincipal($action);
    }
    
}else{
  $Pages="Vue/acceuil.php";
}

}catch (Exception $e) {

  
  
  
}

include "Vue/entete.php";


include $Pages;

 




include "Vue/footer.php";

  ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  </body>
</html>