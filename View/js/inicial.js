var nomeSobrenome =  function(){
	$.post("../Controller/InicialController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
}

var getPosts = function(quantidade){
	$('#publicacoes').load("../Controller/InicialController-handler.php?quantidadePosts="+quantidade+"&funcao=getPosts");
}

var atualizaFoto = function(){
	$.post("../Controller/InicialController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);		
	});
}


$(document).ready(function(){
	nomeSobrenome();
	atualizaFoto();
	getPosts(5);
	
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
	
	$(document).on("click",'.glyphicon-heart-empty',function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
	});
	
	$(document).on("click",'.glyphicon-heart',function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
	});
	
	$(document).on("click",'.enviar',function(){
		var div_parent = $(this).parent();
		var div_parent_parent = div_parent.parent();
		var div_children = div_parent_parent.children(".comentario");
		var comentario = div_children.val();
		
		var postagem_id = div_parent.attr('id');
		
		$.post("../Controller/InicialController-handler.php", {texto: comentario, postagem_id: postagem_id,  funcao: 'comentar'},  
			function(result){   
				if(result == true){
					getPosts(5);
				}
			});
		
		$(this).reset();
		
	});
	
	$(document).on('click', '.glyphicon-comment', function(){
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
						getPosts(5);
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