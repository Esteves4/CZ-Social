
$(document).ready(function(){ 
	$('#comentarioBTN').click(function(){
		$('#comentarios').toggle();
		$('#template').clone().appendTo("#template");
	});
});