<?php
ob_start();
	phpinfo();
	
	$phpinfo = ob_get_contents();
ob_end_clean();

/**
 * Testa versão do PHP
 */
$php_version = PHP_VERSION;

$tmp = explode('.', $php_version);
if ($tmp[0] < 5) {
	$testes['php'] = false;
	$permitir_prosseguir = false;
} else {
	$testes['php'] = true;
}

/**
 * Testa versão do MySQL
 */
$start = explode("<h2><a name=\"module_mysql\">mysql</a></h2>", $phpinfo, 1000);
if(count($start) < 2){ 
	$teste['mysql'] = -1;
} else { 
	$again = explode("<tr><td class=\"e\">Client API version </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$mysql_version = $last_time[0];
	
	$tmp = explode('.', $mysql_version);
	
	if ($tmp[0] < 4 && $tmp[1] < 1) {
		$testes['mysql'] = false;
		$permitir_prosseguir = false;
	} else {
		$testes['mysql'] = true;
	}
}

/**
 * Testa a possibilidade de escrever no arquivo core/inc.config.php, galerias/ e compile/
 */
if (is_writable('../core/inc.config.php')) {
	$testes['wrt_config'] = true;
} else {
	$testes['wrt_config'] = false;
	$permitir_prosseguir = false;
}

if (is_writable('../galerias/')) {
	$testes['wrt_galerias'] = true;
} else {
	$testes['wrt_galerias'] = false;
	$permitir_prosseguir = false;
}

if (is_writable('../compile/')) {
	$testes['wrt_compile'] = true;
} else {
	$testes['wrt_compile'] = false;
	$permitir_prosseguir = false;
}

/**
 * Teste se GD está instalado e o suporte aos tipos de imagem
 */
$start = explode("<h2><a name=\"module_gd\">gd</a></h2>", $phpinfo, 1000);
if(count($start) < 2){ 
	$teste['gd'] = false;
} else { 
	/**
	 * Testa se o GD está habilitado
	 */
	$again = explode("<tr><td class=\"e\">GD Support </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$gd_support = $last_time[0];
	
	if ($gd_support == 'enabled') {
		$testes['gd'] = true;
	} else {
		$testes['gd'] = false;
		$permitir_prosseguir = false;
	}
	
	/**
	 * Testa o suporte à GIF
	 */
	$again = explode("<tr><td class=\"e\">GIF Read Support </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$gif_read_support = $last_time[0];
	
	$again = explode("<tr><td class=\"e\">GIF Create Support </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$gif_create_support = $last_time[0];
	
	if ($gif_read_support == 'enabled' && $gif_create_support == 'enabled') {
		$testes['gif'] = true;
	} else {
		$testes['gif'] = false;
	}
	
	/**
	 * Testa o suporte à JPG
	 */
	$again = explode("<tr><td class=\"e\">JPG Support </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$jpg_support = $last_time[0];
	
	if ($jpg_support == 'enabled') {
		$testes['jpg'] = true;
	} else {
		$testes['jpg'] = false;
	}
	
	/**
	 * Testa o suporte à PNG
	 */
	$again = explode("<tr><td class=\"e\">PNG Support </td><td class=\"v\">", $start[1], 1000); 
	$last_time = explode(" </td></tr>", $again[1], 1000); 
	$png_support = $last_time[0];
	
	if ($png_support == 'enabled') {
		$testes['png'] = true;
	} else {
		$testes['png'] = false;
	}
}

$template->assign('permitir_prosseguir', $permitir_prosseguir);
$template->assign('php_version', $php_version);
$template->assign('mysql_version', $mysql_version);
$template->assign('testes', $testes);
$template->display('src/etapa_1.html');
?>