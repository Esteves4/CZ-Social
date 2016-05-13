<?php
session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header("Location:login.php?status=forbidden");
}

if(isset($_GET['logout'])){
  session_destroy();
  header("Location:login.php");
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
	<link href="css/bootstrap-datepicker.standalone.css" rel="stylesheet">
		
	<!-- Css -->
	<link rel="stylesheet" href="css/perfil.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
	
	<title> Editar Perfil </title>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	<img alt="Brand" id="brand" class="img-responsive img-circle" width="54">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="perfil" id="nomePerfil"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		
		<li><a href='perfil.php?logout'><span class="glyphicon glyphicon-log-out"></span>&nbsp; Sair</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="vertical-center">
		<div class="container">
			<form class="form-horizontal col-sm-offset-4 col-sm-4" action="" id="perfilForm" method="POST" role="form" enctype="multipart/form-data">
				<div class="row" id="image-cropper">
					<label for="ImgInput" id="profileIMG">
						<img class="cropit-preview img-responsive img-thumbnail center-block" id="imagemPerfil">
					</label>	
										
						<div class="slider-wrapper input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-minus-sign"></span></div>
							<input type="range" class="cropit-image-zoom-input form-control"/>
							<div class="input-group-addon"><span class="glyphicon glyphicon-plus-sign"></span></div>
						</div>
					
					<input type="file" id="ImgInput" class="cropit-image-input" />
				</div>				
				<div class="row">
					<div class="input-group" id="group-nome">
						<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="">
						<input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Sobrenome" value="">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
					</div>
				</div>
				<div class="row" id="sandbox-container">
						<div class="input-group date" id="group-data">
							<input type="text" class="form-control" id="data" name="dataN" placeholder="Data de Nascimento" aria-describedby="addon2" required  value="">
							<div class="input-group-btn" id="addon2"><button type="button" class="btn btn-default" id="btn-data" data-toggle="popover" data-trigger="hover" data-container="body" data-placement="right" data-content="Clique aqui para escolher a data."><span class="glyphicon glyphicon-calendar"></span></button></div>
							<select class="form-control" id="sexo">
								<option value="null">Sexo</option>
								<option value="F">Feminino</option>
								<option value="M">Masculino</option>
							</select>
						</div>
				</div>
				<div class="row">
					<div class="input-group">
						<select class="form-control" name="estados" id="estados">
						</select>
						<select class="form-control" name="cidades" id="cidades">
							<option value="null">Escolha uma Cidade</option>
						</select>
					</div>
				</div>
				<div class="row">
					<button id="salvar" class="btn btn-success btn-block" type="submit" autocomplete="off" data-loading-text="Registrando ..." >Salvar</button>
				</div>	
				<div id="sucessoPerfil" class="row alert alert-success" role="alert">
					<p id="sucessoText"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong> Perfil</strong> salvo com sucesso.</p>
				</div>
				<div id="erroC" class="row alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p id="erroTextP"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ops.. Ocorreu um <strong>erro</strong>. Tente Novamente.</p>
				</div>				
			</div>
		</div>
</div>

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="js/jquery.cropit.js"></script>
<script src="js/perfil.js"></script>

</body>
</html>
