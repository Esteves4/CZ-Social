<?php
class ResetPasswordController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();	
	}
	
	public function checaReset($id_md5){
		global $db_model;
		$resultado = $this->db_model->permiteReset($id_md5);
		
		return $resultado;
	}
	
	public function trocaSenha($email,$senha){
		$resultado = $this->db_model->resetSenha($email,md5($senha));
		
		return $resultado;
	}
	
	public function zeraReset($email){
		$resultado = $this->db_model->apagaReset($email);
		
		return $resultado;
	}
}

?>