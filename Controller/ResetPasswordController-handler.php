<?php
session_start();
require_once("ResetPasswordController.php");

$control = new ResetPasswordController();

$email = $_COOKIE['email'];
$senha = mysql_real_escape_string($_POST['senha']);

	
$resultado = $control->trocaSenha($email,$senha);

if ($resultado == true){
	$control->zeraReset($email);
}

echo $resultado;


?>