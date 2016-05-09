
$(document).ready(function(){ 
	
	$('#sandbox-container .input-group.date').datepicker({
		format: "yyyy-mm-dd",
		startView: 2,
		clearBtn: true,
		language: "pt-BR",
		autoclose: true
    });

	$('#estados').change(function(){
        $('#cidades').load('../Controller/PerfilController-handler.php?estado_id='+$('#estados').val() );
    });
	
	$('#salvar').click(function() {
		var imageData = $('#image-cropper').cropit('export');
		var nome = $('#nome').val();
		var sobrenome = $('#sobrenome').val();
		var data = $('#data').val();
		var sexo = $('#sexo').val();
		var cidade_id = $('#cidades').val();
	  
		$.post("../Controller/PerfilController-handler.php", {nome: nome, sobrenome: sobrenome, data: data, sexo: sexo, cidade_id: cidade_id, imagem_URL:  imageData},  
			function(result){   
				if(result == true){
					$('#sucessoPerfil').show();
					window.setTimeout(function(){
						document.location='inicial';
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
			
		return false;
	});
	
	
	$('#image-cropper').cropit();
	$('#image-cropper').cropit('imageSrc', 'pictures/200x200.jpg');
	$('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
	

});