<?php
session_start();


if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header("Location:login.php?status=forbidden");
}

if(isset($_SESSION['email']) == true){
	require_once("../Controller/ativarController.php");

	$control = new ativarController();
	$email = $_SESSION['email'];
	
	$resultado = $control->checaStatus($email);
	
	if ($resultado != 'T'){
		header("Location:login.php?status=ativar_required");
	}

}

$logado = $_SESSION['email'];
//if logout then destroy the session and redirect the user
if(isset($_GET['logout'])){
  session_destroy();
  header("Location:login.php");
}
echo " <a href='secure.php?logout'><b>Logout<b></a> ";
echo " <div align='center'>You Are inside secured Page</a> ";
 ?>