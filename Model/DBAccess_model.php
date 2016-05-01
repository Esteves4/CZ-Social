<?php

class DBAccess{
	private $connection;
	
	
	//Construtor
	public __construct(){
		require_once("DBConnection_model.php");
		$connection = new DBConnection();
		$connection -> conectar();
	}
	
	public adicionaConta($nome, $sobrenome,$data, $email, $senha){
		$resultado = mysql_query("INSERT INTO contas(nome,sobrenome,data_nascimento,email,senha) VALUES('$nome','$sobrenome','$data','$email','$senha')");
		
		return $resultado;
	}
	
	public adicionaPerfil($sexo, $formacao, $id_foto, $interessado, $id_end){
		$resultado = mysql_query("INSERT INTO perfis(sexo,formacao,perf_foto,interessado,endereco_id) VALUES('$sexo','$formacao','$id_foto','$interessado','$id_end')");
		
		return $resultado;
	}
	
	public adicionaAmigo($id_conta, $id_amigo){
		$resultado = mysql_query("INSERT INTO amigos(conta_id,amigo_id,data_amizade) VALUES('$id_conta','$id_amigo',curdate())");
		
		return $resultado;
	}
	
	public adicionaComentario($comentario, $id_conta, $id_publicacao){
		$resultado = mysql_query("INSERT INTO comentarios(comentario,data_criacao,conta_id, publicacao_id) VALUES('$comentario',curdate(),'$id_conta', '$id_publicacao' )");
		
		return $resultado;
	}
	
	public adicionaFotos($imagem){
		$resultado = mysql_query("INSERT INTO fotos(imagem) VALUES('$imagem')");
		
		return mysql_insert_id();
	}
	
	private criaMural($conta){
		$resultado = mysql_query("INSERT INTO murais(conta_id) VALUES('$conta')");
		
		return mysql_insert_id();
	}
	
	public criaPublicacao($mural, $texto, $id_foto){
		$resultado = mysql_query("INSERT INTO publicacoes(mural_id, texto, foto_id, data_criacao) VALUES('$mural', '$texto', 'id_foto', curdate())");
		
		return $resultado;
	}
	
	
	
}

?>