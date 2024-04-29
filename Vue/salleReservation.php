<?php include_once(__DIR__ ."/../Controleur/controleurSalleReservation.php");?>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            RESERVATION DES SALLES <a class="underline mx-2"></a>
        </h1>
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Nom de la salle</th>
                        <th data-priority="2">Categorie</th>
                        <th data-priority="3">Batiment</th>
                        <th data-priority="4">Periode</th>
                        <th data-priority="5">Etat de la reservation</th>
                        <th data-priority="6">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation) : ?>
                        <tr>
                            <td><?= $reservation["Nom"] ?></td>
                            <td><?= $reservation["Categorie"] ?></td>
                            <td><?= $reservation["Batiment"] ?></td>
                            <td><?= $reservation["Periode"] ?></td>
                            <td><?= $reservation["Etat"] ?></td>
                            <td><?= $reservation["Date"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($_SESSION['posteUtilisateurIdentifié']=="secretaire"){
        echo '<div class="flex flex-row-reverse">
        
        <div><button class="bg-blue-500 p-2 m-4 rounded hover:bg-blue-800" onclick="window.location.href=\'./?action=GenererPDF\';" >télécharger le fichier des reservations</button>
    </div>
        <div></div>
    

    </div>';
    }?>
    

    
    
    
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true,
                lengthChange: false,
                info: false,
                paging: false,
            }).columns.adjust().responsive.recalc();
        });
    </script>

