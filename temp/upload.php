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
   
  $queryInsercao = "INSERT INTO fotos VALUES (null, '$conteudo')";
   
   mysql_query($queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
  echo 'Registro inserido com sucesso!'; 
  if(mysql_affected_rows($conexao) > 0)
       print "A imagem foi salva na base de dados.";
   else
       print "Não foi possível salvar a imagem na base de dados.";
   }
  else
      print "Não foi possível carregar a imagem.";
  header('Location: ver_imagem.php');
   
 ?>
