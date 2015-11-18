<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

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
$pag_template['number'] = ' <a href="?src=galerias&p=lista&pg={number.page}">{number.page}</a> ';
$pag_template['current_page'] = ' <span style="font-weight: bold; font-size: 14px;">{current_page.page}</span> ';
$pag_template['first'] = '<a href="?src=galerias&p=lista&pg={first.page}"><img src="template/img/first.png" alt="Primeiro" title="Primeiro" /></a>';
$pag_template['previous'] = '<a href="?src=galerias&p=lista&pg={previous.page}"><img src="template/img/previous.png" alt="Anterior" title="Anterior" /></a>';
$pag_template['next'] = '<a href="?src=galerias&p=lista&pg={next.page}"><img src="template/img/next.png" alt="Próxima" title="Próxima" /></a>';
$pag_template['last'] = '<a href="?src=galerias&p=lista&pg={last.page}"><img src="template/img/last.png" alt="Última" title="Última" /></a>';
$pag_template['disabled_first'] = '<img src="template/img/first_disabled.png" alt="Primeiro" title="Primeiro" />';
$pag_template['disabled_previous'] = '<img src="template/img/previous_disabled.png" alt="Anterior" title="Anterior" />';
$pag_template['disabled_next'] = '<img src="template/img/next_disabled.png" alt="Próxima" title="Próxima" />';
$pag_template['disabled_last'] = '<img src="template/img/last_disabled.png" alt="Última" title="Última" />';

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

$template->assign('paginacao', $paginacao);
$template->assign('galerias', $galerias);
$template->display('src/galerias/lista.html');
?>