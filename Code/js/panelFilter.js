function loadGroupesListFilter()
{
    var codeGroupe = $('#groupesFilter :selected').val();

    addGroupesToOptions = function(groupes)
	{
        $('#groupesFormationsFilter').empty();
	$('#groupesFormationsFilter').append('<option value="all" selected>TOUS</option>');
        if (groupes.length) {
            for (i = 0; i < groupes.length; i++)
	    {
                groupesInfos = groupes[i].split("#");
                $('#groupesFormationsFilter').append("<option value=" + groupesInfos[0] + ">" + groupesInfos[1] + "</option>");
            }
        }
    };

    $.ajax({
        type: "POST",
        url: "./script/getGroupesByFormation.php",
        data: {
            code: codeGroupe
        },
        cache: false,
        dateType: 'text',
        success: function(data)
		{
            addGroupesToOptions(data.split("~"));
        },
        error: function(data)
		{
            alert(data);
        }
    });
}


function loadProfsListFilter(code)
{
    var codeComposante = $('#profsComposantesFilter :selected').val();
    var selectedd = "";

    addProfsToOptions = function(profs)
	{
        $('#profsFilter').empty();
        if (profs.length) {
            for (i = 0; i < profs.length; i++)
	    {
                profInfos = profs[i].split("#");
		if(profInfos[0] == code)
		{
		    selectedd = "selected";
		    $('#profsFilter').append("<option value=" + profInfos[0] +" "+ selectedd +">" + profInfos[1] + " " + profInfos[2] + "</option>");
		}			 
                else
		    $('#profsFilter').append("<option value=" + profInfos[0] +">" + profInfos[1] + " " + profInfos[2] + "</option>");
                
		selectedd = "";
	    }
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

function loadSallesListFilter()
{
    var codeSalle = $('#departementFilter :selected').val();

    addSallesToOptions = function(salles)
	{
        $('#salleFilter').empty();
	$('#salleFilter').append('<option value="all" selected>TOUS</option>');
        if (salles.length) {
            for (i = 0; i < salles.length; i++)
	    {
                sallesInfos = salles[i].split("#");
                $('#salleFilter').append("<option value=" + sallesInfos[0] + ">" + sallesInfos[1] + "</option>");
            }
        }
    };

    $.ajax({
        type: "POST",
        url: "./script/getSallesByDepartements.php",
        data: {
            code: codeSalle
        },
        cache: false,
        dateType: 'text',
        success: function(data)
		{
            addSallesToOptions(data.split("~"));
        },
        error: function(data)
		{
            alert(data);
        }
    });
}

function loadMaterielsListFilter()
{
    var codeMateriel = $('#departementFilter :selected').val();

    addMaterielsToOptions = function(materiels)
	{
        $('#materielFilter').empty();
        if (materiels.length) {
            for (i = 0; i < materiels.length; i++)
	    {
                materielFilterBis = materiels[i].split("#");
                $('#salleFilter').append("<option value=" + materielsInfos[0] + ">" + materielsInfos[1] + "</option>");
            }
        }
    };

    $.ajax({
        type: "POST",
        url: "./script/getMaterielsByComposantes.php",
        data: {
            code: codeMateriel
        },
        cache: false,
        dateType: 'text',
        success: function(data)
		{
            addMaterielsToOptions(data.split("~"));
        },
        error: function(data)
		{
            alert(data);
        }
    });
}