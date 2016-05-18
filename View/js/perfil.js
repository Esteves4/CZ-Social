var nomeSobrenome =  function(){
	$.post("../Controller/PerfilController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
}

var estados = function(){
	$('#estados').load('../Controller/PerfilController-handler.php?funcao=estados');
}

var cidades = function(){
	$('#cidades').load('../Controller/PerfilController-handler.php?estado_id='+$('#estados').val()+'&funcao=cidades');
}

var atualizaInput = function(elemento,funcao){
	$.post("../Controller/PerfilController-handler.php", {funcao: funcao},  
	function(result){   
		elemento.val(result);
		
	});
}
	
var atualizaFoto = function(){
	$.post("../Controller/PerfilController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);
		$('#image-cropper').cropit('imageSrc', result);			
	});
}


$(document).ready(function(){ 
	
	
	$('#sandbox-container .input-group.date').datepicker({
		format: "yyyy-mm-dd",
		startView: 2,
		clearBtn: true,
		language: "pt-BR",
		autoclose: true
    });

	/* Colocar funções AJAX invés de colocar PHP no meio do HTML*/
	estados();
	nomeSobrenome();
	atualizaInput($('#nome'),'nomeInput');
	atualizaInput($('#sobrenome'),'sobrenomeInput');
	atualizaInput($('#data'),'dataInput');
	atualizaInput($("#sexo"),'sexoInput');
	atualizaInput($("#estados"),'estadoInput');
	atualizaFoto();
	
	window.setTimeout(function(){
		cidades();
	}, 2000);

	window.setTimeout(function(){
		atualizaInput($("#cidades"),'cidadeInput');
	}, 2000);
	
				
	$('#estados').change(function(){
		cidades();
    });
	
	$('#perfilForm').submit(function() {
		var imageURL = $('#image-cropper').cropit('export',{type: 'image/jpeg'});
		var nome = $('#nome').val();
		var sobrenome = $('#sobrenome').val();
		var data = $('#data').val();
		var sexo = $('#sexo').val();
		var cidade_id = $('#cidades').val();
	  
		$('#registrar').button('loading')
	  
		$.post("../Controller/PerfilController-handler.php", {nome: nome, sobrenome: sobrenome, data: data, sexo: sexo, cidade_id: cidade_id, imagem: imageURL, funcao: 'salvarPerfil'},  
			function(result){   
				if(result == true){
					$('#sucessoPerfil').show();
					window.setTimeout(function(){
						document.location='inicial.php';
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
			
		return false;
	});
	
	$('#profileIMG').dblclick(function() {
		$('#ImgInput').click();
	});
	
	$('#image-cropper').cropit();
	$('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
	

});