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
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    var temp = pattern.test(email);
	
	if (temp == false){
		adicionaErro(email);
	}else{
		adicionaSucesso(email);
	}
	
	return temp;
}

var validaSenha = function(senha){
	
}


$(document).ready(function(){

	
    $("#entrar").click(function(){
		var isValid = true;
		var temp1 = checaVazio($("#email"));
		var temp2 = checaVazio($("#senha"));
		var temp3 = validaEmail($("#email"));
		
        if( temp1 == true || temp2 == true){
			$("#erroM").show();
			isValid = false;
		}
		
		return isValid;
    });
	
	$("#email").change(function(){
		var temp1 = checaVazio($("#email"));
		var temp2 = validaEmail($("#email"));
		
		if (temp2 == false){
			adicionaErro($("#email"));
		}
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