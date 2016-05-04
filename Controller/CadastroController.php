<?php
class CadastroController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
	}
	
	public function adicionar($nome, $sobrenome, $dataN, $email, $senha){
		global $db_model;
		$temp = $this->db_model->adicionaConta($nome, $sobrenome, $dataN, $email, md5($senha));
		return $temp;
	}
	
	public function checaEmail($email){
		$temp = $this->db_model->emailExiste($email);
		return $temp;
	}
}

?>