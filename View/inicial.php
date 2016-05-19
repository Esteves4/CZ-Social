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

if(isset($_SESSION['email']) == true){
	require_once("../Controller/perfilController.php");
	
	$control2 = new PerfilController();
	
	$email = $_SESSION['email'];
	
	$resultado2 = $control2->checaPerfil($email);
	
	if ($resultado2 == false){
		header("Location:perfil.php");
	}
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
	<link rel="stylesheet" href="css/inicial.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
	
	<title> Página Inicial </title>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" id="menu_toggle" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	<img alt="Brand" id="brand" class="img-responsive img-circle" width="54">
    </div>
 
	<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="" id="nomePerfil"></a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		<li><a href="inicial.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
		<li><a id="icone_postar"><span class="glyphicon glyphicon-camera"></span>&nbsp; Postar</a></li>
		<li><a href="amigos.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Amigos</a></li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp; Novidades&nbsp;<span class="badge">5</span>&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
		
		
		<li><a href="pesquisar.php"><span class="glyphicon glyphicon-search"></span>&nbsp; Pesquisar</a></li>
		<li><a href="perfil.php"><span class="glyphicon glyphicon-edit"></span>&nbsp; Editar Perfil</a></li>
		<li><a href='inicial.php?logout'><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sair</a></li>
      </ul>
    </div>
  </div>
</nav>


<form class="form-horizontal col-sm-4 col-xs-12" id="novo_post" action="" method="POST" role="form" enctype="multipart/form-data">	
	<div class="row" id="image-cropper">
		
		<label id="profileIMG">
			<img class="cropit-preview img-responsive img-thumbnail center-block" id="imagemPerfil">
		</label>		
		
		<div class="slider-wrapper input-group" id="zoom">
			<div class="input-group-addon"><span class="glyphicon glyphicon-zoom-out"></span></div>
			<input type="range" class="cropit-image-zoom-input form-control"/>
			<div class="input-group-addon"><span class="glyphicon glyphicon-zoom-in"></span></div>
			
		</div>
		
		
		<input type="file" id="ImgInput" class="cropit-image-input"/>
	</div>
	<div class="row">
		<input type="text" class="form-control" id="legenda" placeholder="Legenda"></input>
	</div>
	<div class="row">
		<button id="postar" class="btn btn-success btn-block" type="submit" autocomplete="off" data-loading-text="Postando..." >Postar</button>
	</div>
	
	<div id="sucessoPostar" class="row alert alert-info" role="alert">
		<p id="sucessoText"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong> Postagem</strong> realizada com sucesso.</p>
	</div>
	<div id="erroC" class="row alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="erroTextP"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ops.. Ocorreu um <strong>erro</strong>. Tente Novamente.</p>
	</div>	
	
	<a id="cancelar" > <span class="glyphicon glyphicon-remove"></span></a>


</form>

<div id="black" class="col-sm-12"></div>
<div id="publicacoes"></div>


<span class="btn btn-info center-block" id="carregar_posts">Carregar mais publicações.</span>


	

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.7.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.cropit.js"></script>
<script src="js/inicial.js"></script>


</body>
</html>
