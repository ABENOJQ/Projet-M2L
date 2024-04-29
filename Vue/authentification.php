<?php if ($_GET['action'] == "CoDecoR") {
    include "Controleur/controleurConnexion.php";
} ?>

<div class="flex flex-col justify-evenly items-center h-full mt-8 mb-8 ">
    <div class="lg:h-28 h-full"></div>
    <div class="w-full bg-orange-300 border-black rounded-3xl shadow dark:border md:mt-0  sm:max-w-md xl:p-0 ">
        <div class="space-y-8 p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Formulaire de connexion
            </h1>
            <form class="space-y-4 md:space-y-6" method="POST" action="./?action=CoDecoR">
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-MAIL</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nom@companie.com" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MOT DE
                        PASSE</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Se souvenir de moi</label>
                        </div>
                    </div>
                    <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Mot
                        de passe oublié?</a>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    href="./?action=acceuil">CONNEXION</button>


                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Pas de compte?
                <p class="font-sm text-primary-600 hover:underline dark:text-primary-500">contacter votre
                    <b>Administrateur</b>
                </p>
                </p>
            </form>
        </div>
    </div>
    <div class="lg:h-24 h-full"></div>
</div>

