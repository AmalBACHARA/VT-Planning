$(document).ready(function() {

    $('#calendar').fullCalendar({
        header: {
        left: 'prevYear,nextYear, prev,next, today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
		}
		
    })

$.ajax({url: "/matiere", success: function(result){ // putting "admin" need to be the pseudo log
 	// document.cookie ="username="+result[0].userName;
 	 // alert(result.toJSON());
//console.log(result.fulfillmentValue[0].nom);
              for (i = 0; i< result.fulfillmentValue.length; i++){
           document.getElementById('listematiere').innerHTML += "<p>" + result.fulfillmentValue[i].nom+"</p>";
              }
         
        }});	


$.ajax({url: "/filiere", success: function(result){ // putting "admin" need to be the pseudo log
 	// document.cookie ="username="+result[0].userName;
 	 // alert(result.toJSON());
//console.log(result.fulfillmentValue[0].nom);
              for (j = 0; j< result.fulfillmentValue.length; j++){
           document.getElementById('listematiere').innerHTML += "<p>" + result.fulfillmentValue[i].nom+"</p>";
              }
         
        }});		
		
});
