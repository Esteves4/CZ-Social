<?php
require_once("PerfilController.php");
session_start();
$control = new PerfilController();

if (getenv("REQUEST_METHOD") == "GET"){
	global $control;
	$estado_id = mysql_real_escape_string($_GET['estado_id']);
		
	$resultado = $control->getCidades($estado_id);

	while($row = mysql_fetch_array($resultado)){
		echo "<option value='".$row['cidade_id']."'>".$row['cidade_nome']."</option>";
	}
}

if (getenv("REQUEST_METHOD") == "POST"){
	global $control;
	$nome = mysql_real_escape_string($_POST['nome']);
	$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
	$dataN = mysql_real_escape_string($_POST['data']);
	$sexo = mysql_real_escape_string($_POST['sexo']);
	$cidade_id = mysql_real_escape_string($_POST['cidade_id']);
	$email = $_SESSION['email'];
	$imagem = $_POST['imagemBLOB'];
	
	$uri = substr($imagem,strpos($imagem,",")+1);
	
	$datadecoded = base64_decode($uri);
	
	$control->atualizaNome($nome,$email);
	$control->atualizaSobrenome($sobrenome,$email);
	$control->atualizaDataN($dataN,$email);
	$control->criaPerfil($email,$sexo,$cidade_id,$datadecoded);
	
}

?>