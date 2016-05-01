<?php
  require("conecta.php");
 
 
$nome = mysql_real_escape_string($_POST['nome']);
$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
$dataN = mysql_real_escape_string($_POST['data']);
$email = mysql_real_escape_string($_POST['email']);
$senha = md5(mysql_real_escape_string($_POST['senha']));

$resultado = mysql_query("INSERT INTO contas(nome,sobrenome,data_nascimento,email,senha) VALUES('$nome','$sobrenome','$dataN','$email','$senha')");

if( $resultado == true){
	echo 0;
}else{
	echo 1;
}

?>