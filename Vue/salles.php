
<div class="flex flex-wrap m-6 justify-evenly">

<?php
include "Modele/bdSalles.php";

$tabSalles= lesSalles();
$i=0;

while($i < count($tabSalles)){
    echo '<div class="flex flex-col p-2  hover:bg-current "><div class="flex justify-center items-center p-6  bg-black"><div><img class="" src="image/salle.jpg"
     alt="aa" /></div><div class="m-4 text-white justidy-center"><p> '.$tabSalles[$i]['libelle'].' </br>'.$tabSalles[$i]['libelleBAT'].'</br> Batiment '.$tabSalles[$i]['batiment'].'</div></div></div>';

$i++;
}


?>
</div> 


