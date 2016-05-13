var nomeSobrenome =  function(){
	$.post("../Controller/PerfilController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
}

var atualizaFoto = function(){
	$.post("../Controller/PerfilController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);		
	});
}

$(document).ready(function(){
	nomeSobrenome();
	atualizaFoto();
	
	$('#comentarioBTN').click(function(){
		$('#comentarios').toggle();
	});
});