<?php
  require("conecta.php");
   
  $id_imagem = $_GET['foto_id'];
  $querySelecionaPorCodigo = "SELECT foto_id, imagem FROM fotos WHERE foto_id = $id_imagem";
  $resultado = mysql_query($querySelecionaPorCodigo);
  $imagem = mysql_fetch_object($resultado);
  Header( "Content-type: image/gif");
  echo $imagem->imagem;


