<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

if ($_GET['id']) {
	$img_codigo = addslashes($_GET['id']);
	
	/**
	 * Busca a imagem selecionada
	 */
	
	$sql = "
		SELECT
			*
		FROM
			imagens
		WHERE
			img_codigo = ". $img_codigo;
	$resImg = mysql_query($sql);
	
	if (mysql_num_rows($resImg)) {
		$imagem = mysql_fetch_assoc($resImg);
	}
}

$template->assign('imagem', $imagem);
$template->display('src/imagens/form.html');
?>