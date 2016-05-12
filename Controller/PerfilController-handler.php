<?php
require_once("PerfilController.php");
session_start();
$control = new PerfilController();

if (getenv("REQUEST_METHOD") == "GET"){
	global $control;
	
	if($_GET['funcao'] == 'estados'){
		$resultado = $control->getEstados();
		
		echo '<option value="null">Escolha um estado</option>';
		
		while($row = mysql_fetch_array($resultado) ){
			echo "<option value='".$row['estado_id']."'>".$row['estado_nome']."</option>";
		}
		
	}
	
	if($_GET['funcao'] == 'cidades'){
	
		$estado_id = mysql_real_escape_string($_GET['estado_id']);
			
		$resultado = $control->getCidades($estado_id);

		echo '<option value="null">Escolha uma Cidade</option>';
		
		while($row = mysql_fetch_array($resultado)){
			echo "<option value='".$row['cidade_id']."'>".$row['cidade_nome']."</option>";
		}
	}
}

if (getenv("REQUEST_METHOD") == "POST"){
	global $control;
	$email = $_SESSION['email'];
	
	if($_POST['funcao'] == 'nomePerfil'){
		$nome = $control->getNome($email);
		$sobrenome = $control->getSobrenome($email);
			
		echo $nome .' '. $sobrenome;
	}
	if ($_POST['funcao'] == 'nomeInput'){
		$nome = $control->getNome($email);

		echo $nome;
	}
	if ($_POST['funcao'] == 'sobrenomeInput'){
		$sobrenome = $control->getSobrenome($email);

		echo $sobrenome;
	}
	if ($_POST['funcao'] == 'dataInput'){
		$data = $control->getData($email);

		echo $data;
	}
	if ($_POST['funcao'] == 'sexoInput'){
		$sexo = $control->getSexo($email);

		echo $sexo;
	}
	if ($_POST['funcao'] == 'estadoInput'){
		$estado = $control->getEstado($email);

		echo $estado;
	}
	if ($_POST['funcao'] == 'cidadeInput'){
		$cidade = $control->getCidade($email);

		echo $cidade;
	}
	
	if ($_POST['funcao'] == 'foto'){
		$perfil_id = $control->checaPerfil($email);
		
		
		if($perfil_id == false){
			echo 'pictures/200x200.jpg';
		}else{
			$fotoPATH = $control->getFotoPerfil($email);
		
			$imgSRC = substr($fotoPATH,31);
			
			echo $imgSRC;
		}
		
	}
	
	if ($_POST['funcao'] == 'salvarPerfil'){
		
		$nome = mysql_real_escape_string($_POST['nome']);
		$sobrenome = mysql_real_escape_string($_POST['sobrenome']);
		$dataN = mysql_real_escape_string($_POST['data']);
		$sexo = mysql_real_escape_string($_POST['sexo']);
		$cidade_id = mysql_real_escape_string($_POST['cidade_id']);
		$imagem = $_POST['imagemBLOB'];
		$id = $control->getID($email);
		
		$path = $_SERVER['DOCUMENT_ROOT'].'/cz-social/View/pictures/users/'.md5($id).'.png';
		
		$perfil_id = $control->checaPerfil($email);
		
		
		list($meta, $content) = explode(',', $imagem);
		$content = base64_decode($content);

		file_put_contents($path, $content);
		
		$control->atualizaNome($nome,$email);
		$control->atualizaSobrenome($sobrenome,$email);
		$control->atualizaDataN($dataN,$email);
		
		if($perfil_id == false){
			$temp = $control->criaPerfil($email,$sexo,$cidade_id,$path);
			echo $temp;
		}else{
			$temp = $control->atualizaPerfil($perfil_id,$sexo,$cidade_id);
			echo $temp;
		}

		
		
	}
	
	
}

?>