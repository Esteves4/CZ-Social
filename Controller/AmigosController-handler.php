<?php
require_once("AmigosController.php");
session_start();
$control = new AmigosController();

if (getenv("REQUEST_METHOD") == "GET"){
	global $control;
	$email = $_SESSION['email'];
	$id = $control->getID($email);
	$mural_id = $control->getMuralID($id);
	
	if($_GET['funcao'] == 'getAmigos'){
		$quantidade = $_GET['quantidadeAmigos'];

		$amigos = $control->getAmigos($id, $quantidade);
		$contador = 1;
		
		$quantidade_amigos = mysql_num_rows($amigos);
		
		
		while($row = mysql_fetch_array($amigos)){
			global $contador;
			$id_conta = $row['conta_id'];
			
			$fotoPATH = $control->getFotoPerfil_conta($id_conta);
			$imgSRC = substr($fotoPATH,31);
			
			$nome = $row['nome'];
			$sobrenome = $row['sobrenome'];			
			
			if (($contador - 1)%3 == 0 or $contador == 1 ){ echo '<div class="container-fluid col-sm-offset-2 col-sm-10">'; };
			
			echo'<div class="col-sm-2" id="post">
					<a href="perfilUser.php?id='.base64_encode($id_conta).'"><img id="foto" class="img-responsive img-circle center-block" src='.$imgSRC.'>
					<h4>'. $nome .' '.$sobrenome.'</h4></a>
				</div>';
					
			if($contador%5 == 0 or $contador == $quantidade_amigos){ echo '</div>'; };
						
			$contador++;
		}
	
	}
	
}



if (getenv("REQUEST_METHOD") == "POST"){
	global $control;
	$email = $_SESSION['email'];
	$id = $control->getID($email);
	$mural_id = $control->getMuralID($id);
	
	if($_POST['funcao'] == 'nomePerfil'){
		$nome = $control->getNome($email);
		$sobrenome = $control->getSobrenome($email);
			
		echo $nome .' '. $sobrenome;
	}
	
	if ($_POST['funcao'] == 'foto'){
		$perfil_id = $control->checaPerfil($email);
		
		
		if($perfil_id == false){
			echo 'pictures/200x200.jpg';
		}else{
			$fotoPATH = $control->getFotoPerfil($email);
		
			$imgSRC = substr($fotoPATH,31);
			
			echo $imgSRC;
		}
		
	}
}

?>
