<?php
class ResetController{
	private $db_model;
	
	public function __construct(){
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();	
	}
	
	public function checaEmail($email){
		global $db_model;
		$temp = $this->db_model->emailExiste($email);
		
		if($temp == true){
			$to = $email;
			$subject = "Email de Confirmação"; 
			$message = "Clique no link para redefinir sua senha.\n"."http://localhost/cz-social/reset?id=".md5($this->db_model->getID($email)); 
			$mail_sent = @mail( $to, $subject, $message);
			
			return $mail_sent ?  true : "erro";
		}
		
		return $temp;
		
	}

}

?>