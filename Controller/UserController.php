<?php

class UserController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
		
	}
	
		
	public function getID($email){
		global $db_model;
		$temp = $this->db_model->getID($email);
		
		return $temp;
	}

	public function adicionaSolicitacao($id, $amigo_id){		
		$temp = $this->db_model->adicionaSolicitacao($id, $amigo_id);
		
		return $temp;
	}
	
	public function removeSolicitacao($amigo_id, $id){		
		$temp = $this->db_model->removeSolicitacao($amigo_id, $id);
		
		return $temp;
	}
	
	public function adicionaAmigo($id, $amigo_id){		
		$temp = $this->db_model->adicionaAmigo($id, $amigo_id);
		
		return $temp;
	}
	
	public function removeAmigo($id, $amigo_id){		
		$temp = $this->db_model->apagaAmigo($id, $amigo_id);
		
		return $temp;
	}
	
	public function getNome($email){		
		$temp = $this->db_model->getNome($email);
		
		return $temp;
	}

	public function getSexo($email){
		$id_perfil = $this->db_model->getPerfilID($email);
		
		$temp = $this->db_model->getSexo($id_perfil);
		
		return $temp;
	}

	public function getDataN($email){
		
		$temp = $this->db_model->getDataN($email);
		
		return $temp;
	}
	
	public function getSolicitacaoAmizade($id, $id_amigo){
		$temp = $this->db_model->getSolicitacaoAmizade($id, $id_amigo);
		
		return $temp;
	}
	
	public function getAmigo($id, $id_amigo){
		$temp = $this->db_model->getAmizade($id, $id_amigo);
		
		return $temp;
	}
	
	public function getEndereco($email){
		$id_perfil = $this->db_model->getPerfilID($email);
		
		$cidade_id = $this->db_model->getCidadeID($id_perfil);
		
		$temp = $this->db_model->getNomeCidadeEstado($cidade_id);
		
		return $temp;
	}
	
	public function getSobrenome($email){
		$temp = $this->db_model->getSobrenome($email);
		
		return $temp;
	}
	
	public function getFotoPerfil($email){
		$id_perfil = $this->db_model->getPerfilID($email);
		
		$id_foto = $this->db_model->getFotoPerfilID($id_perfil);
		
		$caminho = $this->db_model->getFoto($id_foto);
		
		return  $caminho;
	}
	
	public function getFotoPerfil_conta($id_conta){
		$id_perfil = $this->db_model->getPerfilID_conta($id_conta);
		
		$id_foto = $this->db_model->getFotoPerfilID($id_perfil);
			
		$caminho = $this->db_model->getFoto($id_foto);
		
		return  $caminho;
	}
	
	public function getFotoPost($id_foto){		
		$caminho = $this->db_model->getFoto($id_foto);
		
		return  $caminho;
	}
	
	public function getEmail($id_conta){	
		$temp = $this->db_model->getEmail($id_conta);
		
		return  $temp;
	}
	
	
	public function checaPerfil($email){
		$temp = $this->db_model->perfilExiste($email);
		
		return $temp;
	}
		
	public function getMuralID($id_conta){
		$temp = $this->db_model->getMuralID($id_conta);
		
		return $temp;
	}
	
	public function publicar($mural, $texto, $path){
		$id_foto = $this->db_model->adicionaFotos($path);		
		$temp = $this->db_model->adicionaPublicacao($mural, $texto, $id_foto);
		
		return $temp;
	}
	
	public function comentar($postagem_id, $texto, $conta_id){		
		$temp = $this->db_model->adicionaComentario($texto, $conta_id, $postagem_id);
		
		return $temp;
	}
	
	public function curtir($postagem_id, $conta_id){		
		$temp = $this->db_model->adicionaCurtir($postagem_id, $conta_id);
		
		return $temp;
	}
	
	public function descurtir($curtir_id){		
		$temp = $this->db_model->apagaCurtir($curtir_id);
		
		return $temp;
	}
	
	public function getPosts($mural_id, $conta_id, $quantidade){
		$posts = $this->db_model->getPublicacoes($mural_id, $conta_id, $quantidade);

		return $posts;
	}
	
	public function getPostsMural($mural_id, $quantidade){
		$posts = $this->db_model->getPublicacoesMural($mural_id, $quantidade);

		return $posts;
	}
	
	public function getComentarios($publicacao_id){
		$comments = $this->db_model->getComentarios($publicacao_id);

		return $comments;
	}
	
	public function getCurtidas($publicacao_id){
		$temp = $this->db_model->getCurtidas($publicacao_id);

		return $temp;
	}
	
	public function checaCurtir($publicacao_id, $id_conta){
		$temp = $this->db_model->checaCurtir($publicacao_id, $id_conta);

		return $temp;
	}
	
	public function adicionaNovidade($conta_id, $id, $tipo,$postagem_id){
		$temp = $this->db_model->adicionaNovidade($conta_id, $id, $tipo,$postagem_id);

		return $temp;
	}
}
	
?>