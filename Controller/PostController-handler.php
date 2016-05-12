<?php
require_once("CadastroController.php");

$control = new PostController();

$image = $_POST['imagem'];

$id_foto = $this->control->carregarFoto($image);

$texto = mysql_real_escape_string($_POST['texto']);
$this->control->publicar($mural,$texto, $id_foto);
?>