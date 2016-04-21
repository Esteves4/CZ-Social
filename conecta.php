<?php
  $conexao = mysql_connect("localhost", "root", "senha");
   
  if($conexao)
  {
  $baseSelecionada = mysql_select_db("czSocial");
  if (!$baseSelecionada) {
      die ('Não foi possível conectar a base de dados: ' . mysql_error());
  } } else {
      die('Não conectado : ' . mysql_error());
  }
  ?>
