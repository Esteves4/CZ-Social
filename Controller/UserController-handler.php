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
		
		
		while($row = mysql_fetch_array($publicacoes)){
			$email = $control->getEmail($row['mural_id']);
			$id_conta = $control->getID($email);
			
			
			$fotoPATH = $control->getFotoPerfil_conta($id_conta);
			$imgSRC = substr($fotoPATH,31);
			
			$fotoPATH_2 = $control->getFotoPost($row['foto_id']);
			$imgSRC_2 = substr($fotoPATH_2,31);
			
			$comentarios = $control->getComentarios($row['publicacao_id']);
			$comentarios_div = "";
			
			
			
			$nome = $control->getNome($email);
			$sobrenome = $control->getSobrenome($email);
			
			while($row2 = mysql_fetch_array($comentarios)){
				global $comentarios_div;
				$conta_id_comentario = $row2['conta_id'];
				$fotoPATH_3 = $control->getFotoPerfil_conta($conta_id_comentario);
				$imgSRC_3= substr($fotoPATH_3,31);
				
				$comentarios_div .= '<div class="media">
										<div class="media-left">
											<a href="#">
											<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src='. $imgSRC_3 .'>
											</a>
										</div>
										<div class="media-body">
											'.$row2['comentario'].'
										</div>
									</div>';
			}
			
			
			echo '
			<div class="container-fluid col-sm-4" id="post">
				<div class="col-sm-12 col-xs-12" id="postagem">
					
					<a href="#" class="thumbnail">
						<img alt="publicacao" id="imagem" class="img-responsive center-block" src='. $imgSRC_2 .'>
						<figcaption>
							<h5></br></br>'. $row['texto'] .'</h5>
						</figcaption>
					</a>
					
					<span class="btn btn-lg glyphicon glyphicon-heart-empty" id="curtir" ></span><span class="badge">5</span>
					<span class="btn btn-lg glyphicon glyphicon-comment" id="comentar" ></span><span class="badge">5</span>
								
					<div class="comentarios" id="comentarios">
						
							'. $comentarios_div .'
				
					
					</div>
					<div class="input-group" id="group-comentario">
						<input type="text" class="form-control comentario" placeholder="Insira seu comentário"></input>
						<div class="input-group-btn" id='. $row['publicacao_id'].'><button type="button" class="btn btn-default enviar" id="btn-comentario"><span class="glyphicon glyphicon-send"></span></button></div>
					</div>
				</div>
			</div> ';
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
	
	if($_POST['funcao'] == 'getPosts'){
		$quantidade = $_POST['quantidadePosts'];

		
		
		$resultado = $control->getPosts($mural_id, $id, $quantidade);

		
		while($row = mysql_fetch_array($resultado) ){
			$fotoPATH = $control->getFotoPerfil($email);
			$imgSRC = substr($fotoPATH,31);
			
			$fotoPATH_2 = $control->getFotoPost($row['foto_id']);
			$imgSRC_2 = substr($fotoPATH_2,31);
			
			echo '
			<div class="container-fluid col-sm-4" id="post">
				<div class="col-sm-12 col-xs-12" id="postagem">
					<a href="#">
						<img alt="Brand" id="foto" class="img-responsive img-circle" src='. $imgSRC .'>
						<p id="usuarioPost"> Lucas Esteves </p>
					</a>
					<a href="#" class="thumbnail">
						<img alt="publicacao" id="imagem" class="img-responsive center-block" src='. $imgSRC_2 .'>
						<figcaption>
							<h5></br></br>'. $row['texto'] .'</h5>
						</figcaption>
					</a>
					
					<span class="btn btn-lg glyphicon glyphicon-heart-empty" id="curtir" ></span><span class="badge">5</span>
					<!--<span class="btn btn-lg glyphicon glyphicon-comment" id="comentar" ></span><span class="badge">5</span> Buga os posts -->
								
					<div class="comentarios" id="comentarios">
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
			</div> ';
		}

		
		
		
		
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
	
}

?>
