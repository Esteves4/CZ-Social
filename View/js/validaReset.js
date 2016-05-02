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


$(document).ready(function(){ 

	$('[data-toggle="tooltip"]').tooltip("show")
	
	$("#email").change(function() {
		$('#erroM').hide();
		
		var temp1 = checaVazio($("#email"));
		var temp2 = validaEmail($("#email"));
		
	});
	
	$("#redefinir").click(function(){
		$('#sucessoInfo').hide(); 
		checaVazio($("#email"));
	});
	
	$("#resetForm").submit(function(){
		var email = $('#email').val();
		
		$('#redefinir').button('loading')
		
		$.post("Controller/ResetController-handler.php", {email: email},  
			function(result){   
				if(result == true){
					$('#redefinir').hide();
					$('#group-email').hide();
					$('#sucessoRedefinir').show();  
					
				}else if(result == 0){
					$('#redefinir').button('reset')
					$('erroC').show();
					
				}else{
					$('#redefinir').button('reset')
					adicionaErro($('#email'));  				
					$('#erroM').show();
					window.setTimeout(function(){
							$('#erroM').hide();
						}, 5000);
				}
			});
		
		return false;
	});
	
});