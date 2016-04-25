$(document).ready(function(){ 
	
	$('#sandbox-container .input-group.date').datepicker({
		format: "yyyy-mm-dd",
		startView: 2,
		clearBtn: true,
		language: "pt-BR",
		autoclose: true
    });
		

	$("#nome").change(function() {
		if( $("#nome").val() == "" || $("#sobrenome").val() == "" ){
			$("#group-nome").addClass("has-error");
			$("#erro").show();
		}else if( $("#nome").val() == "" && $("#sobrenome").val() == ""){
			$("#group-nome").removeClass("has-error");
			$("#erro").hide();
		}			
	});
	$("#sobrenome").change(function() {
		if( $("#nome").val() == "" || $("#sobrenome").val() == "" ){
			$("#group-nome").addClass("has-error");
			$("#erro").show();
		}else if( $("#nome").val() != "" && $("#sobrenome").val() != ""){
			$("#group-nome").removeClass("has-error");
			$("#erro").hide();
		}					
	});
	$("#data").change(function() {
		if( $("#data").val() == "" ){
			$("#group-data").addClass("has-error");
			$("#btn-data").removeClass("btn-default");
			$("#btn-data").addClass("btn-danger");
			$("#erro1").show();
		}else if( $("#data").val() != "" ){
			$("#group-data").removeClass("has-error");
			$("#btn-data").removeClass("btn-danger");
			$("#btn-data").addClass("btn-default");
			$("#erro1").hide();
		}					
	});
	$("#email").change(function() {
		if( $("#email").val() == "" ){
			$("#group-email").addClass("has-error");
			$('#erro6').hide();
			$('#sucesso').hide();
			$("#erro2").show();
			return false;
		}else if( $("#email").val() != "" ){
			$("#group-email").removeClass("has-error");
			$('#erro6').hide();			
			$("#erro2").hide();
		}
		
		var email = $('#email').val();
		
		$.post("checaEmail.php", { email: email },  
            function(result){  
                //if the result is 1  
                if(result == 0){  
                    //show that the username is available  
                    $('#sucesso').show(); 
                }else{  
                    //show that the username is NOT available
                    $('#erro6').show();  
                }
			});
	});
	
	$("#senha").change(function() {
		if( $("#senha").val() == "" ){
			$("#group-senha").addClass("has-error");
			$("#erro3").show();
		}else if( $("#senha").val() != "" ){
			$("#group-senha").removeClass("has-error");
			$("#erro3").hide();
		}					
	});
	$("#confSenha").change(function() {
		if( $("#confSenha").val() == "" || $("#confSenha").val() != $("#senha").val() ){
			$("#group-conf-senha").addClass("has-error");
			$("#erro4").show();
		}else if( $("#confSenha").val() == $("#senha").val() ){
			$("#group-conf-senha").removeClass("has-error");
			$("#erro4").hide();
		}					
	});
	
	
	$("#registrar").click(function(){
		var isValido = true;
		
		if($("#nome").val() == "" || $("#sobrenome").val() == "" ){
			$("#group-nome").addClass("has-error");
			isValido = false;
		}
		if( $("#data").val() == ""){
			$("#group-data").addClass("has-error");
			$("#btn-data").removeClass("btn-default");
			$("#btn-data").addClass("btn-danger");
			isValido = false;			
		}
		if( $("#email").val() == ""){
			$("#group-email").addClass("has-error");
			isValido = false;			
		}
		if ( $("#senha").val() == "" ){
			$("#group-senha").addClass("has-error");
			isValido = false;
		}
		if ( $("#confSenha").val() == "" ){
			$("#group-conf-senha").addClass("has-error");
			isValido = false;
		}
		if($("#nome").val() == "" || $("#sobrenome").val() == "" || $("#data").val() == "" || $("#email").val() == "" ||  $("#senha").val() == "" || $("#confSenha").val() == "" ){
			$("#erro5").show();
			isValido = false;
		}
		if( $("#confSenha").val() != $("#senha").val()  ){
			$("#erro4").show();
			isValido = false;
		}if($('#erro6').is(":visible")){
			isValido = false;
		}
		
		return isValido;
	});
	
});