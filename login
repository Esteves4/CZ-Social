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

<div class="flex-align">

<form class="form-horizontal" role="form" action="login.php" method="POST" onSubmit="return validaLogin(this)">

<div class="row">
<div class="col-sm-offset-4 col-sm-4">
	<!--<label class="control-label col-sm-4" for="email"><span class="glyphicon glyphicon-envelope"> </span></label>-->
	<label class="sr-only control-label" for="email"></label>
	<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
	<input class="form-control" type="email"  id="email" placeholder="Digite o email">
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-offset-4 col-sm-4">
	<label class="sr-only" for="senha"></label>
	<div class="input-group">
		<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
 	<input class="form-control" type="password" id="senha" placeholder="Digite a senha">
	</div>
</div>
</div>
<div class="row">
		<div class="checkbox col-sm-offset-4 col-sm-4">
			<label><input type="checkbox">Lembre-se de mim</label>
		</div>
</div>
<div class="row">
	<div class="col-sm-offset-4 col-sm-4">
		<button class="btn btn-default" type="submit">Entrar</button>
	</div>

</div>

</form>

</div>


<!--Javascript para validar informações digitadas no login-->
<script src="js/validaLogin.js"></script>

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
