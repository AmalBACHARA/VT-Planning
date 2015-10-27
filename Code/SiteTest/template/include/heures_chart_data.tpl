{
	"cols" : [
		{ "id" : "", "label" : "Mois", "type" : "string" } ,
		{ "id" : "", "label" : "Cumul", "type" : "number" }
	],
	"rows" : [
		{foreach from=$heuresParMois key=mois item=cumul name=data}
		{if $smarty.foreach.data.first}{else},{/if}
		{ "c" : [
			{ "v" : "{$mois}", "f" : "{$cumul.mois}" } ,
			{ "v" : {$cumul.num}, "f" : "{$cumul.str}" }
		] }
		{/foreach}
	]
}
