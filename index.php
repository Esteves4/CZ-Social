
<?php

//chama nosso autoloader
include 'bootstrap.php';

//inclui os arquivos e cria um nome curto para o namespace
use MWSocial\core\core as core; 
use MWSocial\core\request as request; 

//instancia as classes
$core = new core;
$request = new request; 

//executa os códigos
$core->debug($request->data());
?>
<form action="index.php?nome=Erik&sobrenome=Figueiredo" method="post">
<input type="text" name="idade" value="28 anos">
<input type="text" name="sexo" value="Masculino">
<input type="text" name="profissao" value="Vendedor de agua de coco">
<input name="envia" type="submit" value="Enviar">
</form>