<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

$od = opendir("../templates");

while ($pasta = readdir($od)) {
	if (is_dir("../templates/". $pasta) && $pasta != '.' && $pasta != '..') {
		$templates[] = $pasta;
	}
}

if (file_exists('../galerias/marca.png')) {
	$imagem_marca = true;
}

$template->assign('imagem_marca', $imagem_marca);
$template->assign('templates', $templates);
$template->assign('config', $_CONFIG);
$template->display('src/config/form.html');
?>