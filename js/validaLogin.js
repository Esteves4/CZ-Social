var currentBackground = 0;
var backgrounds = [];
backgrounds[0] = '../pictures/background3.png';
backgrounds[1] = '../pictures/background34.png';
backgrounds[2] = '../pictures/background35.png';

function changeBackground() {
    currentBackground++;
    if(currentBackground > 2) currentBackground = 0;
   
	$('#bodyBackground').css({
		'background-image' : "url('" + backgrounds[currentBackground] + "')"
	});




    setTimeout(changeBackground, 5000);
}



$(document).ready(function(){
	setTimeout(changeBackground, 5000);
	
     $("#entrar").click(function(){
		var isValid = true; 
		 
        if( $("#email").val() == ""){
			$("#erro").show();
			isValid = false;
		}
		if( $("#senha").val() == ""){
			$("#erro2").show();
			isValid = false;
		}if($('#erro3').is(":visible")){
			isValid = false;
		}
		
		return isValid;
    });
	
	$("#email").click(function(){
			$("#erro").hide();
    });
	
	$("#senha").click(function(){
			$("#erro2").hide();
    });
	
	$("#senha").change(function() {
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
		
		
	});
});