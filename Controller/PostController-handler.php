<?php
require_once("CadastroController.php");

$control = new PostController();




if(isset($_POST['postar']))
{
	$imagem = $_POST['imagem'];
	$id_foto = $this->control->carregarFoto($imagem);
	$texto = mysql_real_escape_string($_POST['texto']);
  $mural = 1;
  $this->control->publicar($mural,$texto, $id_foto);
}

?>
