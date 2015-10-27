function updateCalendar() {

	"use strict";
	
	var codeSalle = $('#salleFilter :selected').val();
	var codeProf = $('#profsFilter :selected').val();
	var codeGroupe = $('#groupesFormationsFilter :selected').val();
	
	//Paramètre par défaut
	var options = {
		events_source: 'script/EventCalendar.php?filterProf='+codeProf+"&filterSalle="+codeSalle+"&filterGroupe="+codeGroupe,//events.json.php',
		view: 'month',
		tmpl_path: 'tmpls/',
		tmpl_cache: false,
		day: 'now',//'2013-03-12',
		onAfterEventsLoad: function(events) {
			if(!events) {
				return;
			}
			var list = $('#eventlist');
			list.html('');

			$.each(events, function(key, val) {
				$(document.createElement('li'))
					.html('<a href="' + val.url + '">' + val.title + '</a>')
					.appendTo(list);
			});
		},
		onAfterViewLoad: function(view) {
			$('.page-header h3').text(this.getTitle());
			$('#petitH4').text(this.getSemaine());
			var profLog = $('#profsFilter').find(":selected").text().split(" ");
			var nom =profLog[0];
			var prenom = profLog[1];
			$('#petitH4Bis').text("(Agenda de "+prenom+" "+nom+")");
			$('.btn-group button').removeClass('active');
			$('button[data-calendar-view="' + view + '"]').addClass('active');
		},
		classes: {
			months: {
				general: 'label'
			}
		}
	};

	var calendar = $('#calendar').calendar(options);
	
	//Par defaut le clic sur des events ouvre des modals
	//calendar.setOptions({modal: "#events-modal"});	
	//calendar.setOptions({jour: ""});
	
	$('.btn-group button[data-calendar-nav]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.navigate($this.data('calendar-nav'));
		});
	});

	$('.btn-group button[data-calendar-view]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.view($this.data('calendar-view'));
		});
	});

	$('#first_day').change(function(){
		var value = $(this).val();
		value = value.length ? parseInt(value) : null;
		calendar.setOptions({first_day: value});
		calendar.view();
	});

	$('#language').change(function(){
		calendar.setLanguage($(this).val());
		calendar.view();
	});

	$('#events-in-modal').change(function(){
		var val = $(this).is(':checked') ? $(this).val() : null;
		console.log(val);
		calendar.setOptions({modal: val});
	});
	$('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
		//e.preventDefault();
		//e.stopPropagation();
	});
}

updateCalendar();