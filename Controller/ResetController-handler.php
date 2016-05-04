<?php
require_once("ResetController.php");

$control = new ResetController();

$email = mysql_real_escape_string($_POST['email']);
	
$resultado = $control->checaEmail($email);

echo $resultado;


?>