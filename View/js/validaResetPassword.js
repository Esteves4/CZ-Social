var adicionaErro = function(componente){
	componente.parent().removeClass("has-success");
	componente.parent().addClass("has-error");

}

var adicionaSucesso = function(componente){
	componente.parent().removeClass("has-error");
	componente.parent().addClass("has-success");

}

var checaVazio = function(componente){
	if( componente.val() == ""){
		adicionaErro(componente);
		$("#erroP").show();
		return true;
	}
	if( componente.val() != ""){
		adicionaSucesso(componente);
		$("#erroP").hide();
		return false;
	}
}

var checaSenhas = function(){
	if( $("#confSenha").val() != $("#senha").val() ){
		adicionaErro($("#senha"));
		adicionaErro($("#confSenha"));
		$("#icone").removeClass();
		$("#icone").addClass("glyphicon glyphicon-remove");
		$("#group-conf-senha").tooltip("show")
		return false;
		
	}else{
		adicionaSucesso($("#senha"));
		adicionaSucesso($("#confSenha"));
		$("#icone").removeClass();
		$("#icone").addClass("glyphicon glyphicon-ok");
		$("#group-conf-senha").tooltip("hide")
		return true;
	}
}

$(document).ready(function(){ 

	$('[data-toggle="tooltip"]').tooltip()
	
	$("#senha").change(function() {
		checaVazio($("#senha"));
	});
	
	$("#confSenha").change(function() {
		var temp1 = checaVazio($("#confSenha"));
		
		if( temp1 == false){
			checaSenhas();
		}
	});
	
	$("#email").change(function() { 
		var temp1 = checaVazio($("#email"));
		
	});
	
	
	$("#redefinir").click(function(){
		checaVazio($("#senha"));
		checaVazio($("#confSenha"));
	});
	
	$("#resetPasswordForm").submit(function(){
		var email = $('#email').val();
		var senha = $('#senha').val();
		var temp = checaSenhas();
		
		if( temp == false){
			return false;
		}
		
		$.post("../Controller/ResetPasswordController-handler.php", {email: email, senha: senha },  
			function(result){   
				if(result == true){
					$('#group-email').hide();
					$('#group-senha').hide();
					$('#group-conf-senha').hide();
					$('#redefinir').hide();
					$('#sucessoRedefinir').show();
					window.setTimeout(function(){
						document.location='login';
					}, 4000);
					
				}else{
					$('#erroC').show();
				}
			});
		
		return false;
	});
	
});