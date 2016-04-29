<?php
require("conecta.php");
session_start();	
 
$email = mysql_real_escape_string($_POST['email']);
$senha = md5(mysql_real_escape_string($_POST['senha']));

$resultado = mysql_query("SELECT * FROM contas where email = '$email' and senha = '$senha'");

if(mysql_num_rows($resultado) > 0){
	$_SESSION['email']=$email;
	$_SESSION['senha']=$senha;
	echo 0;

}else{
	echo 1;
}
?>