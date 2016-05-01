<?php
require_once("LoginController.php");

$control = new LoginController();

$email = mysql_real_escape_string($_POST['email']);
$senha = md5(mysql_real_escape_string($_POST['senha']));
	
$resultado = $control->login($email,$senha);

echo $resultado;


?>