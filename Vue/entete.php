<nav class="bg-gray-900 z-30">

  <div class=" flex flex-wrap items-center justify-between p-4 ">
    <!--logo +nom -->
    <div class="flex flex-nowrap ">
      <a href="#" class="flex items-center space-x-3 ">
        <img src="image/logoValres.png" class="object-scale-now h-10 w-15" alt="Logo" />
        <span
          class="self-center text-blue-50 font-semibold gray-50 space-nowrap dark:text-gray-50 text-2xl">Valres</span>
      </a>

    </div>
    <!-- fin logo + nom -->

    <div>
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="md:order-1 lg:hidden md:block inline-flex items-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 "
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>

      <div class="hidden w-full md:flex md:w-auto md:order-2 md:rounded md:text-black" id="navbar-sticky">
        <ul
          class="flex flex-col text-white md:text-black font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 lg:bg-black md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <?php

          $lesClefPageTab= array_keys(getTabPageRole($_SESSION['posteUtilisateurIdentifié']));
          $tabPage=getTabPageRole($_SESSION['posteUtilisateurIdentifié']);
          $laPage="";
          $i=0;

          while($i<count($lesClefPageTab)){
            $clefPage=strval($lesClefPageTab[$i]);
            $oktab=in_array( $clefPage,end($tabPage));
            if($clefPage != "NonAffiche" &&  $oktab==false){
              $laPage=$laPage.' <li><a href="./?action='.$clefPage.'" class="lg:block md:hidden text-black lg:text-white md:hover:text-orange-300  md:dark:hover:text-blue-500 md:p-0" aria-current="page">'.$clefPage.'</a></li>';
            }
            $i+=1;

          } 
          echo $laPage;
          ?>
        </ul>
      </div>
    </div>

    
    <div class="hidden lg:block">
    <a href="#" class="flex items-center space-x-3 ">
    <span class="self-center text-xs text-white hover:text-orange-300 space-nowrap dark:text-gray-50 italic">
    <?= $_SESSION['posteUtilisateurIdentifié']; ?>
    </span>
        <img src="image/profilUtilisateur.png" class="object-scale-now h-10 w-10" alt="LogoUtilisateur" />
        
      </a>

    </div>

  </div>
</nav>