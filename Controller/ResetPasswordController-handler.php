<?php
session_start();
require_once("ResetPasswordController.php");

$control = new ResetPasswordController();

$email = mysql_real_escape_string($_POST['email']);
$senha = mysql_real_escape_string($_POST['senha']);

	
$resultado = $control->trocaSenha($email,$senha);

if ($resultado == true){
	$resultado2 = $control->zeraReset($email);
}

echo $resultado;


?>