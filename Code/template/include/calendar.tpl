<!--
div id="panelFilter">
</div>
-->

{include file='template/index_others.tpl'}

<div class="col-lg-2 col-sm-2">
    <button class="btn btn-primary" id="monPlanning" type="submit" onClick='reset({$code})'>Mon planning</button>
 <!--</form>-->
    <div class="col-md-12 col-centered">
	<div class="panel panel-default" id="premierGroupeFiltre">
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="groupesFilter" class="col-md-12">Groupes</label>
			    <div class="col-md-12">
				<select name="groupesFilter" class="form-control" id="groupesFilter" required="" onChange="loadGroupesListFilter()">
				    <option value="all" selected>TOUS</option>
                                    {foreach from=$formations item=formation}
                                        <option value={$formation.codeNiveau}>{$formation.nom}</option>
                                    {/foreach}
				</select>
                            </div>
			</div>
                </form>                                     
	    </div>
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="groupesFormationsFilter" class="form-control" id="groupesFormationsFilter" required="" onChange="updateCalendar()">
				<option value="all" selected>TOUS</option>
                                {foreach from=$groupes item=groupe}
                                    <option value={$groupe.codeGroupe}>{$groupe.nom}</option>
				{/foreach}
			    </select>
			</div>
		    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-centered">
	<div class="panel panel-default">
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="profsComposantesFilter" class="col-md-12">Profs</label>
			    <div class="col-md-12">
				<select name="profsComposantesFilter" class="form-control" id="profsComposantesFilter" required="" onChange='loadProfsListFilter({$code})'>
				    <option value="all" selected>TOUS</option>
                                    {foreach from=$composantes item=composante}
					<option value={$composante.codeComposante}>{$composante.nom}</option>
				    {/foreach}
				</select>
                            </div>
			</div>
                </form>                                     
	    </div>
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="profsFilter" class="form-control" id="profsFilter" required="" onChange="updateCalendar()">
				{foreach from=$profs item=prof}
                                    <option value={$prof.codeProf} {if $prof.codeProf == $code}selected{/if}>{$prof.nom} {$prof.prenom}</option>
				{/foreach}
			    </select>
			</div>
		    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-centered">
	<div class="panel panel-default">
	<label for="departementFilter" class="col-md-12">Salles</label>
	    
              
	    <div class="panel-body">
		<form class="form-horizontal" role="form">
		    <div class="form-group">
			<div class="col-md-12">
			    <select name="salleFilter" class="form-control" id="salleFilter" required="" onChange="updateCalendar()">
				<option value="all" selected>TOUS</option>
                                {foreach from=$salles item=salle}
                                    <option value={$salle.codeSalle}>{$salle.nom}</option>
				{/foreach}
			    </select>
			</div>
		    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" id="calendarContainer">
	<!-- Début navigation calendar -->
	<div id="content" class="col-lg-10 col-sm-10">
	<div class="page-header" id="groupeFiltre">
		<div class="row">
			<div class="col-sm-6" id="rowFiltreleft">
				<div class="btn-group btn-group-justified" id="filtreToday">
					<div class="btn-group" >
						<button class="btn btn-default" id="prevButton" data-calendar-nav="prev"> << </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-default" data-calendar-nav="today"> Aujourd'hui </button>
					</div>	
					<div class="btn-group" >	
						<button class="btn btn-default" id="nextButton" data-calendar-nav="next"> >> </button>
					</div>	
				</div>
			</div>		
			<div class="col-sm-6" id="rowFiltreRight">			
				<div class="btn-group btn-group-justified" id="filtreAnnee">
					<div class="btn-group" >	
						<button class="btn btn-default" data-calendar-view="year">Année</button>
					</div>
					<div class="btn-group" >		
						<button class="btn btn-default active" data-calendar-view="month">Mois</button>
					</div>
					<div class="btn-group" >
						<button class="btn btn-default" data-calendar-view="week">Semaine</button>
					</div>
					<div class="btn-group" >	
						<button class="btn btn-default" id="vueJour" data-calendar-view="day">Jour</button>
					</div>		
				</div>
			</div>
		</div>
			
		<div class="col-md-6" id="h3MoisAnnee">
			<h3 class=""></h3>
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
<script>
</script>
<script type="text/javascript" src="API/bootstrap-calendar-master/js/app.js"></script>
<script type="text/javascript" src="js/CalendarResize.js"></script>
<script type="text/javascript" src="js/MobileSwipeCalendar.js"></script>