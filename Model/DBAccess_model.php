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
	
	public function adicionaPerfil($sexo,$id_foto,$id_end){
		$resultado = mysql_query("INSERT INTO perfis(sexo,perf_foto,endereco_id) VALUES('$sexo','$id_foto','$id_end')");
		
		return mysql_insert_id();
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
	
	public function adicionaReset($id,$email){
		$resultado = mysql_query("INSERT INTO reset(reset_id, email) VALUES('$id','$email')");
		
		return $resultado;
	}
	
	public function adicionaAtivar($id,$email){
		$resultado = mysql_query("INSERT INTO ativar(ativar_id, email) VALUES('$id','$email')");
		
		return $resultado;
	}
	
	private function criaMural($conta){
		$resultado = mysql_query("INSERT INTO murais(conta_id) VALUES('$conta')");
		
		return $resultado;
	}
	
	public function criaPublicacao($mural, $texto, $id_foto){
		$resultado = mysql_query("INSERT INTO publicacoes(mural_id, texto, foto_id, data_criacao) VALUES('$mural', '$texto', '$id_foto', NOW())");
		
		return $resultado;
	}
	
	public function emailExiste($email){
		$resultado = mysql_query("SELECT email FROM contas WHERE email = '$email'");

		if(mysql_num_rows($resultado) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function contaExiste($email,$senha){
		$resultado = mysql_query("SELECT email FROM contas WHERE email = '$email' AND senha = '$senha'");
		
		if(mysql_num_rows($resultado) > 0){
			return true;

		}else{
			return false;
		}
	}
	
	public function perfilExiste($email){
		$resultado = mysql_query("SELECT perfil_id FROM contas WHERE email = '$email'");
						
		$row = mysql_fetch_assoc($resultado);
		
		if($row['perfil_id'] == "null"){
			return false;
		}else{
			return $row['perfil_id'];
		}
	}
	
	public function getMuralID($id_conta){
		$resultado = mysql_query("SELECT mural_id FROM murais WHERE conta_id = '$id_conta'");
						
		$row = mysql_fetch_assoc($resultado);
		
		return $row['mural_id'];
	}
	
	public function getNome($email){
		$resultado = mysql_query("SELECT nome FROM contas WHERE email = '$email'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['nome'];
	}
	
		
	public function getSobrenome($email){
		$resultado = mysql_query("SELECT sobrenome FROM contas WHERE email = '$email'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['sobrenome'];
	}
	
	public function getDataN($email){
		$resultado = mysql_query("SELECT data_nascimento FROM contas WHERE email = '$email'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['data_nascimento'];
	}
	
	public function getSexo($id_perfil){
		$resultado = mysql_query("SELECT sexo FROM perfis WHERE perfil_id = '$id_perfil'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['sexo'];
	}
	
	public function getEstadoID($cidade_id){
		$resultado = mysql_query("SELECT estado_id FROM cidades WHERE cidade_id = '$cidade_id'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['estado_id'];
	}
	
	public function getCidadeID($id_perfil){
		$resultado = mysql_query("SELECT endereco_id FROM perfis WHERE perfil_id = '$id_perfil'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['endereco_id'];
	}
	
	public function getPerfilID($email){
		$resultado = mysql_query("SELECT perfil_id FROM contas WHERE email = '$email'");
		
		if($resultado == false){
			return $resultado;
		}
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['perfil_id'];
		
	}
	
	public function getFotoPerfilID($id_perfil){
		$resultado = mysql_query("SELECT perf_foto FROM perfis WHERE perfil_id = '$id_perfil'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['perf_foto'];
	}
	
	public function getFoto($id_foto){
		$resultado = mysql_query("SELECT imagem FROM fotos WHERE foto_id = '$id_foto'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['imagem'];
		
	}
	
	public function getID($email){
		$resultado = mysql_query("SELECT conta_id FROM contas WHERE email = '$email'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['conta_id'];
	}
	
	public  function getAtivarEmail($id){
		$resultado = mysql_query("SELECT email FROM ativar WHERE ativar_id = '$id'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['email'];
	}
	
	public function getEstados(){
		$resultado = mysql_query("SELECT estado_id, estado_nome FROM estados");
		
		return $resultado;
	}
	
	public function getCidades($estado_id){
		$resultado = mysql_query("SELECT cidade_id, cidade_nome FROM cidades WHERE estado_id = '$estado_id' ORDER BY cidade_nome");
		
		return $resultado;
	}
	
	public function setNome($nome,$email){
		$resultado = mysql_query("UPDATE contas set nome = '$nome' where email = '$email'");
		
		return $resultado;
	}
	
	public function setSobrenome($sobrenome,$email){
		$resultado = mysql_query("UPDATE contas set sobrenome = '$sobrenome' where email = '$email'");
		
		return $resultado;
	}
	
	public function setDataN($data,$email){
		$resultado = mysql_query("UPDATE contas set data_nascimento = '$data' where email = '$email'");
		
		return $resultado;
	}
	
	public function setPerfilID($email,$id_perfil){
		$resultado = mysql_query("UPDATE contas set perfil_id = '$id_perfil' where email = '$email'");
		
		return $resultado;
	}
	
	public function updatePerfil($perfil_id,$sexo,$cidade_id){
		$resultado = mysql_query("UPDATE perfis set sexo = '$sexo', endereco_id = '$cidade_id' where perfil_id = '$perfil_id'");
		
		return $resultado;
	}
	
	public function permiteReset($id_md5){
		$resultado = mysql_query("SELECT * FROM reset WHERE reset_id = '$id_md5'");
		
		if(mysql_num_rows($resultado) > 0){
			return true;

		}else{
			return false;
		}
	}
	
	public function checaStatus($email){
		$resultado = mysql_query("SELECT status FROM contas WHERE email = '$email'");
		
		$row = mysql_fetch_assoc($resultado);
		
		return $row['status'];
	}
	
	public function resetSenha($email,$senha){
		$resultado = mysql_query("UPDATE contas SET senha = '$senha' WHERE email='$email'");
		
		return $resultado;
	}
	
	public function apagaReset($email){
		$resultado = mysql_query("DELETE FROM reset WHERE email='$email'");
		
		return $resultado;
	}
	
	public function apagaAtivar($email){
		$resultado = mysql_query("DELETE FROM ativar WHERE email='$email'");
		
		return $resultado;
	}
	
	public function ativarConta($email){
		$resultado = mysql_query("UPDATE contas SET status = 'T' WHERE email='$email'");
		
		return $resultado;
	}
}

?>