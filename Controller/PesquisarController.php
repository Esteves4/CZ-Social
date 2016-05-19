<?php

class PesquisarController{
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

	public function getContas($nome, $quantidade){
		$temp = $this->db_model->getContas($nome, $quantidade);
		
		return $temp;
	}
	
	public function getNome($email){		
		$temp = $this->db_model->getNome($email);
		
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
}
	
?>