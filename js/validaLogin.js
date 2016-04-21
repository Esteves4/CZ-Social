$(document).ready(function(){
     $("#entrar").click(function(){
        if( $("#email").val() == ""){
			$("#erro").show();
			return false;
		}else if( $("#senha").val() == ""){
			$("#erro2").show();
			return false;
		}
    });
	
	$("#email").click(function(){
			$("#erro").hide();
    });
	
	$("#senha").click(function(){
			$("#erro2").hide();
    });
	
});