<?php
$configurar = ($_GET['act'] == 'configurar') ? true : false;

if ($configurar) {
	$link = mysql_connect(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME);
	
	$config = $_POST['config'];
		
	$success = true;
	
	foreach ($config as $field => $value) {
		$sql = "
			REPLACE config
				(cfg_nome, cfg_valor)
			VALUES
				('". $field ."', '". $value ."')";
		$qCfg = mysql_query($sql);
		
		if (!$qCfg) {
			$success = false;
		}
	}
} else {
	$od = opendir("../templates");
	
	while ($pasta = readdir($od)) {
		if (is_dir("../templates/". $pasta) && $pasta != '.' && $pasta != '..') {
			$templates[] = $pasta;
		}
	}
	
	$site_url = 'http://'. ((!empty($_SERVER['HTTP_HOST'])) ? strtolower($_SERVER['HTTP_HOST']) : ((!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : getenv('SERVER_NAME'))) ."/galeria";
}

$template->assign('site_url', $site_url);
$template->assign('configurar', $configurar);
$template->assign('success', $success);
$template->assign('templates', $templates);
$template->display('src/etapa_3.html');
?>