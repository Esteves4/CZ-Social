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

var validaEmail = function(email){
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var temp = pattern.test(email.val());
	
	if (temp == false){
		adicionaErro(email);
		email.parent().tooltip("show")
	}else{
		adicionaSucesso(email);
		email.parent().tooltip("hide")
	}
	
	return temp;
}

var checaEmail = function(email){
	
	$.post("Controller/CadastroController-handler.php", { email: email.val() },  
		function(result){  
			//if the result is 1  
			if(result == false){  
				//show that the username is available
				adicionaSucesso(email);  				
				$('#sucesso').show();
				window.setTimeout(function(){
						$('#sucesso').hide();
					}, 2000);
			}else{  
				//show that the username is NOT available
				adicionaErro(email);
				$('#erroM').show();  
			}
		});
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
	$('[data-toggle="popover"]').popover("show")

	$('#sandbox-container .input-group.date').datepicker({
		format: "yyyy-mm-dd",
		startView: 2,
		clearBtn: true,
		language: "pt-BR",
		autoclose: true
    });
		
	$("#nome").change(function() {
		checaVazio($("#nome"));
	});
	
	$("#sobrenome").change(function() {
		checaVazio($("#sobrenome"));
	});
	
	$("#data").change(function() {
		var temp1 = checaVazio($("#data"));
		
		if( temp1 == true ){
			$("#btn-data").removeClass("btn-default");
			$("#btn-data").addClass("btn-danger");
		}else{
			$("#btn-data").removeClass("btn-danger");
			$("#btn-data").addClass("btn-success");
		}					
	});
	
	$("#email").change(function() {
		$('#sucesso').hide(); 
		$('#erroM').hide();
		
		var temp1 = checaVazio($("#email"));
		var temp2 = validaEmail($("#email"));
		
		if(temp2 == true){
			checaEmail($("#email"));
		}
		
	});
	
	$("#senha").change(function() {
		checaVazio($("#senha"));
	});
	
	$("#confSenha").change(function() {
		var temp1 = checaVazio($("#confSenha"));
		
		if( temp1 == false){
			checaSenhas();
		}
	});
	
	
	$("#registrar").click(function(){
		checaVazio($("#nome"));
		checaVazio($("#sobrenome"));
		checaVazio($("#data"));
		checaVazio($("#email"));
		checaVazio($("#senha"));
		checaVazio($("#confSenha"));
	});
	
	$("#cadastroForm").submit(function(){
		var nome = $('#nome').val();
		var sobrenome = $('#sobrenome').val();
		var data = $('#data').val();
		var email = $('#email').val();
		var senha = $('#senha').val();
		var temp = checaSenhas();
		
		if( temp == false){
			return false;
		}
		
		$.post("Controller/CadastroController-handler.php", {nome: nome, sobrenome: sobrenome, data: data, email: email, senha: senha },  
			function(result){   
				if(result == true){
					$('#sucessoCadastro').show();
					window.setTimeout(function(){
						document.location='login';
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
		
		return false;
	});
	
});