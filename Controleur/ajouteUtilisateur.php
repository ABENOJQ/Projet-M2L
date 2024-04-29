<?php 
include "Modele/bdCreationUtilisateur.php";

$mdpUti="motdepasse";



$utilisateurAAjouter= array($_POST['nomUtil'].".".$_POST['prenomUtil'],
$_POST['mailUtil'],$_POST['nomStructureUtil'],$mdpUti,$_POST['adresseStructureUtil'],
$_POST['typeStructureUtil'][0],$_POST['typeUtilisateurUtil'][0],$_POST['telUtil']);

$ok = ajouteUtilisateur($utilisateurAAjouter);
header("Refresh:0.9; url=./?action=acceuil");

if ($ok=="false"){
    $couleur="bg-red-500";
    $logo='<svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
  </svg>';
    $notif=" la requete à eu une erreur veuillez recommencer";
}else{
    $couleur="bg-green-500";
    $logo='<svg class="h-8 w-8 text-green-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>';
   $notif ="requete réusssie";
}

echo '<div class="flex justify-end pt-2"><div></div><div id="toast-default" class="flex items-center w-full max-w-xs p-5 '.$couleur.' rounded-lg shadow 
dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg ">'.$logo.'</div>
    <div class="ms-3 text-sm text-black font-bold"> '.$notif.' </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div></div>';


?>



