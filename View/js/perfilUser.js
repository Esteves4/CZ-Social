var nomeSobrenome =  function(id_usuario){
	$.post("../Controller/UserController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
		});
	
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'nomePerfil'},  
		function(result){   
			$('#Nome_Usuario').append(result);
		});
}

var getPosts = function(quantidade, id_usuario){
	$('#publicacoes').load("../Controller/UserController-handler.php?quantidadePosts="+quantidade+"&funcao=getPosts"+"&id="+id_usuario);
}

var atualizaFoto = function(id_usuario){
	$.post("../Controller/UserController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);
	});
	
	$.post("../Controller/UserController-handler.php", {id: id_usuario, funcao: 'foto'},  
		function(result){
		$("#foto_perfil").attr("src",result);
	});
}


$(document).ready(function(){
	var quantidade_posts = 6;
	var id_usuario = $('#id_usuario').text();
	nomeSobrenome(id_usuario);
	atualizaFoto(id_usuario);
	getPosts(quantidade_posts, id_usuario);
	/*getDataN(id_usuario);
	getSexo(id_usuario);
	getEndereco(id_usuario); Fazer depois*/ 
		
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
	
	
	$('#carregar_posts').click(function() {
		quantidade_posts += 6;
		getPosts(quantidade_posts);
	});
	
});