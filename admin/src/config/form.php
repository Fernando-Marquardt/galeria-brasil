<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

$od = opendir($_CONFIG['site_path'] ."/templates");

while ($pasta = readdir($od)) {
	if (is_dir($_CONFIG['site_path'] ."/templates/". $pasta) && $pasta != '.' && $pasta != '..') {
		$templates[] = $pasta;
	}
}

$template->assign('templates', $templates);
$template->assign('config', $_CONFIG);
$template->display('src/config/form.html');
?>