<?php
require_once("InicialController.php");
session_start();
$control = new InicialController();




if (getenv("REQUEST_METHOD") == "POST"){
	global $control;
	$email = $_SESSION['email'];
	
	if($_POST['funcao'] == 'postar'){
		$texto = mysql_real_escape_string($_POST['texto']);
		$imagem = $_POST['imagem'];
		
		$id = $control->getID($email);
		$mural_id = $control->getMuralID($id);
		
		$key = $id . date(DATE_RFC822);
		
		$path = $_SERVER['DOCUMENT_ROOT'].'/cz-social/View/pictures/posts/'.md5($key).'.png';
		
		list($meta, $content) = explode(',', $imagem);
		$content = base64_decode($content);
		file_put_contents($path, $content);
		
		$temp = $control->publicar($mural_id, $texto, $path);
		
		echo $temp;
	}
}

?>
