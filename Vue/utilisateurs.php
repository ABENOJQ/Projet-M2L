<div class="m-6">
    <center><p class="text-2xl font-bold"><u>LES UTILISATEURS</u></p></center>
</br>
    <?php
    include "Modele/bdUtilisateurs.php";

    $tabUtilisateurs = lesUtilisateurs();
    $i = 0;
    
    while ($i < count($tabUtilisateurs)) {

        echo '<button onclick="window.location.href=\'./?action=unUtilisateur&ID='.$tabUtilisateurs[$i][0].'\';" name="'.$tabUtilisateurs[$i][0].'"class=" mt-2 mb-2 mr-8 ml-8 bg-black  hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full ">'.$tabUtilisateurs[$i][1].'</button>';
        $i++;
    }

    ?>
<div>