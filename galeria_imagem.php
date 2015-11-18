<?php
require('core/inc.config.php');
require('core/class.pagination.php');
require('core/class.system.php');
require('core/Smarty/Smarty.class.php');

/**
 * Efetua a conexão com o banco de dados
 */
$db['link'] = @mysql_connect(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD);

if ($db['link']) {
	if (!mysql_select_db(DATABASE_NAME)) {
		die('Não foi possível conectar ao Banco de Dados: '. mysql_error());
	}
} else {
	die('Não foi possível conectar ao Banco de Dados: '. mysql_error());
}

/**
 * Carrega as configurações do Banco de Dados
 */
$sql = "
	SELECT
		*
	FROM
		config";
$resCfg = mysql_query($sql);

while ($regCfg = mysql_fetch_assoc($resCfg)) {
	$_CONFIG[$regCfg['cfg_nome']] = $regCfg['cfg_valor'];
}

/******************************************************************************************************
 * Imagem
 ******************************************************************************************************/

$img_codigo = addslashes($_GET['id']);

/**
 * Pega as informações da imagem
 */
$sql = "
	SELECT
		*
	FROM
		imagens,
		galerias
	WHERE
		img_codigo = ". $img_codigo ."
		AND gal_codigo = img_codigo_gal";
$resImg = mysql_query($sql);

if ($resImg) {
	$regImg = mysql_fetch_assoc($resImg);
	
	/**
	 * Busca a imagem anterior a atual
	 */
	$sql = "
		SELECT
			img_codigo
		FROM
			imagens
		WHERE
			img_codigo_gal = ". $regImg['img_codigo_gal'] ."
			AND img_codigo < '". $regImg['img_codigo'] ."'
		ORDER BY
			img_codigo DESC
		LIMIT 1";
	$resAnterior = mysql_query($sql);
	
	if (mysql_num_rows($resAnterior)) {
		$reg = mysql_fetch_assoc($resAnterior);
		
		$regImg['img_anterior'] = $reg['img_codigo'];
	}
	
	/**
	 * Busca próxima imagem
	 */
	$sql = "
		SELECT
			img_codigo
		FROM
			imagens
		WHERE
			img_codigo_gal = ". $regImg['img_codigo_gal'] ."
			AND img_codigo > '". $regImg['img_codigo'] ."'
		LIMIT 1";
	$resProxima = mysql_query($sql);
	
	if (mysql_num_rows($resProxima)) {
		$reg = mysql_fetch_assoc($resProxima);
		
		$regImg['img_proxima'] = $reg['img_codigo'];
	}
}

/******************************************************************************************************
 * 
 ******************************************************************************************************/

/**
 * Engine de templates
 */
$template = new Smarty();
$template->compile_dir = 'compile';
$template->template_dir = 'templates/'. $_CONFIG['template'];

$template->assign('imagem', $regImg);
$template->assign('gb_version', GB_VERSION);
$template->assign('config', $_CONFIG);
echo utf8_encode($template->fetch('galeria_imagem.html'));
?>