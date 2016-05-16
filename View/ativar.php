<?php

if(isset ($_GET['id']) == true){
	session_start();


	require_once("../Controller/ativarController.php");

	$control = new ativarController();

	$id = mysql_real_escape_string($_GET['id']);

	$resultado = $control->ativarConta($id);
	
	if($resultado == true){
		$control->apagaAtivar($id);
	}
	
	if($resultado == false ){
		header("Location:../login.php?err=1");
	}
}else{
	header("Location:login.php?err=2");
}

?>




<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	
	<!-- Css -->
	<link rel="stylesheet" href="css/ativar.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
	
	<title> Ativação de Conta </title>
</head>

<body>
	<div class="vertical-center">
		<div class="container">
			<form class="form-horizontal col-sm-offset-4 col-sm-4" action="" id="resetPasswordForm" method="POST" role="form">
				<a href="login.php">
					<img alt="Brand" id="login" class="img-responsive center-block" src="pictures/vdc5.png" width="200" height="200">
				</a>
				<div id="sucessoAtivar" class="row alert alert-success" role="alert">
					<p id="sucessoText"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Sua <strong>conta</strong> foi ativada.</p>
				</div>

				
			</form>
		</div>
	</div>
<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
