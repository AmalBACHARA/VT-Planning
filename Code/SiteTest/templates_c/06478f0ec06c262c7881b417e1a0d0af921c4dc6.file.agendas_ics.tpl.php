<?php /* Smarty version Smarty-3.1.18, created on 2015-11-18 21:42:31
         compiled from "template\agendas_ics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5091564ce2b7a90bb0-10506426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06478f0ec06c262c7881b417e1a0d0af921c4dc6' => 
    array (
      0 => 'template\\agendas_ics.tpl',
      1 => 1447879324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5091564ce2b7a90bb0-10506426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loginStudy' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_564ce2b7b02058_34952126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564ce2b7b02058_34952126')) {function content_564ce2b7b02058_34952126($_smarty_tpl) {?><html>
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
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="container">
        <?php if (isset($_smarty_tpl->tpl_vars['loginStudy']->value)) {?>
            <!-- PARTIE ETUDIANT -->
            <!-- faire une redirection vers index.php -->
        <?php } else { ?>
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

        <?php }?>
</div>
        <script src="js/agendas_ics.js"></script>

        <?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    </body>
</html>
<?php }} ?>
