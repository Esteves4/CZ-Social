<?php
require("conecta.php");
 
$email = mysql_real_escape_string($_POST['email']);

$resultado = mysql_query("SELECT email FROM contas where email = '$email'");

if(mysql_num_rows($resultado) > 0){
	echo 1;
}else{
	echo 0;
}
?>