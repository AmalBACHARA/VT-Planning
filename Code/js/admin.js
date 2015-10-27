function displayDroits()
{
		function manageDroitState(id, state)
		{
			if (state == 1)
			{
				if (id == "#admin")
				{
					$(id).attr('disabled', 'disabled');
				}
				$(id).addClass("active");
			}
			else
			{
				if (id == "#admin")
				{
					$(id).removeAttr('disabled');
				}
				$(id).removeClass("active");
			}
		}
		var codeProf = $('#profs :selected').val();
		
		$.ajax({
			type: "POST",
			url: "./script/getDroitsByCodeProf.php",
			data: {
				code: codeProf,
			},
			dataType: "json"
		})
		.done(function(elem)
		{
			manageDroitState("#admin", elem.admin);
			manageDroitState("#bilan_formation", elem.bilan_formation);
			manageDroitState("#bilan_salle", elem.salle);
			manageDroitState("#droits", elem.mes_droits);
			manageDroitState("#bilan_salle", elem.salle);
			manageDroitState("#bilan_heure", elem.bilan_heure_global);
			manageDroitState("#pdf", elem.pdf);
			manageDroitState("#rss", elem.rss);
			manageDroitState("#config", elem.configuration);
			manageDroitState("#reservation", elem.reservation);
			manageDroitState("#modules", elem.module);
			manageDroitState("#dialogue", elem.dialogue);
			manageDroitState("#heures", elem.bilan_heure);
		})
		.fail(function(elem)
		{
			alert("Appel AJAX impossible");
		});
}

$(document).ready(function()
{
	displayDroits();
	
	$('#modifyConfigForm').submit(function(event)
	{

        event.preventDefault();

        $.ajax({
                type: "POST",
                url: "./script/updateDroits.php",
                data: {
                    code: $('#profs :selected').val(),
					admin: $('#admin').hasClass('active'),
					reservation: $('#reservation').hasClass('active'),
					mes_droits : $('#droits').hasClass('active'),
                    modules  : $('#modules').hasClass('active'),
					bilan_heure_global : $('#bilan_heure').hasClass('active'),
					bilan_heure : $('#heures').hasClass('active'),
					configuration : $('#config').hasClass('active'),
					rss : $('#rss').hasClass('active'),
					pdf : $('#pdf').hasClass('active'),
					dialogue : $('#dialogue').hasClass('active'),
					salle : $('#bilan_salle').hasClass('active')
                },
                dataType: "text"
            })
            .done(function(elem)
			{
                // connexion échouée
                $("#retourLoginJs")
                    .html("<span class='glyphicon glyphicon-ok-circle'></span> "  + elem)
                    .addClass('alert alert-success col-centered alert-dismissible');
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });
});