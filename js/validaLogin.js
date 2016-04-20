$(document).ready(function(){
     $("#entrar").click(function(){
        if( $("#email").val() == ""){
			alert("O Campo \"Email\" é obrigatório.");
			return false;
		}else if( $("#senha").val() == ""){
			alert("O Campo \"Senha\" é obrigatório.");
			return false;
		}
    });
});