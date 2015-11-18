<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

$gal_codigo = addslashes($_GET['gal']);

$sql = "
	SELECT
		*
	FROM
		galerias
	WHERE
		gal_codigo = ". $gal_codigo;
$resGal = mysql_query($sql);
$galeria = mysql_fetch_assoc($resGal);

$template->assign('sessid', session_id());
$template->assign('galeria', $galeria);
$template->display('src/imagens/enviar.html');
?>