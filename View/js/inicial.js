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
	var quantidade_posts = 6;
	
	nomeSobrenome();
	atualizaFoto();
	getPosts(quantidade_posts);
	
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
	
	
	$(window).scroll(function() {
	   
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		   $('#carregar_posts').css( "display", "block" );
	   }else{
			$('#carregar_posts').css( "display", "none" );
	}
	   
	});
	
	$('#profileIMG').dblclick(function() {
		$('#ImgInput').click();
	});
	
	$(document).on("click",'.glyphicon-heart-empty',function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
		
		
		var div_parent = $(this).parent();
		var div_children = div_parent.children(".input-group");
		var div_children_children = div_children.children(".input-group-btn");
		
		var postagem_id = div_children_children.attr('id');

		$.post("../Controller/InicialController-handler.php", {postagem_id: postagem_id, funcao: 'curtir'},  
			function(result){ 
				if(result == true){
					getPosts(quantidade_posts);
				}
			});
	});
	
	$(document).on("click",'.glyphicon-heart',function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
		
		
		var div_parent = $(this).parent();
		var div_children = div_parent.children(".input-group");
		var div_children_children = div_children.children(".input-group-btn");
		
		var postagem_id = div_children_children.attr('id');

		$.post("../Controller/InicialController-handler.php", {postagem_id: postagem_id, funcao: 'descurtir'},  
			function(result){
				if(result == true){
					getPosts(quantidade_posts);
				}
			});
	});
	
	 $('.comentario').on( "keydown", function(event) {
		var div_parent = $(this).parent();
		var div_children = div_parent.children(".input-group-btn");
		
		if(event.which == 13){
			div_children.click();
		} 
		
		
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
					getPosts(quantidade_posts);
				}
			});
		
		$(this).reset();
		
	});
	
	$(document).on('click', '.glyphicon-comment', function(){
		var div_parent = $(this).parent();
		var div_children = div_parent.children("div.comentarios");
		div_children.toggle();
	});
	
	
	$('#cancelar').click(function() {
		$('#black').hide();
		$('#novo_post').animate({
		  left: "-560px"
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
						getPosts(quantidade_posts);
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
			
		return false;
	});
	
	$('#carregar_posts').click(function() {
		quantidade_posts += 6;
		getPosts(quantidade_posts);
	});
	

	
	$('#image-cropper').cropit();
	$('#image-cropper').cropit('imageSrc', "pictures/landscape.jpg");
	$('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
});