<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VT Calendar - Accueil</title>

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/touch/favicon.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/favicon.png">
        <meta name="msapplication-TileColor" content="#3372DF">

        <!-- Page styles -->
        <link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/login.css"/>
        <link rel="stylesheet" href="css/agendas_ics.css">
        <link rel="stylesheet" href="API/iCheck/skins/flat/blue.css">
        <link rel="stylesheet" href="API/DataTables/css/jquery.dataTables.css">

        <!-- scripts -->
        <script src="API/jquery/jquery.js"></script>
        <script src="API/bootstrap/js/bootstrap.js"></script>
        <script src="js/loadPage.js"></script>
        <script src="API/iCheck/icheck.js"></script>
        <script src="API/DataTables/js/jquery.dataTables.js"></script>

    </head>
    <body>

        {include file='template/include/header.tpl'}
        <div class="container">
        {if isset($loginStudy)}
            <!-- PARTIE ETUDIANT -->
            <!-- faire une redirection vers index.php -->
        {else}
            <!-- PARTIE ENSEIGNANT -->
            <!-- div - btn-group -->
            <div class="btn-group btn-group-justified">
                <a id="form-enseignant" role="button" class="btn btn-default active">Enseignants</a>
                <a id="form-groupe" role="button" class="btn btn-default">Filières</a>
                <a id="form-salle" role="button" class="btn btn-default">Salles</a>
            </div>
            <!-- ./div - btn-group -->

            <!-- form - form-enseignant -->
            <form method="post" action="#" class="form-enseignant">
                <!-- Table-enseigant - Generate by DataTables plugin -->
                <table class="table table-striped table-enseignant">
                    <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-th-list"></span></th>
                        <th class="libelle">Enseignant <span id="plusEnseignant" class="glyphicon glyphicon-chevron-down"></span></th>
                        <th><span class="glyphicon glyphicon-download"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-th="Sélection"></td>
                        <td data-th="Enseignant"></td>
                        <td data-th=""></td>
                    </tr>
                    </tbody>
                </table>
                <!-- ./table -->

                <!-- div - Download all the selected EdT -->
                <div class="button-enseignant center">
                    <button type="submit" class="btn btn-primary btn-lg">Enseignants sélectionnés</button>
                </div>
                <!-- ./div -->
            </form>
            <!-- ./form - form-enseignant -->

        {/if}
</div>
        <script src="js/agendas_ics.js"></script>

        {include file='template/include/footer.tpl'}

    </body>
</html>
