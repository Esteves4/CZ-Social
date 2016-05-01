<?php
class CadastroController{
	private $db_model;
	
	public __construct(){
		require_once("../Model/DBAccess_model.php");
		$db_model = new DBAccess();
	}
	
	public adicionar($nome, $sobrenome, $dataN, $email, $senha){
		$temp = $db_model->adicionaConta($nome, $sobrenome, $data, $email, md5($senha));
		return $temp;
	}
}

?>