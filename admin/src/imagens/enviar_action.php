<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

define('SEM_LAYOUT', 1);

$resultado = array();
$gal_codigo = addslashes($_GET['gal']);
$gal_pasta = addslashes($_GET['f']);
$usu_codigo = $_SESSION['gb']['usu_codigo'];

if (isset($_FILES['photoupload'])) {
	$arquivo = $_FILES['photoupload']['tmp_name'];
	$arquivo_nome = $_FILES['photoupload']['name'];
	$error = false;
	$size = false;
	
	if (!@is_uploaded_file($arquivo) || ($_FILES['photoupload']['size'] > 2 * 1024 * 1024)) {
		$error = 'Envie apenas imagens com tamanho menor que 2Mb!';
	}
	
	if (!$error && !($size = @getimagesize($arquivo))) {
		$error = 'Envie apenas imagens! Outros formatos não são permitidos!';
	}
	
	if (!$error && @file_exists('../galerias/'. $gal_pasta .'/'. $arquivo_nome)) {
		$error = 'Já existe uma imagem com este nome nesta galeria';
	}
	
	if(!$error && !@copy($arquivo, '../galerias/'. $gal_pasta .'/'. $arquivo_nome)) {
		$error = 'Imagem não pode ser enviada';
	}
	
	if (!$error) {
		$sql = "
			INSERT INTO imagens
				(img_codigo_gal
				,img_codigo_usu
				,img_nome_arquivo
				,img_data_cadastro)
			VALUES
				(". $gal_codigo ."
				,". $usu_codigo ."
				,'". $arquivo_nome ."'
				, NOW());";
		$iImg = @mysql_query($sql);
		
		if (!$iImg) {
			$error = 'A imagem não pode ser adicionada ao banco de dados';
		}
	}
	
	if ($error) {
		$resultado['result'] = 'failed';
		$resultado['error'] = utf8_encode($error);
	} else {
		$resultado['result'] = 'success';
		$resultado['size'] = utf8_encode("Imagem enviada com sucesso!");
	}
} else {
	$resultado['result'] = 'error';
	$resultado['error'] = utf8_encode('Ocorreu um erro e a imagem não pode ser enviada');
}
 
if (!headers_sent()) {
	header('Content-type: application/json');
}
 
echo json_encode($resultado);
?>