<?php include_once "Modele/bdUtilisateurs.php";
include "Modele/bdCreationUtilisateur.php";

$tabUtilisateurs=uneUtilisateurById($_GET['ID']);
?>

<section titre>
    <p class="font-mono text-4xl p-8 font-bold underline uppercase text-center">Modifier un utilisateur</p>
    <!-- typographie / taille texte /  -->
</section>

<section formulaire>

    <form class="max-sm mx-auto w-3/5 px-10 pt-8 pb-10 bg-stone-300 rounded-lg" action="./?action=controleModifierUtil&ID=<?=$_GET['ID']?>"
        method="POST">
        

        <div class="grid grid-cols-1 divide-y">

            <div class="mb-5 grid gap-4 grid-cols-2 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="id_util"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom:</label>

                    <input type="text" name="nomUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nom" value="<?=explode(".",$tabUtilisateurs['nom_utilisateur'])[0]?>" required>

                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="id_util"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom:</label>

                    <input type="text" name="prenomUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="prenom" value="<?=explode(".",$tabUtilisateurs['nom_utilisateur'])[1]?>" required>
                        

                </div>

            </div>

            <div class="mb-5 grid gap-4 grid-cols-2 grid-rows-2">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:
                        :</label>

                    <input type="mail" name="mailUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nom@companie.com" value="<?=$tabUtilisateurs['mail']?>"required>
                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone: 
                        :</label>

                        <input type="tel" name="telUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="063012548795" value="<?=$tabUtilisateurs['n_telephone']?>" required>
                </div>
                <div class="relative z-0 w-full mb-5 group">

                    <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de la structure:
                        :</label>

                        <input type="text" name="nomStructureUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ligue" value="<?=$tabUtilisateurs['structure_nom']?>" required>
                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse de la structure:</label>

                        <input type="text" name="adresseStructureUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="10, rue bertrand 35600 Montauban" value="<?=$tabUtilisateurs['structure_adresse']?>" required>
                </div>


            </div>


            <div class="mb-5 grid gap-4 grid-cols-2 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="salle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de la structure:
                        :</label>

                    <select name="typeStructureUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" disabled >--Choisir une structure--</option> 
                        <?php 
                        $i=0;
                        $tabStructure= lesTypesStructures();
                        
                        While($i<count($tabStructure)){
                            if($tabUtilisateurs['libelleStruc']==$tabStructure[$i]){
                                echo "<option value='".$i." selected'>".$tabStructure[$i]."</option>"; 
                            }else{
                                echo "<option value='".$i."'>".$tabStructure[$i]."</option>";

                            }
                            
                            $i++;
                        }
                        ?>

                    </select>

                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="categorie"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de l'utilisateur :</label>

                    <select name="typeUtilisateurUtil"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option value="" disabled selected>--Choisir un type utilisateur--</option> 
                        <?php 
                 
                        $i=0;
                        $tabUtil= lesTypesUtilisateurs();
                        
                        While($i<count($tabUtil)){
                            if($tabUtilisateurs['libelleUt']==$tabUtil[$i]){
                                echo "<option value='".strtoupper(substr($tabUtil[$i],0,1))."'selected>".$tabUtil[$i]."</option>";
                            }else{
                                echo "<option value='".strtoupper(substr($tabUtil[$i],0,1))."'>".$tabUtil[$i]."</option>";

                            }
                            $i++;
                        }
                        ?>
                    </select>

                </div>

            </div>

        </div>

        <button type="submit"
            class="text-black bg-amber-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer

        </button>

    </form>

</section>
<div class="lg:h-32 h-full"></div> 
