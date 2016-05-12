<?php
  	require_once("../Model/DBConnection_model.php");
	$connection = new DBConnection();
	$connection -> conectar();
  
  
  $imagem = $_FILES['imagem']['tmp_name'];
  $tamanho = $_FILES['imagem']['size'];
   
  if ( $imagem != "none" )
  {
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
      fclose($fp);
   echo $imagem;
   
  $queryInsercao = "INSERT INTO fotos VALUES (null, '$conteudo')";
  }
   
 ?>
