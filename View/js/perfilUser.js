var nomeSobrenome =  function(){
	$.post("../Controller/UserController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
}

var nomeSobrenome_perfil =  function(id_usuario){
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'nomePerfil'},  
		function(result){   
			$('#Nome_Usuario').append(result);
		});
}

var getPosts = function(quantidade, id_usuario){
	$('#publicacoes').load("../Controller/UserController-handler.php?quantidadePosts="+quantidade+"&funcao=getPosts"+"&id="+id_usuario);
}

var atualizaFoto = function(){
	$.post("../Controller/UserController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);
	});

}

var atualizaFoto_perfil = function(id_usuario){
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'foto'},  
		function(result){
		$("#foto_perfil").attr("src",result);
	});
}

var getSexo = function(id_usuario){
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'sexo'},  
		function(result){
		$("#sexo").append(result);
	});
}

var getDataN = function(id_usuario){
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'dataN'},  
		function(result){
		$("#dataN").append(result);
	});
}

var getEndereco = function(id_usuario){
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'endereco'},  
		function(result){
		$("#localizacao").append(result);
	});
}

var getStatusAmizade = function(id_usuario){
	$('#status_amizade').load("../Controller/UserController-handler.php?funcao=getStatusAmizade"+"&id="+id_usuario);
}

$(document).ready(function(){
	var quantidade_posts = 6;
	var id_usuario = $('#id_usuario').text();
	atualizaFoto();
	nomeSobrenome();
	atualizaFoto_perfil(id_usuario);
	nomeSobrenome_perfil(id_usuario);
	getSexo(id_usuario);
	getDataN(id_usuario);
	getEndereco(id_usuario);
	getPosts(quantidade_posts, id_usuario);
	getStatusAmizade(id_usuario);
		
	$(window).scroll(function() {
	   
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		   $('#carregar_posts').css( "display", "block" );
	   }else{
			$('#carregar_posts').css( "display", "none" );
	}
	   
	});
	$(document).on("click",'.glyphicon-heart-empty',function(){
		$(this).toggleClass('glyphicon-heart-empty');
		$(this).toggleClass('glyphicon-heart');
		
		
		var div_parent = $(this).parent();
		var div_children = div_parent.children(".input-group");
		var div_children_children = div_children.children(".input-group-btn");
		
		var postagem_id = div_children_children.attr('id');

		$.post("../Controller/InicialController-handler.php", {postagem_id: postagem_id,  conta_id: id_usuario, funcao: 'curtir'},  
			function(result){ 
				if(result == true){
					getPosts(quantidade_posts, id_usuario);
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

		$.post("../Controller/InicialController-handler.php", {postagem_id: postagem_id,  conta_id: id_usuario, funcao: 'descurtir'},  
			function(result){
				if(result == true){
					getPosts(quantidade_posts, id_usuario);
				}
			});
	});
	
	$(document).on("click",'.enviar',function(){
		var div_parent = $(this).parent();
		var div_parent_parent = div_parent.parent();
		var div_children = div_parent_parent.children(".comentario");
		var comentario = div_children.val();
		
		var postagem_id = div_parent.attr('id');
		
		$.post("../Controller/InicialController-handler.php", {texto: comentario, postagem_id: postagem_id, conta_id: id_usuario,  funcao: 'comentar'},  
			function(result){   
				if(result == true){
					getPosts(quantidade_posts, id_usuario);
				}
			});
		
		$(this).reset();
		
	});
	
	$(document).on('click', '.glyphicon-comment', function(){
		var div_parent = $(this).parent();
		var div_children = div_parent.children("div.comentarios");
		div_children.toggle();
	});
	
	$(document).on("click",'#adiconar_amigo',function(){		
		$.post("../Controller/UserController-handler.php", {amigo_id: id_usuario, funcao: 'adicionarAmigo'},  
			function(result){
				if(result == true){
					getStatusAmizade(id_usuario);
				}
			});
	});
	
	$(document).on("click",'#aceitar_amizade',function(){
		$.post("../Controller/UserController-handler.php", {amigo_id: id_usuario, funcao: 'aceitarAmizade'},  
			function(result){
				if(result == true){
					getStatusAmizade(id_usuario);
				}
			});
	});
	
	$(document).on("click",'#remover_amizade',function(){
		$.post("../Controller/UserController-handler.php", {amigo_id: id_usuario, funcao: 'removerAmizade'},  
			function(result){
				if(result == true){
					getStatusAmizade(id_usuario);
				}
			});
	});
	
	
	$('#carregar_posts').click(function() {
		quantidade_posts += 6;
		getPosts(quantidade_posts, id_usuario);
	});
	
});