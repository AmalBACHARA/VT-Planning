<div id="panelFilter">
 <!--<form class="form-horizontal" role="form" onSubmit='return reset({$code})'>-->
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
	    <div class="panel-heading"> 
                <form class="form-horizontal" role="form">
		    <div class="form-group">
			<label for="departementFilter" class="col-md-12">Salles</label>
			    <div class="col-md-12">
				<select name="departementFilter" class="form-control" id="departementFilter" required="" onChange="loadSallesListFilter()">
				    <option value="all" selected>TOUS</option>
                                    {foreach from=$departements item=departement}
					<option value={$departement.codeZoneSalle}>{$departement.nom_zone}</option>
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