<?php
require_once("CadastroController.php");

$control = new CadastroController();

$nome = mysql_real_escape_string($_POST['nome']);
$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
$dataN = mysql_real_escape_string($_POST['data']);
$email = mysql_real_escape_string($_POST['email']);
$senha = mysql_real_escape_string($_POST['senha']);

if (empty($nome) == false){
	$resultado = $control->adicionar($nome,$sobrenome,$dataN,$email,$senha);
	echo $resultado;
}else{
	echo false;
}

?>