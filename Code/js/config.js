$(document).ready(function()
{

    // connexion teacher
    $('#modifyConfigForm').submit(function(event)
	{

		var weekendVal = $('#weekend :selected').val();
		var beginTimeVal = $('#beginTime :selected').val();
		var endTimeVal = $('#endTime :selected').val();
		
        event.preventDefault();

        $.ajax({
                type: "POST",
				url: "./script/modifyConfig.php",
				data: {
					weekend: weekendVal,
					beginTime: beginTimeVal,
					endTime : endTimeVal
				},
				cache: false,
				dateType: 'text'
            })
            .done(function(elem)
			{
                // connexion échouée
                $("#retourLoginJs")
                    .html("<span class='glyphicon glyphicon-ok-circle'></span> "  + elem)
                    .addClass('alert alert-success col-centered alert-dismissible')
            })
            .fail(function(elem)
			{
                alert("Appel AJAX impossible");
            });
    });
});