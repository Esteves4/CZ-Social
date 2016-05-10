<?php
class PerfilController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
	}
	
	public function getNome($email){
		global $db_model;
		
		$temp = $this->db_model->getNome($email);
		
		return $temp;
	}

	public function getSobrenome($email){
		$temp = $this->db_model->getSobrenome($email);
		
		return $temp;
	}
	
	public function getData($email){
		$temp = $this->db_model->getDataN($email);
		
		return $temp;
	}
	
	public function getEstados(){
		$temp = $this->db_model->getEstados();
		
		return $temp;
	}
	
	public function getCidades($estado_id){
		$temp = $this->db_model->getCidades($estado_id);
		
		return $temp;
	}
	
	public function getFotoPerfil($email){
		$id_perfil = $this->db_model->getPerfilID($email);
		
		$id_foto = $this->db_model->getFotoPerfilID($id_perfil);
		
		$caminho = $this->db_model->getFoto($id_foto);
		
		return  $caminho;
	}
	
	public function getID($email){
		$temp = $this->db_model->getID($email);
		
		return $temp;
	}
	
	public function atualizaNome($nome,$email){
		$temp = $this->db_model->setNome($nome,$email);
		
		return $temp;
	}
	
	public function atualizaSobrenome($sobrenome,$email){
		$temp = $this->db_model->setSobrenome($sobrenome,$email);
		
		return $temp;
	}
	
	public function atualizaDataN($dataN,$email){
		$temp = $this->db_model->setDataN($dataN,$email);
		
		return $temp;
	}
	
	public function criaPerfil($email,$sexo,$cidade_id,$imagem){
		
		$id_imagem = $this->db_model->adicionaFotos($imagem);
		$id_perfil = $this->db_model->adicionaPerfil($sexo,$id_imagem,$cidade_id);
		$temp = $this->db_model->setPerfilID($email,$id_perfil);
		
		return $temp;
	}
}

?>