<!--
div id="panelFilter">
</div>
-->
<div class="container" id="calendarContainer">
	<!-- Début navigation calendar -->
	<div class="page-header" id="groupeFiltre">
		<div class="row">
			<div class="col-sm-6" id="rowFiltreleft">
				<div class="btn-group btn-group-justified" id="filtreToday">
					<div class="btn-group" >
						<button class="btn btn-primary" id="prevButton" data-calendar-nav="prev"> << </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-default" data-calendar-nav="today"> Aujourd'hui </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-primary" id="nextButton" data-calendar-nav="next"> >> </button>
					</div>	
				</div>
			</div>		
			<div class="col-sm-6" id="rowFiltreRight">			
				<div class="btn-group btn-group-justified" id="filtreAnnee">
					<div class="btn-group" >	
						<button class="btn btn-warning" data-calendar-view="year">Année</button>
					</div>
					<div class="btn-group" >		
						<button class="btn btn-warning active" data-calendar-view="month">Mois</button>
					</div>
					<div class="btn-group" >
						<button class="btn btn-warning" data-calendar-view="week">Semaine</button>
					</div>
					<div class="btn-group" >	
						<button class="btn btn-warning" id="vueJour" data-calendar-view="day">Jour</button>
					</div>		
				</div>
			</div>
		</div>
			
		<div class="col-md-6" id="h3MoisAnnee">
			<h3 class=""></h3>
			<h4 class="" id="petitH4"></h4>
			<h4 class="" id="petitH4Bis"></h4>
		</div>
	</div>
	<!-- Fin navigation calendar -->
	
	<!-- Début Calendar -->
	<div class="row">
		<div class="col-md-12">
			<div id="calendar"></div>
		</div>
	</div>
	<!-- Fin Calendar -->
	
	<!-- Debut légende -->
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a id="collapseTitleLegende">Légende des événements</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">   
					<div id="calendarLegende">
						<div class="row">
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleCM"></div>
								<div class="textLegende">Cours</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleTD"></div>
								<div class="textLegende">TD</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleTP"></div>
								<div class="textLegende">TP</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleDS"></div>
								<div class="textLegende">DS</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleTUT"></div>
								<div class="textLegende">Tutorat</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cerclePRO"></div>
								<div class="textLegende">PRO</div>
							</div>
							<div class="col-xs-3 col-md-2">
								<div class="cercleLegende" id="cercleADM"></div>
								<div class="textLegende">Administration</div>
							</div>
						</div>
					</div>   
				</div>
			</div>
		</div>
	</div>
	<!-- Fin légende -->
	<!-- Début Modal -->
	<div class="clearfix"></div>
	<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Event</h3>
				</div>
				<div class="modal-body" style="height: 400px">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fon Modal -->
</div>

<script type="text/javascript" src="API/bootstrap-calendar-master/js/app.js"></script>
<script type="text/javascript" src="js/CalendarResize.js"></script>
<script type="text/javascript" src="js/MobileSwipeCalendar.js"></script>