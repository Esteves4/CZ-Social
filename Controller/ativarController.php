<?php
class ativarController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();	
	}
	
	public function checaStatus($email){
		global $db_model;
		$resultado = $this->db_model->checaStatus($email);
		
		return $resultado;
	}
	
	public function ativarConta($id){
		$email = $this->db_model->getAtivarEmail($id);
		$resultado = $this->db_model->ativarConta($email);
		
		return $resultado;
	}
	
	public function apagaAtivar($id){
		$email = $this->db_model->getAtivarEmail($id);
		$resultado = $this->db_model->apagaAtivar($email);
		
		return $resultado;
	}
}

?>