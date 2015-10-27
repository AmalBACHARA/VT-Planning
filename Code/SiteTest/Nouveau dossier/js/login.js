$(document).ready(function()
{

    // connexion teacher
    $('#teachConnect').submit(function(event)
	{

        event.preventDefault();

        $.ajax({
                type: "POST",
                url: "script/teachConnectScript.php",
                data: {
                    teachLogin: $("#inputLoginEnseignement").val(),
                    teachPwd: $("#inputPasswordEnseignement").val()
                },
                dataType: "json"
            })
            .done(function(elem)
			{
                if (elem.connexion === true)
				{
                    // connexion réussie
                    window.location.replace('index.php');
                } 
				else
				{
                    // connexion échouée
                    $("#retourLoginJs")
                        .html("<span class='glyphicon glyphicon-warning-sign'></span> "  + elem.message)
                        .addClass('alert alert-danger col-md-4 col-centered alert-dismissible')
                        .show();
                }
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });

    // connexion student
    $('#studyConnect').submit(function(event)
	{

        event.preventDefault();

        $.ajax({
                type: "POST",
                url: "script/studyConnectScript.php",
                data:
				{
                    studyLogin: $("#inputLoginEtudiant").val(),
                },
                dataType: "json"
            })
            .done(function(elem)
			{
                if (elem.connexion === true)
				{
                    // connexion réussie
                    window.location.replace('index.php');
                }
				else
				{
                    // connexion échouée
                    $("#retourLoginJs")
                        .html("<span class='glyphicon glyphicon-warning-sign'></span> "  + elem.message)
                        .addClass('alert alert-danger col-md-4 col-centered alert-dismissible')
                        .show();
                }
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });
	
	// connexion student
    $('#modifyMdpForm').submit(function(event)
	{
        event.preventDefault();

        $.ajax({
                type: "POST",
                url: "script/modifyMdp.php",
                data:
				{
                    loginTeach: $("#inputLogin").val(),
					oldMdp: $("#inputOldPassword").val(),
					newMdp1: $("#inputNewPassword1").val(),
					newMdp2: $("#inputNewPassword2").val()
                },
                dataType: "json"
            })
            .done(function(elem)
			{
                if (elem.connexion === true)
				{
                    // connexion réussie
                    $("#retourLoginJs")
                        .html("<span class='glyphicon glyphicon-ok-circle'></span> "  + elem.message)
                        .addClass('alert alert-success col-md-4 col-centered alert-dismissible')
                        .show();
						
					$("modifyMdp").modal('hide');
                }
				else
				{
                    // connexion échouée
                    $("#modifyMdpRetour")
                        .html("<span class='glyphicon glyphicon-warning-sign'></span> "  + elem.message)
                        .addClass('alert alert-danger alert-dismissible')
                        .show();
                }
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });

    $('.btn-success').click(function()
	{
        $("#retourLoginJs").hide();
    });
	
	 $('#modifyMdp .btn-danger').click(function()
	{
        $("#modifyMdpRetour").hide();
    });
	
	 $('#modifyMdpClose').click(function()
	{
        $("#modifyMdpRetour").hide();
    });
});
