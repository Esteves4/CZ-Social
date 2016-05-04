<?php
require_once("CadastroController.php");

$control = new CadastroController();



if (empty($_POST['nome']) == false){
	$nome = mysql_real_escape_string($_POST['nome']);
	$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
	$dataN = mysql_real_escape_string($_POST['data']);
	$email = mysql_real_escape_string($_POST['email']);
	$senha = mysql_real_escape_string($_POST['senha']);
	
	
	$resultado = $control->adicionar($nome,$sobrenome,$dataN,$email,$senha);
	echo $resultado;
}else{
	$email = mysql_real_escape_string($_POST['email']);
	
	$resultado = $control->checaEmail($email);
	echo $resultado;
}

?>