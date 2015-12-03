<?php /* Smarty version Smarty-3.1.18, created on 2015-12-03 20:56:28
         compiled from "template\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12162565bfc0b5a01e2-99941482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0da2a0e028d1bc00a816b89c727782b518d6e062' => 
    array (
      0 => 'template\\login.tpl',
      1 => 1449150074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12162565bfc0b5a01e2-99941482',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_565bfc0b5dbab8_73910286',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565bfc0b5dbab8_73910286')) {function content_565bfc0b5dbab8_73910286($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Login</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="API/jquery/jquery.js"></script>
		<script src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</head>
	<body>
		<div class="page-header">
			<h2><span class="glyphicon glyphicon-calendar"></span>
				VT AGENDA 
				<small>consultation des emplois du temps faits avec VT</small>
			</h2>
		</div>
		<div id="loginTabContent" class="tab-content container">
			<ul id="myTab" class="nav nav-tabs col-md-4">
				<li class="active"><a href="#teachContainer" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> Enseignant</a></li>
				<li><a href="#studyContainer" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> Etudiant</a></li>
			</ul>

			<!-- div - retour login.js -->
			<div id="retourLoginJs"></div>
			<!-- ./div - retour login.js -->

			<div id="teachContainer" class="tab-pane fade in active">
				<div class="row">
					<div class="col-md-6 col-centered">
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong class="">Planning des enseignants</strong>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" method="post" action="#" id="teachConnect">
									<div class="form-group">
										<label for="inputLoginEnseignement" class="col-sm-2 control-label">Login</label>
										<div class="col-sm-10">
											<input type="text" name="teachLogin" class="form-control" id="inputLoginEnseignement" required="" placeholder="Login">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPasswordEnseignement" class="col-sm-2 control-label">Mdp</label>
										<div class="col-sm-10">
											<input type="password" name="teachPwd" class="form-control" id="inputPasswordEnseignement" placeholder="Mot de passe" required="">
										</div>
									</div>
									<!--
									<div class="form-group last" id="teachButtons">
										<button type="reset" class="btn btn-default btn-md col-md-6">Annuler</button>
										<button type="submit" class="btn btn-primary btn-md col-md-6">Valider</button>
									</div>
									-->
									<div class="form-group" id="teachButtons">
										<div class="btn-group col-xs-12">
											<button type="reset" class="btn btn-default col-xs-6" data-dismiss="modal">Annuler</button>
											<button type="submit" class="btn btn-primary col-xs-6">Valider</button>
										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
								<a role="button" class="btn" data-toggle="modal" data-target="#modifyMdp">Modifier le mot de passe</a>
								<a href="config/aide.pdf" role="button" class="btn">Mode d'emploi</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="studyContainer" class="container tab-pane fade in">
				<div class="row">
					<div class="col-md-6 col-centered">
						<div class="panel panel-default">
							<div class="panel-heading"> <strong class="">Planning des étudiants</strong>

							</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" method="post" action="#" id="studyConnect">
									<div class="form-group">
										<label for="inputLoginEtudiant" class="col-sm-2 control-label">Login</label>
										<div class="col-sm-10">
											<input type="text" name="studyLogin" class="form-control" id="inputLoginEtudiant" required="" placeholder="Login">
										</div>
									</div>

									<div class="form-group" id="studyButtons">
										<div class="btn-group col-xs-12">
											<button type="reset" class="btn btn-default col-xs-6" data-dismiss="modal">Annuler</button>
											<button type="submit" class="btn btn-primary col-xs-6">Valider</button>
										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
								<a href="config/aide.pdf" class="">Mode d'emploi</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- POPUP MODAL DE MODIFICATION DE MOT DE PASSE -->
		<div class="modal fade" id="modifyMdp" tabindex="-1" role="dialog" aria-labelledby="modifyMdpLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div id="modifyMdpRetour"></div>
			<form class="form-horizontal" role="form" method="post" id="modifyMdpForm">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" id="modifyMdpClose"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="modifyMdpLabel">Modification de mot de passe</h4>
				  </div>
				  <div class="modal-body">
					<div class="form-group">
						<label for="inputLogin" class="col-sm-3 control-label">Login</label>
						<div class="col-sm-9">
							<input type="text" name="loginTeach" class="form-control" id="inputLogin" placeholder="Login" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputOldPassword" class="col-sm-3 control-label">Ancien Mdp</label>
						<div class="col-sm-9">
							<input type="text" name="oldMdp" class="form-control" id="inputOldPassword" placeholder="Ancien Mot de passe" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNewPassword1" class="col-sm-3 control-label">Nouveau Mdp</label>
						<div class="col-sm-9">
							<input type="password" name="newMdp1" class="form-control" id="inputNewPassword1" placeholder="Nouveau Mot de passe" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNewPassword2" class="col-sm-3 control-label">Retappez Mdp</label>
						<div class="col-sm-9">
							<input type="password" name="newMdp2" class="form-control" id="inputNewPassword2" placeholder="Nouveau Mot de passe" required="">
						</div>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Valider</button>
				  </div>
				</div>
			</form>
		  </div>
		</div>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html>
<?php }} ?>
