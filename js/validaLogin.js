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
		return true;
	}
	if( componente.val() != ""){
		adicionaSucesso(componente);
		return false;
	}
}

var validaEmail = function(email){
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var temp = pattern.test(email.val());
	
	if (temp == false){
		adicionaErro(email);
	}else{
		adicionaSucesso(email);
	}
	
	return temp;
}

$(document).ready(function(){

    $("#entrar").click(function(){
		var isValid = true;
		var temp1 = checaVazio($("#email"));
		var temp2 = checaVazio($("#email"));
		validaEmail($("#email"));
		checaSenha($("#senha"));
		
        if( temp1 == true || temp2 == true){
			$("#erroM").show();
		}
	
	});
	
	$("#loginForm").submit(function(){
		var email = $('#email').val();
		var senha = $('#senha').val();
		$('#erroInv').hide();
		
		$.post("checaLogin.php", { email: email, senha: senha },  
			function(result){   
				if(result == 0){
					document.location='secure.php';
				}else{
					adicionaErro($('#email'));
					adicionaErro($('#senha'));
					$('#erroInv').show();
				}
			});
		
		return false;
	});
	
	$("#email").change(function(){
		var temp1 = checaVazio($("#email"));
		validaEmail($("#email"));
	
    });
	
	$("#senha").change(function(){
		var temp1 = checaVazio($("#senha"));
    });
	
	
	
	
/*	$("#senha").change(function() {
		var email = $('#email').val();
		var senha = $('#senha').val();
		$('#erro3').hide();
			
		$.post("checaLogin.php", { email: email, senha: senha },  
			function(result){  
				//if the result is not 0  
				if(result != 0){ 
					//show that the username is correct
					$('#erro3').show();
					isValid = false;
					return isValid;
				}
			});
		
		
	});*/
});