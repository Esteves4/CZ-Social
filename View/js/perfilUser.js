var nomeSobrenome =  function(){
	$.post("../Controller/UserController-handler.php", {funcao: 'nomePerfil'},  
		function(result){   
			$('#nomePerfil').append(result);
			$('#Nome_Usuario').append(result);
		});
}

var getPosts = function(quantidade){
	$('#publicacoes').load("../Controller/UserController-handler.php?quantidadePosts="+quantidade+"&funcao=getPosts");
}

var atualizaFoto = function(){
	$.post("../Controller/InicialController-handler.php", {funcao: 'foto'},  
		function(result){
		$("#brand").attr("src",result);
		$("#foto_perfil").attr("src",result);
		
	});
}


$(document).ready(function(){
	nomeSobrenome();
	atualizaFoto();
	getPosts(5);
	
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
	
});