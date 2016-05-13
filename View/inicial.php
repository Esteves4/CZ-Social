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
	
	<!-- Css -->
	<link rel="stylesheet" href="css/inicial.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
	
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
        <li><a href="perfil" id="nomePerfil"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="inicial"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
		<li ><a id="icone_postar"><span class="glyphicon glyphicon-camera"></span>&nbsp; Postar</a></li>
		<li><a href="amigos"><span class="glyphicon glyphicon-user"></span>&nbsp; Amigos</a></li>
		<li><a href="novidades"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp; Novidades&nbsp;<span class="badge">5</span></a></li>
		<li><a href="pesquisa"><span class="glyphicon glyphicon-search"></span>&nbsp; Pesquisa</a></li>
		<li><a href="configuracoes"><span class="glyphicon glyphicon-edit"></span>&nbsp; Editar Perfil</a></li>
		<li><a href='inicial.php?logout'><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sair</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="col-sm-4 col-xs-12" id="novo_post">	
	<div class="row" id="image-cropper">
		<label for="ImgInput" id="profileIMG">
			<img class="cropit-preview img-responsive img-thumbnail center-block" id="imagemPerfil">
		</label>		
		<div class="slider-wrapper input-group" id="zoom">
			<div class="input-group-addon"><span class="glyphicon glyphicon-minus-sign"></span></div>
			<input type="range" class="cropit-image-zoom-input form-control"/>
			<div class="input-group-addon"><span class="glyphicon glyphicon-plus-sign"></span></div>
		</div>
		
		<input type="file" id="ImgInput" class="cropit-image-input"/>
	</div>		

	<input type="text" class="form-control" id="legenda" placeholder="Legenda"></input> 
	
	<div class="row">
		<button id="Postar" class="btn btn-success btn-block" >Postar</button>
	</div>
	<a id="cancelar" > <span class="glyphicon glyphicon-option-horizontal"></span></a>

</div>

<div id="black" class="col-sm-12"></div>
<div class="container-fluid col-sm-4" id="post">
	<div class="col-sm-12 col-xs-12" id="postagem">
		<img alt="Brand" id="foto" class="img-responsive img-circle" src="pictures/perfil1.png">
		<a href="#" class="thumbnail">
			<img alt="publicacao" id="imagem" class="img-responsive center-block" src="pictures/background2.png">
			<figcaption>
				<h5></br></br>Gostei muito de conhecer o parque do Pequeno Príncipe, tudo muito fofo e realmente infantil. Espero algum dia levar minhas crianças pra conhecer tamanha beleza e simplicidade, pois como diz a raposa: "O essencial é invisível aos olhos." Livro excelente, recomendo!</h5>
			</figcaption>
		</a>
		<div id="comentarios">
			<div class="media">
				<div class="media-left">
					<a href="#">
					<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src="pictures/perfil1.png">
					</a>
				</div>
				<div class="media-body">
					Isso é um comentário.
				</div>
			</div>
			<div class="media">
				<div class="media-left">
					<a href="#">
					<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src="pictures/perfil1.png">
					</a>
				</div>
				<div class="media-body">
					Isso é um comentário.
				</div>
			</div>
			<div class="media">
				<div class="media-left">
					<a href="#">
					<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src="pictures/perfil1.png">
					</a>
				</div>
				<div class="media-body">
					Isso é um comentário.
				</div>
			</div>
		
		</div>
		<div class="input-group" id="group-comentario">
			<input type="text" class="form-control" placeholder="Insira seu comentário"></input>
			<div class="input-group-btn" id="addon2"><button type="button" class="btn btn-default" id="btn-comentario"><span class="glyphicon glyphicon-send"></span></button></div>
		</div>
			
	
	</div>
	

</div>




	

<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.cropit.js"></script>
<script src="js/inicial.js"></script>


</body>
</html>
