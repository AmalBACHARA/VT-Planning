{foreach from=$allSeances item=seance}
	{if $seance.type == 'cumul' }
		<tr class="cumul">
			<td></td>
			<td></td>
			<td colspan="5">{$seance.nomMatiere} - cumul des seances : </td>
			<td colspan="3">
				{if $seance.cumulTP !=0}<span><b>TP:</b> {$seance.cumulTP}</span>{else} {/if}
				{if $seance.cumulCM !=0}<span><b>CM:</b> {$seance.cumulCM}</span>{else} {/if}
				{if $seance.cumulTD !=0}<span><b>TD:</b> {$seance.cumulTD}</span>{else} {/if}
				{if $seance.cumulDS !=0}<span><b>DS:</b> {$seance.cumulDS}</span>{else} {/if}
				{if $seance.cumulADM !=0}<span><b>ADM:</b> {$seance.cumulADM}</span>{else} {/if}
			</td>
			<td>{$seance.eqTD}</td>
			<td></td>
		</tr>
	{else}
		<tr>
			<td>{$seance.nomFormation}</td>
			<td>{$seance.codeApogee}</td>
			<td>{$seance.nomMatiere}</td>
			<td>{$seance.dateSeance}  </td>
			<td>{$seance.heureDebut}</td>
			<td>{$seance.heureFin}</td>
			<td>{if $seance.volumeReparti == 0} NON {else} OUI {/if}</td>
			<td>{if $seance.forfaitaire == 0} NON {else} OUI {/if} </td>
			<td class="{$seance.typeEnsClass}">{$seance.typeEnsName}</td>
			<td>{$seance.dureeSeance}</td>
			<td>{$seance.eqTD}</td>
			<td>{if $date_actuelle  >= $seance.dateSeanceFormatee } <span class='glyphicon glyphicon-ok-circle'></span><span class="hide">1</span>{else}<span class="hide">0</span> {/if}</td>
		</tr>
	{/if}
{/foreach}
