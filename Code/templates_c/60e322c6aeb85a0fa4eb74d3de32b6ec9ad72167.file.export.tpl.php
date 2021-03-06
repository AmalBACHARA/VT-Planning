<?php /* Smarty version Smarty-3.1.18, created on 2015-12-03 15:41:27
         compiled from "template\export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2211456605497636ed7-27178186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60e322c6aeb85a0fa4eb74d3de32b6ec9ad72167' => 
    array (
      0 => 'template\\export.tpl',
      1 => 1449150072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2211456605497636ed7-27178186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'droits' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5660549787d043_22695079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660549787d043_22695079')) {function content_5660549787d043_22695079($_smarty_tpl) {?><html>
	<head>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
		<meta charset="utf-8">
		<title>VT Agenda - Export</title>
		<link rel="icon" type="image/png" href="img/glyphicons_calendar_title.png"/>
		<link rel="stylesheet" href="css/jquery-ui.css"/>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/export.css"/>
		<script src="API/jquery/jquery.js"></script>
		<script type="text/javascript" src="API/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
		<script type="text/javascript" src="js/customCheck.js"></script>
		<script type="text/javascript" src="API/tableExport/tableExport.js"></script>
		<script type="text/javascript" src="API/tableExport/jquery.base64.js"></script>
		
		<script type="text/javascript" src="API/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="API/jspdf/libs/FileSaver.js/FileSaver.js"></script>
		<script type="text/javascript" src="API/jspdf/libs/Blob.js/Blob.js"></script>
		<!-- <script type="text/javascript" src="./libs/Blob.js/BlobBuilder.js"></script> -->

		<script type="text/javascript" src="API/jspdf/libs/deflate.js"></script>
		<script type="text/javascript" src="API/jspdf/libs/adler32cs.js/adler32cs.js"></script>

		<script type="text/javascript" src="API/jspdf/jspdf.plugin.addimage.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.cell.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.from_html.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.ie_below_9_shim.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.sillysvgrenderer.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.split_text_to_size.js"></script>
		<script type="text/javascript" src="API/jspdf/jspdf.plugin.standard_fonts_metrics.js"></script>		
		
		<script type="text/javascript" src="API/jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="js/datePicker.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('template/index_others.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id="exportTabContent" class="tab-content container">
				<?php if (isset($_smarty_tpl->tpl_vars['droits']->value)&&($_smarty_tpl->tpl_vars['droits']->value['pdf']==1)) {?>
					<ul id="exportTab" class="nav nav-tabs col-md-4">
						<?php if (isset($_smarty_tpl->tpl_vars['droits']->value)&&$_smarty_tpl->tpl_vars['droits']->value['pdf']==1) {?>
							<li class="active"><a href="#pdfContainer" data-toggle="tab"><span class="glyphicon glyphicon-file"></span> PDF</a></li>
						<?php }?>
					</ul>
				<?php }?>

				<div id="pdfContainer" class="tab-pane fade in active">
					<div class="row">
						<div class="col-md-4 col-centered">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong class="">Exporter en PDF</strong>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" role="form" method="post" action="script/exportPDF.php" onSubmit="return true;">
										<div class="form-group">
											<label for="beginDate" class="col-sm-3 control-label">Début</label>
											<div class="col-sm-9">
												<input type="text" id="datePickerDeb">
											</div>
										</div>
										<div class="form-group">
											<label for="endDate" class="col-sm-3 control-label">Fin</label>
											<div class="col-sm-9">
												<input type="text" id="datePickerFin">
											</div>
										</div>
										<script type="text/javascript">
											function loadSeanceList() {
												$("#pdfButton").attr("disabled", "disabled");
												console.log("test");

												var annee_scolaire = $("#annee_scolaire").val();
												var composante = $("#composante").val();
												var prof = $("#prof").val();
												var minDate = $("#datePickerDeb").val();
												var maxDate = $("#datePickerFin").val();
												var url = "index.php?page=heure&annee_scolaire=2013-2014&composante=all&prof=<?php echo $_SESSION['teachCodeProf'];?>
&ajax_pdf&minDate=" + minDate + "&maxDate=" + maxDate + "&" + Math.random();

												$.ajax( {
													type: "GET",
													url: url,
													cache: false,
													dateType: 'html',
													success: function(data) {
														$("#tableContent").html(data);
														$("#dateDebutLabel").text(minDate);
														$("#dateFinLabel").text(maxDate);
														$("#pdfButton").removeAttr("disabled");
													},
													error: function(data) {
														console.log(data);
													}
												} );

												return false;
											}
											
											$("#datePickerDeb").change(loadSeanceList);
											$("#datePickerFin").change(loadSeanceList);

											function downloadPdf() {
												var doc = new jsPDF('l');

												// All units are in the set measurement for the document
												// This can be changed to "pt" (points), "mm" (Default), "cm", "in"
												doc.fromHTML($('#tableContainer').get(0), 15, 15, { 'width': 210 } );
											
												if (typeof doc !== 'undefined') try {
													if (navigator.msSaveBlob) {
														// var string = doc.output('datauristring');
														string = 'http://microsoft.com/thisdoesnotexists';
														console.error('Sorry, we cannot show live PDFs in MSIE')
														} else {
															var string = doc.output('bloburi');
														}
														$('#download-button').attr('href', string);
													} catch(e) {
														alert('Error ' + e);
													}
											}
										</script>

										<div class="form-group last" id="pdfButtons">
										<a id="download-button" class="btn btn-success" download="seances.pdf" onClick ="downloadPdf(); return true;">Exporter</a>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tableContainer" style="text-align:left; position:absolute; top: -10000px;" id="tableSeance"">
				<table >
					<thead>
						<tr>
							<th>Date</th>
							<th>Formation</th>
							<th>Type</th>
							<th>Matière</th>
							<th style="width: 100px;">Heure début</th>
							<th style="width: 100px;">Heure fin</th>
							<th>Effectuée</th>
						</tr>
					</thead>

					<tbody id="tableContent">
					</tbody>
				</table>
			</div>

		<?php echo $_smarty_tpl->getSubTemplate ('template/include/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html>
<?php }} ?>
