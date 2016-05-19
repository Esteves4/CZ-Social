var nomeSobrenome =  function(){
	$.post("../Controller/PesquisarController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
}

var getContas = function(quantidade, nome){
	$('#contas').load("../Controller/PesquisarController-handler.php?quantidadeContas="+quantidade+"&nome="+nome+"&funcao=getContas");
}

var atualizaFoto = function(){
	$.post("../Controller/PesquisarController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);		
	});
}

var getPerfilID = function(){
	$.post("../Controller/InicialController-handler.php", {funcao: 'getID'},  
		function(result){
			var new_href = "perfilUser.php?id=" + result;
			$("#nomePerfil").attr("href", new_href);		
	});
}


$(document).ready(function(){
	var quantidade_contas = 10;
	
	nomeSobrenome();
	atualizaFoto();
	getPerfilID();

	
	$(window).scroll(function() {
	   
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		   $('#carregar_contas').css( "display", "block" );
	   }else{
			$('#carregar_contas').css( "display", "none" );
	}
	   
	});
	
	$('#carregar_contas').click(function() {
		var conta_nome = $('#barra_pesquisa').val();
		quantidade_contas += 10;
		getContas(quantidade_contas, conta_nome);
	});
	
	$('#btn-pesquisar').click(function() {
		var conta_nome = $('#barra_pesquisa').val();
		getContas(quantidade_contas, conta_nome);
	});

});