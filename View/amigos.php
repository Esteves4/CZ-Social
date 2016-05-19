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
	<link rel="stylesheet" href="css/amigos.css">
	
	<!-- Fonte -->
	<link href='https://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
	
	<title> Amigos </title>
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
        <li><a href="perfilUser" id="nomePerfil"></a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		<li><a href="inicial.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
		<li><a href="amigos.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Amigos</a></li>
		<li><a href="pesquisar.php"><span class="glyphicon glyphicon-search"></span>&nbsp; Pesquisar</a></li>
		<li><a href="perfil.php"><span class="glyphicon glyphicon-edit"></span>&nbsp; Editar Perfil</a></li>
		<li><a href='inicial.php?logout'><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" id="amigos"></div>

<span class="btn btn-info center-block" id="carregar_amigos">Carregar mais Amigos.</span>



<!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/amigos.js"></script>


</body>
</html>
