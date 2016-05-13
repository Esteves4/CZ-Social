<?php
session_start();


if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header("Location:login.php?status=forbidden");
}

if(isset($_SESSION['email']) == true){
	require_once("../Controller/ativarController.php");
	require_once("../Controller/perfilController.php");
	
	$control = new ativarController();
	$control2 = new PerfilController();
	
	$email = $_SESSION['email'];
	
	$resultado = $control->checaStatus($email);
	$resultado2 = $control2->checaPerfil($email);
	
	if ($resultado2 == false){
		header("Location:perfil.php");
	}else{
		header("Location:inicial.php");
	}
	
	if ($resultado != 'T'){
		header("Location:login.php?status=ativar_required");
	}
	


}

 ?>