<?php

class InicialController{
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
		
	public function getMuralID($id_conta){
		$temp = $this->db_model->getMuralID($id_conta);
		
		return $temp;
	}
	
	public function publicar($mural, $texto, $path){
		$id_foto = $this->db_model->adicionaFotos($path);		
		$temp = $this->db_model->criaPublicacao($mural, $texto, $id_foto);
		
		return $temp;
	}

}
	
?>