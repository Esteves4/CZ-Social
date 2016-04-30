<?php

class DBConnection{
	private $server;
	private $user;
	private $pass;
	private $db;
	
	public __construct(){
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "czSocial";
	}
	
	public conectar(){
		$conexao = mysql_connect($server, $user, $pass);
		
		if($conexao){
			$baseSelecionada = mysql_select_db($db);
			if (!$baseSelecionada) {
				die ('Não foi possível conectar a base de dados: ' . mysql_error());
			}
		} else {
			die('Não conectado : ' . mysql_error());
		}
	}
	
}

  ?>
