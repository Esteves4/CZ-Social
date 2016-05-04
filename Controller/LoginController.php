<?php
class LoginController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
		session_start();	
	}
	
	public function login($email, $senha){
		global $db_model;
		
		$temp = $this->db_model->contaExiste($email, $senha);
		
		if($temp == true){
			$_SESSION['email']=$email;
			$_SESSION['senha']=$senha;
		}
		
		return $temp;
	}

}

?>