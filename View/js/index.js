var datepicker = $.fn.datepicker.noConflict(); // return $.fn.datepicker to previously assigned value
$.fn.bootstrapDP = datepicker;                 // give $().bootstrapDP the bootstrap-datepicker functionality

$(document).ready(function(){ 
$('#data').datepicker({
    format: 'mm/dd/yyyy'
});
	
});