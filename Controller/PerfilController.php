<?php
class PerfilController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
		session_start();	
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
		$blob = $this->db_model->getFoto($id_foto);
		
		
		$foto = imagecreatefromstring($blob);
		
		ob_start();
		imagejpeg($foto, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		
		return  base64_encode($data);
	}
}

?>