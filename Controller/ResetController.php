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
			$id = md5(rand()+$this->db_model->getID($email));
			
			
			$to = $email;
			$subject = "Alteração de Senha"; 
			$message = '<p>Oops... parece que alguém está esquecendo algumas coisas :D </p> 
						<br> 
						<p> Mas não tem problema, estamos aqui para solucionar isso. </p>
						<p> ######################################################################################## </p>
						<p> Para redefinir sua senha, basta acessar o link:</p>
						<p>'.'http://localhost/cz-social/resetPassword.php?id='.$id.'&email='.$email.'</p>
						<p> ######################################################################################## </p>
						<p> Agradecemos o contato e procuramos sempre lhe oferecer o melhor serviço.</p>
						<br>
						<p> Atenciosamente, </p>
						<p style="text-indent: 50px;"> Equipe do Meet The World </p>'; 
						
			$from = 'nao.responda.mw@gmail.com';
			$headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$mail_sent = @mail( $to, $subject, $message, $headers);
			
			if ($mail_sent == true){
				$this->db_model->adicionaReset($id,$email);
			}
			
			return $mail_sent ?  true : 0;
		}
		
		return $temp;
		
	}

}

?>