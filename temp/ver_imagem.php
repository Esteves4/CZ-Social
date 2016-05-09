<?php
    require_once("../Model/DBConnection_model.php");
	$connection = new DBConnection();
	$connection -> conectar();
  
   
  $id_imagem = 1;
  $querySelecionaPorCodigo = "SELECT foto_id, imagem FROM fotos WHERE foto_id = $id_imagem";
  $resultado = mysql_query($querySelecionaPorCodigo);
  $imagem = mysql_fetch_object($resultado);
  Header( "Content-type: image/gif");
  echo $imagem->imagem;

src="data:image/jpg;base64,<?php
					
					$foto = $control->getFotoPerfil("lucas.esteves.rocha@gmail.com");
					echo $foto;
				
				?>"
