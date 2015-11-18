<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

if (is_writable('../core/inc.config.php')) {
	$testes['config'] = false;
}

if (file_exists('../instalar')) {
	$testes['pasta_instalar'] = true;
}

$template->assign('testes', $testes);
$template->display('principal.html');
?>