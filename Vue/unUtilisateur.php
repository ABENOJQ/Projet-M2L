<?php
include "Modele/bdUtilisateurs.php";

$util = uneUtilisateurById($_GET['ID']);

?>
<div class="flex flex-row justify-between  p-4 bg-gray-200 m-4">
    <div class="flex flex-col">
        <div>
            <h1> </h1>
        </div>
        <div>
            <label>Nom utilisateur:</label>
            <p><?= "- " . $util['nom_utilisateur'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>mail:</label>
            <p><?= "- " . $util['mail'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>Numéros de téléphone:</label>
            <p><?= "- +" . $util['n_telephone'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>Nom de la structure de l'utilisateur :</label>
            <p><?= "- " . $util['structure_nom'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>adresse de la structure de l'utilisateur:</label>
            <p><?= "- " . $util['structure_adresse'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>type de l'utilisateur:</label>
            <p><?= "- " . $util['libelleUt'] ?></p>
            <p></br></p>
        </div>
        <div>
            <label>type de structure de l'utilisateur:</label>
            <p><?= "- " . $util['libelleStruc'] ?></p>
            <p></br></p>
        </div>

    </div>
    <div class="flex flex-col-reverse" >
    <div>
        <button class="bg-red-600 mb-1 p-4 text-white font-bold rounded-full hover:bg-red-900" onclick="window.location.href = './?action=supprimerUtil&ID=<?=$_GET['ID']?>';">Supprimer</button>
        </div>
        <div><p> </p></div>
        <div>
        <button class="bg-orange-500 ml-1 mb-4 p-4 text-white font-bold rounded-full hover:bg-orange-700" onclick="window.location.href = './?action=modifierUtil&ID=<?=$_GET['ID']?>';">Modifier</button>
        </div>
        

    </div>


</div>