<?php
class CadastroController{
	private $db_model;
	
	public function __construct()
	{
		require_once("../Model/DBAccess_model.php");
		$this->db_model = new DBAccess();
	}
	public function carregarFoto($imagem)
	{
		$resp =  $this->db_model->adicionaFotos($imagem);
	}
	public function publicar($mural, $texto, $id_foto)
	{
		$this->db_model->criaPublicacao($mural, $texto, $id_foto);
	}
?>