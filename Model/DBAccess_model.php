<?php

class DBAccess{
	private $connection;
	
	
	//Construtor
	public function __construct(){
		require_once("DBConnection_model.php");
		$this->connection = new DBConnection();
		$this->connection -> conectar();
	}
	
	public function adicionaConta($nome, $sobrenome,$data, $email, $senha){
		$resultado = mysql_query("INSERT INTO contas(nome,sobrenome,data_nascimento,email,senha) VALUES('$nome','$sobrenome','$data','$email','$senha')");
		
		return $resultado;
	}
	
	public function adicionaPerfil($sexo, $formacao, $id_foto, $interessado, $id_end){
		$resultado = mysql_query("INSERT INTO perfis(sexo,formacao,perf_foto,interessado,endereco_id) VALUES('$sexo','$formacao','$id_foto','$interessado','$id_end')");
		
		return $resultado;
	}
	
	public function adicionaAmigo($id_conta, $id_amigo){
		$resultado = mysql_query("INSERT INTO amigos(conta_id,amigo_id,data_amizade) VALUES('$id_conta','$id_amigo',curdate())");
		
		return $resultado;
	}
	
	public function adicionaComentario($comentario, $id_conta, $id_publicacao){
		$resultado = mysql_query("INSERT INTO comentarios(comentario,data_criacao,conta_id, publicacao_id) VALUES('$comentario',curdate(),'$id_conta', '$id_publicacao' )");
		
		return $resultado;
	}
	
	public function adicionaFotos($imagem){
		$resultado = mysql_query("INSERT INTO fotos(imagem) VALUES('$imagem')");
		
		return mysql_insert_id();
	}
	
	private function criaMural($conta){
		$resultado = mysql_query("INSERT INTO murais(conta_id) VALUES('$conta')");
		
		return mysql_insert_id();
	}
	
	public function criaPublicacao($mural, $texto, $id_foto){
		$resultado = mysql_query("INSERT INTO publicacoes(mural_id, texto, foto_id, data_criacao) VALUES('$mural', '$texto', 'id_foto', curdate())");
		
		return $resultado;
	}
	
	public function emailExiste($email){
		$resultado = mysql_query("SELECT email FROM contas where email = '$email'");

		if(mysql_num_rows($resultado) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
	
}

?>