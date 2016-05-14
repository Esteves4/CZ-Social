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
	
	$('#icone_postar').click(function() {
		$('#menu_toggle').click();
		$('#black').show();
		$('#novo_post').animate({
		  left: "0px"
		}, 200);
		
	});
	
	$('.glyphicon-heart-empty').click(function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
	});

	$('.glyphicon-comment').click(function(){
		var divParent = $(this).parent();
		var divChildren = divParent.children("div.comentarios");
		divChildren.toggle();
	});
	
	$('#cancelar').click(function() {
		$('#black').hide();
		$('#novo_post').animate({
		  left: "-450px"
		}, 200);
	});

	$('#novo_post').submit(function() {
		var imageURL = $('#image-cropper').cropit('export',{type: 'image/jpeg'});
		var texto = $('#legenda').val();
	  
		$('#postar').button('loading')
	  
		$.post("../Controller/InicialController-handler.php", {imagem: imageURL, texto: texto, funcao: 'postar'},  
			function(result){   
				if(result == true){
					$('#sucessoPostar').show();
					$('#image-cropper').cropit('imageSrc', "pictures/landscape.jpg");
					$('#novo_post')[0].reset();
					$('#postar').button('reset')
					window.setTimeout(function(){
						$('#cancelar').trigger('click');
						$('#sucessoPostar').hide();
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
			
		return false;
	});
	
	$('#image-cropper').cropit();
	$('#image-cropper').cropit('imageSrc', "pictures/landscape.jpg");
	$('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
});