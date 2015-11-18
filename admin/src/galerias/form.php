<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

if ($_GET['id']) {
	$gal_codigo = addslashes($_GET['id']);
	
	/**
	 * Busca o usuário selecionado
	 */
	
	$sql = "
		SELECT
			*
		FROM
			galerias
		WHERE
			gal_codigo = ". $gal_codigo;
	$resGal = mysql_query($sql);
	
	if (mysql_num_rows($resGal)) {
		$galeria = mysql_fetch_assoc($resGal);
		
		$galeria['gal_data'] = System::format_date($galeria['gal_data']);
	}
	
	/**
	 * Busca as imagens da galeria para selecionar como capa
	 */
	
	$sql = "
		SELECT
			*
		FROM
			imagens
		WHERE
			img_codigo_gal = ". $gal_codigo;
	$resImg = mysql_query($sql);
	
	while ($regImg = mysql_fetch_assoc($resImg)) {
		$imagens[] = $regImg;
	}
}

$template->assign('imagens', $imagens);
$template->assign('galeria', $galeria);
$template->display('src/galerias/form.html');
?>