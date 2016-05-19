<?php
require_once("InicialController.php");
session_start();
$control = new InicialController();

if (getenv("REQUEST_METHOD") == "GET"){
	global $control;
	$email = $_SESSION['email'];
	$id = $control->getID($email);
	$mural_id = $control->getMuralID($id);
	
	if($_GET['funcao'] == 'getPosts'){
		$quantidade = $_GET['quantidadePosts'];
		
		$publicacoes = $control->getPosts($mural_id, $id, $quantidade);
		$contador = 1;
		$quantidade_publicacoes = mysql_num_rows($publicacoes);
		
		while($row = mysql_fetch_array($publicacoes)){
			global $contador;
			$email = $control->getEmail($row['mural_id']);
			$id_conta = $control->getID($email);
			
			
			$fotoPATH = $control->getFotoPerfil_conta($id_conta);
			$imgSRC = substr($fotoPATH,31);
			
			$fotoPATH_2 = $control->getFotoPost($row['foto_id']);
			$imgSRC_2 = substr($fotoPATH_2,31);
			
			$comentarios = $control->getComentarios($row['publicacao_id']);
			$comentarios_div = "";
			
			$quantidade_comentarios = mysql_num_rows($comentarios);
			
			$nome = $control->getNome($email);
			$sobrenome = $control->getSobrenome($email);
			
			$curtir_id = $control->checaCurtir($row['publicacao_id'], $id);
			$quantidade_curtidas = $control->getCurtidas($row['publicacao_id']);
			
			if($curtir_id != ''){
				$elemento_curtir = '<span class="btn btn-lg glyphicon glyphicon-heart" id="curtir" ></span><span class="badge">'.$quantidade_curtidas.'</span>';
			}else{
				$elemento_curtir = '<span class="btn btn-lg glyphicon glyphicon-heart-empty" id="curtir" ></span><span class="badge">'.$quantidade_curtidas.'</span>';
			}
			
			
			
			while($row2 = mysql_fetch_array($comentarios)){
				global $comentarios_div;
				$conta_id_comentario = $row2['conta_id'];
				$fotoPATH_3 = $control->getFotoPerfil_conta($conta_id_comentario);
				$imgSRC_3= substr($fotoPATH_3,31);
				
				$comentarios_div .= '<div class="media">
										<div class="media-left">
											<a href="perfilUser.php?id='.base64_encode($conta_id_comentario) .'">
											<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src='. $imgSRC_3 .'>
											</a>
										</div>
										<div class="media-body">
											'.$row2['comentario'].'
										</div>
									</div>';
			}
			
			if (($contador - 1)%3 == 0 or $contador == 1 ){ echo '<div class="row">'; };
			
			echo 
				
					'<div class="container-fluid col-sm-4" id="post">
						<div class="col-sm-12 col-xs-12" id="postagem">
							<a href="perfilUser.php?id='.base64_encode($id_conta) .'">
								<img alt="Brand" id="foto" class="img-responsive img-circle" src='. $imgSRC .'>
								<p id="usuarioPost">'. $nome . ' ' . $sobrenome .'  </p>
							</a>
							<a href="#" class="thumbnail">
								<img alt="publicacao" id="imagem" class="img-responsive center-block" src='. $imgSRC_2 .'>
								<figcaption>
									<h5></br></br>'. $row['texto'] .'</h5>
								</figcaption>
							</a>
							
							'.$elemento_curtir.'
							<span class="btn btn-lg glyphicon glyphicon-comment" id="comentar" ></span><span class="badge">'.$quantidade_comentarios.'</span>
										
							<div class="comentarios" id="comentarios">
								
									'. $comentarios_div .'
						
							
							</div>
							<div class="input-group" id="group-comentario">
								<input type="text" class="form-control comentario" placeholder="Insira seu comentário"></input>
								<div class="input-group-btn" id='. $row['publicacao_id'].'><button type="button" class="btn btn-default enviar" id="btn-comentario"><span class="glyphicon glyphicon-send"></span></button></div>
							</div>
						</div>
					</div> ';
			if($contador%3 == 0 or $contador == $quantidade_publicacoes){ echo '</div>'; };
						
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
	
	if($_POST['funcao'] == 'getID'){
		echo base64_encode($id);
		
	}
		
	if($_POST['funcao'] == 'postar'){
		$texto = mysql_real_escape_string($_POST['texto']);
		$imagem = $_POST['imagem'];
			
		$key = $id . date(DATE_RFC822);
		
		$path = $_SERVER['DOCUMENT_ROOT'].'/cz-social/View/pictures/posts/'.md5($key).'.png';
		
		list($meta, $content) = explode(',', $imagem);
		$content = base64_decode($content);
		file_put_contents($path, $content);
		
		$temp = $control->publicar($mural_id, $texto, $path);
		
		echo $temp;
	}

	if($_POST['funcao'] == 'comentar'){
		$texto = mysql_real_escape_string($_POST['texto']);
		$postagem_id = $_POST['postagem_id'];
		
		if( strlen($texto) == 0){
			return false;
		}
			
		$temp = $control->comentar($postagem_id, $texto, $id);
		
		echo $temp;
	}
	
	if($_POST['funcao'] == 'curtir'){
		$postagem_id = $_POST['postagem_id'];
			
		$temp = $control->curtir($postagem_id, $id);
		
		echo $temp;
	}
	
	if($_POST['funcao'] == 'descurtir'){
		$postagem_id = $_POST['postagem_id'];

		$curtir_id = $control->checaCurtir($postagem_id, $id);
		$temp = $control->descurtir($curtir_id);
		
		echo $temp;
	}
	
}

?>
