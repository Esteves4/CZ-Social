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
		<form class="form-horizontal col-sm-offset-4 col-sm-4" role="form" action="login.php" method="POST">
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
						<input class="form-control" type="email"  id="email" placeholder="Digite o email">
						<div class="input-group-addon"></div>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div >
					<label class="sr-only" for="senha"></label>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
							<input class="form-control" type="password" id="senha" placeholder="Digite a senha">
						<div class="input-group-addon"></div>
					</div>
										
				</div>
			</div>
			<div class="row">
				<div>
				<label id="remember"><input type="checkbox"> Lembre-se de mim</label>
				</div>
			</div>
			<div class="row">
				<div>
				<button id="entrar" class="btn btn-success btn-block" type="submit">Entrar</button>
				</div>
			</div>
			
			<div class="row">
				<a href="#" id="cadastrar" class="btn btn-info col-sm-6 " type="button">Registrar-se</a>
				<a href="#" id="esqueciSenha" class="btn btn-link col-sm-6" type="button">Esqueceu a senha?</a>				
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
