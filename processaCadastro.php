<?php
  require("conecta.php");
 
 
$nome = mysql_real_escape_string($_POST['nome']);
$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
$dataN = mysql_real_escape_string($_POST['dataN']);
$email = mysql_real_escape_string($_POST['email']);
$senha = md5(mysql_real_escape_string($_POST['senha']));

mysql_query("INSERT INTO contas(nome,sobrenome,data_nascimento,email,senha) VALUES('$nome','$sobrenome','$dataN','$email','$senha')");

header("Location: login");

?>