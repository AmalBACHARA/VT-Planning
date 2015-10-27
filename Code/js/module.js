function loadProfsList()
{
    var codeComposante = $('#departements :selected').val();

    addProfsToOptions = function(profs)
	{
        $('#profs').empty();
        if (profs.length) {
            for (i = 0; i < profs.length; i++)
			{
                profInfos = profs[i].split("#");
                $('#profs').append("<option value=" + profInfos[0] + ">" + profInfos[1] + " " + profInfos[2] + "</option>");
            }
            loadModuleList();
        }
    };

    $.ajax({
        type: "POST",
        url: "./script/getTeacherByComposante.php",
        data: {
            code: codeComposante
        },
        cache: false,
        dateType: 'text',
        success: function(data)
		{
            addProfsToOptions(data.split("~"));
        },
        error: function(data)
		{
            alert(data);
        }
    });
}

function loadModuleList()
{
    var codeProf = $('#profs :selected').val();

    addModulesToOptions = function(module)
	{
        $('#module').empty();
        if (module.length)
		{
            for (i = 0; i < module.length; i++)
			{
                $('#module').append("<option>" + module[i] + "</option>");
            }
            loadSeanceList();
        }
    };

    $.ajax({
        type: "POST",
        url: "./script/getTeachModule.php",
        data: { code: codeProf },
        cache: false,
        dateType: 'text',
        success: function(data)
		{
            addModulesToOptions(data.split("~"));
        },
        error: function(data)
		{
            alert(data);
        }
    });
}

function buildSeanceTable(id, seance)
{
	if (seance.length)
	{
		var ligne = "<tr>";
		for (i = 0; i < seance.length; i++)
		{
			var seanceInfo = seance[i].split("#");
			for (j = 0; j < seanceInfo.length; j++)
			{
				ligne += "<td ";
				if (j == 2)
				{
					if (seanceInfo[j] == "CM")
					{
						ligne += "class='info'";
					}
					else if (seanceInfo[j] == "TD")
					{
						ligne += "class='success'";
					}
					else if (seanceInfo[j] == "TP")
					{
						ligne += "class='warning'";
					}
					else 
					{
						ligne += "class='danger'";
					}
				}

				ligne += ">";
				if (j == (seanceInfo.length - 1))
				{
					if (seanceInfo[j] == 1)
					{
						ligne += "<span class='glyphicon glyphicon-ok-circle'></span><span class='hide'>1</span>";
					}
					else ligne+="<span class='hide'>0</span>";
				}
				else
				{
					ligne += seanceInfo[j];
				}
				ligne += "</td>";
			}
			ligne += "</tr>";
		}
		$(id).html(ligne);
	}
	else
	{
		$(id).html("<tr class='danger'><td colspan=9>Aucun resultats trouvés</td></tr>");
	}
}

function loadSeanceList()
{
    var codeModule = $('#module :selected').text();

    /* fonction recuperant la liste des groupe dans lequel n'est pas un utilisateur */
    createSeanceTable = function(seance) {
		buildSeanceTable('#tableContent', seance);
		buildSeanceTable('#hiddenTableContent', seance);
		$('#tableContent').trigger('footable_initialize');
    };

    $.ajax({
        type: "POST",
        url: "./script/getSeanceByUserAndModule.php",
        data: { module: codeModule },
        cache: false,
        dateType: 'text',
        success: function(data) { createSeanceTable(data.split("~"));},
        error: function(data) {alert(data);}
    });

    return false;
}

$(document).ready(function() {
   loadModuleList();
   
   $('.footable').footable();
   
   $('.sort-column').click(function (e) {
		e.preventDefault();
		//get the footable sort object
        var footableSort = $('table').data('footable-sort');
		//get the index we are wanting to sort by
		var index = $(this).data('index');
		footableSort.doSort(index, 'toggle');
	});
});