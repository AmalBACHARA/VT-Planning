$(function() {
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
	$( "#datePickerDeb" ).datepicker({ dateFormat: "yy-mm-dd" });;
	$( "#datePickerFin" ).datepicker({ dateFormat: "yy-mm-dd" });;
});