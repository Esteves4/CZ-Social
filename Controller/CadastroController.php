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
		
		if($temp == true){
			$id = md5(rand()+$this->db_model->getID($email));
			
			
			$to = $email;
			$subject = "Confirmação de Cadastro"; 
			$message = '<p>Seja bem-vindo ao Meet The World!</p> 
						<p>Conheça o mundo inteiro sem sair de casa.</p>
						<br> 
						<p> ######################################################################################## </p>
						<p> Para confirmar seu cadastro, acesse o link abaixo.</p>
						<p>'.'http://localhost/cz-social/view/ativar.php?id='.$id.'</p>
						<p> ######################################################################################## </p>
						<br>
						<p> Agradecemos sua inscrição e esperamos que você possa ter viagens incríveis!</p>
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
				$this->db_model->apagaAtivar($email);
				$this->db_model->adicionaAtivar($id,$email);
			}
			
			return $mail_sent;
		}
		
		
		return $temp;
	}
	
	public function checaEmail($email){
		$temp = $this->db_model->emailExiste($email);
		return $temp;
	}
}

?>