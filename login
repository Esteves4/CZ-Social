<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, inicial-scale=1">
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<!-- Css -->
	<link rel="stylesheet" href="css/login.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
	
	<title> Login </title>
</head>

<body>

	
<div class="vertical-center">
	<div class="container">
		<form class="form-horizontal col-sm-offset-4 col-sm-4" role="form" action="processaLogin.php" method="POST">
			<div class="row">
				<div >
					<h3 id="login">Login</h3>
				</div>
			</div>
			<div class="row">
				<div >
					<label class="sr-only control-label" for="email"></label>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
						<input class="form-control" type="email" name="email" id="email" placeholder="Digite o e-mail">
						<div class="input-group-addon"></div>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div >
					<label class="sr-only" for="senha"></label>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
							<input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a senha">
						<div class="input-group-addon"></div>
					</div>
										
				</div>
			</div>
			<div class="row">
				<label id="remember"><input name="conectado" value="true" type="checkbox"> Manter conectado</label>
			</div>
			<div class="row">
				<div>
				<button id="entrar" class="btn btn-success btn-block" type="submit">Entrar</button>
				</div>
			</div>
			
			<div class="row">
				<a href="cadastrar" id="cadastrar" class="btn btn-info col-sm-6 " type="button">Registrar-se</a>
				<a href="reset" id="esqueciSenha" class="btn btn-link col-sm-6" type="button">Esqueceu a senha?</a>				
			</div>
			
			<div id="erro" class="row alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="erroText">Shiii.. O campo <strong>e-mail</strong> é obrigatório.</p>
			</div>
			
			<div id="erro2" class="row alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="erroText2">Shiii.. O campo <strong>senha</strong> é obrigatório.</p>
			</div>
		</form>
		
	</div>
</div>


<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

<!--Javascript para validar informações digitadas no login-->
<script src="js/validaLogin.js"></script>

</body>
</html>
