function dataURItoBlob(dataURI) {
    // convert base64 to raw binary data held in a string
    var byteString = atob(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to an ArrayBuffer
    var arrayBuffer = new ArrayBuffer(byteString.length);
    var _ia = new Uint8Array(arrayBuffer);
    for (var i = 0; i < byteString.length; i++) {
        _ia[i] = byteString.charCodeAt(i);
    }

    var dataView = new DataView(arrayBuffer);
    var blob = new Blob([dataView], { type: mimeString });
    return blob;
}



$(document).ready(function(){ 
	
	$('#sandbox-container .input-group.date').datepicker({
		format: "yyyy-mm-dd",
		startView: 2,
		clearBtn: true,
		language: "pt-BR",
		autoclose: true
    });

	$('#estados').change(function(){
        $('#cidades').load('../Controller/PerfilController-handler.php?estado_id='+$('#estados').val() );
    });
	
	$('#perfilForm').submit(function() {
		var imageData = $('#image-cropper').cropit('export');
		var nome = $('#nome').val();
		var sobrenome = $('#sobrenome').val();
		var data = $('#data').val();
		var sexo = $('#sexo').val();
		var cidade_id = $('#cidades').val();
	  
		$('#registrar').button('loading')
	  
		$.post("../Controller/PerfilController-handler.php", {nome: nome, sobrenome: sobrenome, data: data, sexo: sexo, cidade_id: cidade_id, imagem_URL:  imageData},  
			function(result){   
				if(result == true){
					$('#sucessoPerfil').show();
					window.setTimeout(function(){
						document.location='inicial';
					}, 2000);
					
				}else{
					$('#erroC').show();
				}
			});
			
		return false;
	});
	
	
	$('#image-cropper').cropit();
	$('#image-cropper').cropit('imageSrc', 'pictures/200x200.jpg');
	$('#image-cropper').cropit({ imageState: { src: { imageSrc } } });
	

});