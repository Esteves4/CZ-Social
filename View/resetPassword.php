<?php

if(isset ($_GET['id']) == true){
	session_start();


	require_once("../Controller/ResetPasswordController.php");

	$control = new ResetPasswordController();

	$id = mysql_real_escape_string($_GET['id']);

	$resultado = $control->checaReset($id);
	
	if($resultado == false ){
		header("Location:../login?err=1");
	}
}else{
	header("Location:login?err=2");
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
	<link rel="stylesheet" href="css/resetPassword.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
	
	<title> Redefinir Senha </title>
</head>

<body>
	<div class="vertical-center">
		<div class="container">

			<form class="form-horizontal col-sm-offset-4 col-sm-4" action="" id="resetPasswordForm" method="POST" role="form">
				<a href="login">
					<img alt="Brand" id="login" class="img-responsive center-block" src="pictures/LogoCz2.png" width="200" height="200">
				</a>
				<div class="row">
						<div class="input-group" id="group-email" data-toggle="tooltip" data-placement="right" title="Confirme seu email." data-trigger="hover" data-container="body" >
							<input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="addon3" required>
							<div class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-envelope"></span></div>
						</div>
				</div>
				<div class="row">
						<div class="input-group" id="group-senha" data-toggle="tooltip" data-placement="right" title="Digite a nova senha aqui." data-trigger="hover" data-container="body">
							<input type="password" id="senha" name="senha"class="form-control" placeholder="Senha" aria-describedby="addon4" required>
							<div class="input-group-addon" id="addon4"><span class="glyphicon glyphicon-lock"></span></div>
						</div>
				</div>
				<div class="row">
						<div class="input-group" id="group-conf-senha" data-toggle="tooltip" data-placement="right" title="As senhas digitadas não conferem." data-trigger="manual" data-container="body">

							<input type="password" id="confSenha" class="form-control" placeholder="Confirme a Senha" aria-describedby="addon5" required>
							
							<div class="input-group-addon" id="addon5"><span id="icone" class="glyphicon glyphicon-exclamation-sign"></span></div>
						</div>
				</div>
				<div class="row">
					<button class="btn btn-success btn-block col-sm-6" autocomplete="off" data-loading-text="Redefinindo.." id="redefinir" type="submit">Redefinir</button>
				</div>

				<div id="erroC" class="row alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p id="erroTextP"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ops.. Ocorreu um <strong>erro</strong>. Tente Novamente.</p>
				</div>
				<div id="sucessoRedefinir" class="row alert alert-success" role="alert">
					<p id="sucessoText2"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Sua <strong>senha</strong> foi alterada.</p>
				</div>

				
			</form>

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>


<!--Javascript para validar informações digitadas no login-->
<script src="js/validaResetPassword.js"></script>

</body>
</html>
