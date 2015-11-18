<?php
require('core/inc.config.php');
require('core/class.system.php');
require('core/class.pagination.php');
require('core/Smarty/Smarty.class.php');

if (GB_INSTALADO !== '1') {
	header('Location: instalar/index.php');
}

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

/**
 * Busca o total de galerias cadastradas
 */
$sql = "
	SELECT
		*
	FROM
		galerias
		LEFT OUTER JOIN imagens ON img_codigo = gal_codigo_img
	ORDER BY
		gal_data DESC";
$resGalTotal = mysql_query($sql);
$numGalTotal = mysql_num_rows($resGalTotal);

/**
 * Paginação
 */
$page = new Pagination($numGalTotal, $_GET['pg'], 12);

$pag_template['main'] = "{main.first} {main.previous} {main.number} {main.next} {main.last}";
$pag_template['number'] = ' <a href="?pg={number.page}">{number.page}</a> ';
$pag_template['current_page'] = ' <span style="font-weight: bold; font-size: 14px;">{current_page.page}</span> ';
$pag_template['first'] = '<a href="?pg={first.page}"><img src="templates/'. $_CONFIG['template'] .'/img/first.png" alt="Primeiro" title="Primeiro" /></a>';
$pag_template['previous'] = '<a href="?pg={previous.page}"><img src="templates/'. $_CONFIG['template'] .'/img/previous.png" alt="Anterior" title="Anterior" /></a>';
$pag_template['next'] = '<a href="?pg={next.page}"><img src="templates/'. $_CONFIG['template'] .'/img/next.png" alt="Próxima" title="Próxima" /></a>';
$pag_template['last'] = '<a href="?pg={last.page}"><img src="templates/'. $_CONFIG['template'] .'/img/last.png" alt="Última" title="Última" /></a>';
$pag_template['disabled_first'] = '<img src="templates/'. $_CONFIG['template'] .'/img/first_disabled.png" alt="Primeiro" title="Primeiro" />';
$pag_template['disabled_previous'] = '<img src="templates/'. $_CONFIG['template'] .'/img/previous_disabled.png" alt="Anterior" title="Anterior" />';
$pag_template['disabled_next'] = '<img src="templates/'. $_CONFIG['template'] .'/img/next_disabled.png" alt="Próxima" title="Próxima" />';
$pag_template['disabled_last'] = '<img src="templates/'. $_CONFIG['template'] .'/img/last_disabled.png" alt="Última" title="Última" />';

$page->set_template($pag_template);

$paginacao = $page->display(true);

/**
 * Busca as galerias cadastradas
 */
$sql .= " LIMIT ". $page->get('start') .", ". $page->get('end');
$resGal = mysql_query($sql);

while ($regGal = mysql_fetch_assoc($resGal)) {
	$regGal['gal_data'] = System::format_date($regGal['gal_data']);
	
	$sql = "
		SELECT
			img_codigo
		FROM
			imagens
		WHERE
			img_codigo_gal = ". $regGal['gal_codigo'];
	$resImg = mysql_query($sql);
	$regGal['total_imagens'] = mysql_num_rows($resImg);
	
	/**
	 * Se não houver uma imagem de capa definida pega um imagem randomicamente das cadastradas na galeria
	 */
	if (!$regGal['img_codigo']) {
		$sql = "
			SELECT
				*
			FROM
				imagens
			WHERE
				img_codigo_gal = ". $regGal['gal_codigo'] ."
			ORDER BY
				RAND()
			LIMIT 1";
		$resImg = mysql_query($sql);
		
		if (mysql_num_rows($resImg)) {
			$regImg = mysql_fetch_assoc($resImg);
			
			$regGal = array_merge($regGal, $regImg);
		}
	}
	
	$galerias[] = $regGal;
}

/**
 * Engine de templates
 */
$template = new Smarty();
$template->compile_dir = 'compile';
$template->template_dir = 'templates/'. $_CONFIG['template'];

$template->assign('paginacao', $paginacao);
$template->assign('galerias', $galerias);
$template->assign('config', $_CONFIG);
$template->assign('gb_version', GB_VERSION);
$template->display('index.html');
?>