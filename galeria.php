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
 * Galeria - Imagens
 ******************************************************************************************************/

$gal_codigo = addslashes($_GET['gal']);

/**
 * Busca as informações da galeria
 */
$sql = "
	SELECT
		*
	FROM
		galerias
		LEFT OUTER JOIN imagens ON img_codigo = gal_codigo_img
	WHERE
		gal_codigo = ". $gal_codigo;
$resGal = mysql_query($sql);
$numGal = mysql_num_rows($resGal);

if ($numGal) {
	$galeria = mysql_fetch_assoc($resGal);
	
	$galeria['gal_data'] = System::format_date($galeria['gal_data']);
}

/**
 * Traz o total de imagens cadastradas na galeria
 */

$sql = "
	SELECT
		*
	FROM
		imagens
	WHERE
		img_codigo_gal = ". $gal_codigo;
$resImgTotal = mysql_query($sql);
$numImgTotal = mysql_num_rows($resImgTotal);

/**
 * Paginação
 */
$page = new Pagination($numImgTotal, $_GET['pg'], 10);

$pag_template['main'] = "{main.first} {main.previous} {main.number} {main.next} {main.last}";
$pag_template['number'] = ' <a href="?gal='. $gal_codigo .'&pg={number.page}">{number.page}</a> ';
$pag_template['current_page'] = ' <span style="font-weight: bold; font-size: 14px;">{current_page.page}</span> ';
$pag_template['first'] = '<a href="?gal='. $gal_codigo .'&pg={first.page}"><img src="templates/'. $_CONFIG['template'] .'/img/first.png" alt="Primeiro" title="Primeiro" /></a>';
$pag_template['previous'] = '<a href="?gal='. $gal_codigo .'&pg={previous.page}"><img src="templates/'. $_CONFIG['template'] .'/img/previous.png" alt="Anterior" title="Anterior" /></a>';
$pag_template['next'] = '<a href="?gal='. $gal_codigo .'&pg={next.page}"><img src="templates/'. $_CONFIG['template'] .'/img/next.png" alt="Próxima" title="Próxima" /></a>';
$pag_template['last'] = '<a href="?gal='. $gal_codigo .'&pg={last.page}"><img src="templates/'. $_CONFIG['template'] .'/img/last.png" alt="Última" title="Última" /></a>';
$pag_template['disabled_first'] = '<img src="templates/'. $_CONFIG['template'] .'/img/first_disabled.png" alt="Primeiro" title="Primeiro" />';
$pag_template['disabled_previous'] = '<img src="templates/'. $_CONFIG['template'] .'/img/previous_disabled.png" alt="Anterior" title="Anterior" />';
$pag_template['disabled_next'] = '<img src="templates/'. $_CONFIG['template'] .'/img/next_disabled.png" alt="Próxima" title="Próxima" />';
$pag_template['disabled_last'] = '<img src="templates/'. $_CONFIG['template'] .'/img/last_disabled.png" alt="Última" title="Última" />';

$page->set_template($pag_template);

$paginacao = $page->display(true);

/**
 * Busca as imagens cadastradas na galeria
 */

$sql .= " LIMIT ". $page->get('start') .", ". $page->get('end');
$resImg = mysql_query($sql);

while ($regImg = mysql_fetch_assoc($resImg)) {
	$imagens[] = $regImg;
}

/**
 * Pega a imagem principal de capa
 */

$capa = $imagens[0];

/**
 * Verifica se o usuário está tentando visualizar uma imagem específica
 */

if ($_GET['img']) {
	$img_codigo = addslashes($_GET['img']);
	
	$sql = "
		SELECT
			*
		FROM
			imagens
		WHERE
			img_codigo = ". $img_codigo ."
			AND img_codigo_gal = ". $gal_codigo;
	$resImg = mysql_query($sql);
	
	if (mysql_num_rows($resImg)) {
		$capa = mysql_fetch_assoc($resImg);
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

$template->assign('paginacao', $paginacao);
$template->assign('capa', $capa);
$template->assign('imagens', $imagens);
$template->assign('galeria', $galeria);
$template->assign('gb_version', GB_VERSION);
$template->assign('config', $_CONFIG);
$template->display('galeria.html');
?>