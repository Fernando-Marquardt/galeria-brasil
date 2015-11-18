<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

if ($_GET['gal']) {
	$gal_codigo = addslashes($_GET['gal']);
	
	/**
	 * Busca as informações da galeria selecionada
	 */
	$sql = "
		SELECT
			*
		FROM
			galerias
		WHERE
			gal_codigo = ". $gal_codigo;
	$resGal = mysql_query($sql);
	
	if (mysql_num_rows($resGal)) {
		$galeria = mysql_fetch_assoc($resGal);
		
		$galeria['gal_data'] = System::format_date($galeria['gal_data']);
	}
	
	/**
	 * Traz o total de imagens existentes na galeria
	 */
	$sql = "
		SELECT
			*
		FROM
			imagens
		WHERE
			img_codigo_gal = ". $gal_codigo ."
		ORDER BY
			img_data_cadastro DESC";
	$resImgTotal = mysql_query($sql);
	$numImgTotal = mysql_num_rows($resImgTotal);
	
	/**
	 * Paginação
	 */
	$page = new Pagination($numImgTotal, $_GET['pg'], 12);
	
	$pag_template['main'] = "{main.first} {main.previous} {main.number} {main.next} {main.last}";
	$pag_template['number'] = ' <a href="?src=imagens&p=lista&gal='. $gal_codigo .'&pg={number.page}">{number.page}</a> ';
	$pag_template['current_page'] = ' <span style="font-weight: bold; font-size: 14px;">{current_page.page}</span> ';
	$pag_template['first'] = '<a href="?src=imagens&p=lista&gal='. $gal_codigo .'&pg={first.page}"><img src="template/img/first.png" alt="Primeiro" title="Primeiro" /></a>';
	$pag_template['previous'] = '<a href="?src=imagens&p=lista&gal='. $gal_codigo .'&pg={previous.page}"><img src="template/img/previous.png" alt="Anterior" title="Anterior" /></a>';
	$pag_template['next'] = '<a href="?src=imagens&p=lista&gal='. $gal_codigo .'&pg={next.page}"><img src="template/img/next.png" alt="Próxima" title="Próxima" /></a>';
	$pag_template['last'] = '<a href="?src=imagens&p=lista&gal='. $gal_codigo .'&pg={last.page}"><img src="template/img/last.png" alt="Última" title="Última" /></a>';
	$pag_template['disabled_first'] = '<img src="template/img/first_disabled.png" alt="Primeiro" title="Primeiro" />';
	$pag_template['disabled_previous'] = '<img src="template/img/previous_disabled.png" alt="Anterior" title="Anterior" />';
	$pag_template['disabled_next'] = '<img src="template/img/next_disabled.png" alt="Próxima" title="Próxima" />';
	$pag_template['disabled_last'] = '<img src="template/img/last_disabled.png" alt="Última" title="Última" />';
	
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
}

$template->assign('galeria', $galeria);
$template->assign('paginacao', $paginacao);
$template->assign('imagens', $imagens);
$template->display('src/imagens/lista.html');
?>