{foreach from=$allSeances item=seance}
	{if $seance.type == 'cumul' }
		<!--<tr class="cumul">
			<td colspan="3">{$seance.nomMatiere} - cumul des seances : </td>
			<td colspan="4">
				{if $seance.cumulTP !=0}<span><b>TP:</b> {$seance.cumulTP}</span>{else} {/if}
				{if $seance.cumulCM !=0}<span><b>CM:</b> {$seance.cumulCM}</span>{else} {/if}
				{if $seance.cumulTD !=0}<span><b>TD:</b> {$seance.cumulTD}</span>{else} {/if}
				{if $seance.cumulDS !=0}<span><b>DS:</b> {$seance.cumulDS}</span>{else} {/if}
				{if $seance.cumulADM !=0}<span><b>ADM:</b> {$seance.cumulADM}</span>{else} {/if}
			</td>
		</tr> -->
	{else}
		<tr>
			<td>{$seance.dateSeance}  </td>
			<td>{$seance.nomFormation}</td>
			<td class="{$seance.typeEnsClass}">{$seance.typeEnsName}</td>
			<td>{$seance.nomMatiere}</td>
			<td>{$seance.heureDebut}</td>
			<td>{$seance.heureFin}</td>
			<td>{if $date_actuelle  >= $seance.dateSeanceFormatee } <span class='glyphicon glyphicon-ok-circle'></span><span class="hide">x</span>{else}<span class="hide"></span> {/if}</td>
		</tr>
	{/if}
{/foreach}
