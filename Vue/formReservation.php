<?php include("Controleur/controleurFormReservation.php"); ?>

<section titre>
    <p class="font-mono text-4xl p-8 font-bold underline uppercase text-center">formulaire de reservation</p> <!-- typographie / taille texte /  -->
</section>

<section formulaire>

    <form class="max-sm mx-auto w-3/5 px-10 pt-8 pb-10 bg-stone-300 rounded-lg" action="./?action=ActReserv"
        method="POST">

        <div class="grid grid-cols-1 divide-y">

            <div class="mb-5 grid gap-4 grid-cols-2 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="id_util" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de
                        l'utilisateur :</label>

                    <input type="text" name="util"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="prenom.nom" required>

                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <p> </p>

                </div>

            </div>

            <div class="mb-5 grid gap-4 grid-cols-2 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                        :</label>

                    <input type="text" name="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-200 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="annee-mois-jour" required>
                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode
                        :</label>

                    <select name="periode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>

                        <option id="M">Matinee</option>
                        <option id="AM">Apres-Midi</option>
                        <option id="S">Soiree</option>

                        <!--</?php echo lesPeriodes() ; ?>-->

                    </select>

                </div>

            </div>

            <div class="mb-5 grid gap-4 grid-cols-1 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="type_res" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de
                        reservation :</label>

                    <select name="type_res"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>

                        <option id="O">Occasionnel</option>
                        <option id="R">Regulie</option>

                    </select>

                </div>

            </div>

            <div class="mb-5 grid gap-4 grid-cols-3 grid-rows-1">

                <div class="relative z-0 w-full mb-5 group">

                    <label for="salle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salle
                        :</label>

                    <select name="salle"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option id="1">Daum</option>
                        <option id="2">Corbin</option>
                        <option id="3">Baccarat</option>
                        <option id="4">Longwy</option>
                        <option id="5">Multimédia</option>
                        <option id="6">Amphithéâtre</option>
                        <option id="7">Lamour</option>
                        <option id="8">Grüber</option>
                        <option id="9">Majorelle</option>
                        <option id="10">Salle de restauration</option>
                        <option id="11">Galerie</option>
                        <option id="12">Salle informatique</option>
                        <option id="13">Hall d'accueil</option>
                        <option id="14">Gallé</option>

                    </select>

                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="batiment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batiment
                        :</label>

                    <select name="bat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option id="NULL">Non Definit</option>
                        <option id="A">A</option>
                        <option id="A1">A1</option>
                        <option id="D">B</option>
                        <option id="C">C</option>
                        <option id="D">D</option>

                    </select>

                </div>

                <div class="relative z-0 w-full mb-5 group">

                    <label for="categorie"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie :</label>

                    <select name="categorie"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option id="A">Salle amphitheatre</option>
                        <option id="E">Salle avec equipement</option>
                        <option id="R">Salle de reunion</option>

                    </select>

                </div>

            </div>

        </div>

        <button type="submit"
            class="text-black bg-amber-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer

        </button>

    </form>

</section>