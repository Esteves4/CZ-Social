<?php
require_once("UserController.php");
session_start();
$control = new UserController();

if (getenv("REQUEST_METHOD") == "GET"){
	global $control;
	$email = $_SESSION['email'];
	$id = $control->getID($email);
	$mural_id = $control->getMuralID($id);
	
	if($_GET['funcao'] == 'getPosts'){
		$quantidade = $_GET['quantidadePosts'];
		$id_conta =  base64_decode($_GET['id']);
		$mural_id = $control->getMuralID($id_conta);
		
		$publicacoes = $control->getPostsMural($mural_id, $quantidade);
		$contador = 1;
		$quantidade_publicacoes = mysql_num_rows($publicacoes);
		
		while($row = mysql_fetch_array($publicacoes)){
			global $contador;
			
			
			$fotoPATH_2 = $control->getFotoPost($row['foto_id']);
			$imgSRC_2 = substr($fotoPATH_2,31);
			
			$comentarios = $control->getComentarios($row['publicacao_id']);
			$comentarios_div = "";
			
			$quantidade_comentarios = mysql_num_rows($comentarios);
			
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
											<a href="#">
											<img alt="Brand" id="perfilComent" class="media-object img-responsive img-thumbnail img-circle" src='. $imgSRC_3 .'>
											</a>
										</div>
										<div class="media-body">
											'.$row2['comentario'].'
										</div>
									</div>';
			}
			
			if (($contador - 1)%3 == 0 or $contador == 1 ){ echo '<div class="row">'; };
			
			echo'<div class="container-fluid col-sm-4" id="post">
						<div class="col-sm-12 col-xs-12" id="postagem">
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
	
	if($_GET['funcao'] == 'getStatusAmizade'){
		$id_amigo =  base64_decode($_GET['id']);
				
		$solicitacao = $control->getSolicitacaoAmizade($id, $id_amigo);
		
		if ( $id_amigo == $id ){
			
			echo ''; 
			
		}else if($solicitacao == 'aceitar'){
			
			echo '<span class="btn btn-warning center-block" id="aceitar_amizade">Aceitar Amizade</span>'; 
			
		}else if($solicitacao == 'true'){ 
		
			echo '<span class="btn btn-success disabled center-block" id="solicitacao_enviada">Solicitação Enviada</span>'; 
		
		}else{
			$amizade = $control->getAmigo($id, $id_amigo);
			
			if($amizade == true){
				echo '<span class="btn btn-danger center-block" id="remover_amizade">Remover amigo</span>'; 
			}else{
				echo '<span class="btn btn-info center-block" id="adiconar_amigo">Adicionar como amigo</span>'; 
			}
			
		}
			
			
	
	}
	

}



if (getenv("REQUEST_METHOD") == "POST"){
	global $control;
	$email = $_SESSION['email'];
	$id = $control->getID($email);
	$mural_id = $control->getMuralID($id);
	
	if($_POST['funcao'] == 'nomePerfil'){
		if(isset($_POST['id']) == true){
			$id_conta = base64_decode($_POST['id']);
			$email = $control->getEmail($id_conta);
		}
				
		$nome = $control->getNome($email);
		$sobrenome = $control->getSobrenome($email);
			
		echo $nome .' '. $sobrenome;
	}

	if($_POST['funcao'] == 'sexo'){
		if(isset($_POST['id']) == true){
			$id_conta = base64_decode($_POST['id']);
			$email = $control->getEmail($id_conta);
		}
				
		$nome = $control->getSexo($email);
		
		if($nome == 'M'){
			echo 'Masculino';
		}else{
			echo 'Feminino';
		}
	}
	
	if($_POST['funcao'] == 'dataN'){
		if(isset($_POST['id']) == true){
			$id_conta = base64_decode($_POST['id']);
			$email = $control->getEmail($id_conta);
		}
				
		$temp = $control->getDataN($email);
		
		$data = date("d/m/Y",strtotime(str_replace('-','/',$temp)));  
		
		echo $data;
	}
	
	if($_POST['funcao'] == 'endereco'){
		if(isset($_POST['id']) == true){
			$id_conta = base64_decode($_POST['id']);
			$email = $control->getEmail($id_conta);
		}
				
		$temp = $control->getEndereco($email);
				
		echo $temp;
	}
	
	if ($_POST['funcao'] == 'foto'){
		if(isset($_POST['id']) == true){
			$id_conta = base64_decode($_POST['id']);
			$email = $control->getEmail($id_conta);
		}		
				
		$perfil_id = $control->checaPerfil($email);
				
		if($perfil_id == false){
			echo 'pictures/200x200.jpg';
		}else{
			$fotoPATH = $control->getFotoPerfil($email);
		
			$imgSRC = substr($fotoPATH,31);
			
			echo $imgSRC;
		}
		
	}
	
	if($_POST['funcao'] == 'adicionarAmigo'){
		$amigo_id = base64_decode($_POST['amigo_id']);

		$solicitacao = $control->adicionaSolicitacao($id, $amigo_id);
		
		if($solicitacao == true and $amigo_id != $id){
			$temp = $control->adicionaNovidade($amigo_id, $id, 3,null);
		}
		
		echo $solicitacao;
	}
	
	if($_POST['funcao'] == 'aceitarAmizade'){
		$amigo_id = base64_decode($_POST['amigo_id']);

		$solicitacao = $control->adicionaAmigo($id, $amigo_id);
		$solicitacao2 = $control->adicionaAmigo($amigo_id, $id);
		
		if( $solicitacao == true and $solicitacao2 = true){
			$temp = $control->removeSolicitacao($amigo_id, $id);
			echo $temp;
		}else{
			echo false;
		}
		
	}
	
	if($_POST['funcao'] == 'removerAmizade'){
		$amigo_id = base64_decode($_POST['amigo_id']);

		$solicitacao = $control->removeAmigo($id, $amigo_id);
		$solicitacao2 = $control->removeAmigo($amigo_id, $id);
		
		if( $solicitacao == true and $solicitacao2 = true){
			echo true;
		}else{
			echo false;
		}
		
	}
	
}

?>
