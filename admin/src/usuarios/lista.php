<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

/**
 * Busca total de usuários cadastrados
 */
$sql = "
	SELECT
		*
	FROM
		usuarios
	ORDER BY
		usu_nome ASC";
$resUsuTotal = mysql_query($sql);
$numUsuTotal = mysql_num_rows($resUsuTotal);

/**
 * Paginação
 */
$page = new Pagination($numUsuTotal, $_GET['pg'], 10);

$pag_template['main'] = "{main.first} {main.previous} {main.number} {main.next} {main.last}";
$pag_template['number'] = ' <a href="?src=usuarios&p=lista&pg={number.page}">{number.page}</a> ';
$pag_template['current_page'] = ' <span style="font-weight: bold; font-size: 14px;">{current_page.page}</span> ';
$pag_template['first'] = '<a href="?src=usuarios&p=lista&pg={first.page}"><img src="template/img/first.png" alt="Primeiro" title="Primeiro" /></a>';
$pag_template['previous'] = '<a href="?src=usuarios&p=lista&pg={previous.page}"><img src="template/img/previous.png" alt="Anterior" title="Anterior" /></a>';
$pag_template['next'] = '<a href="?src=usuarios&p=lista&pg={next.page}"><img src="template/img/next.png" alt="Próxima" title="Próxima" /></a>';
$pag_template['last'] = '<a href="?src=usuarios&p=lista&pg={last.page}"><img src="template/img/last.png" alt="Última" title="Última" /></a>';
$pag_template['disabled_first'] = '<img src="template/img/first_disabled.png" alt="Primeiro" title="Primeiro" />';
$pag_template['disabled_previous'] = '<img src="template/img/previous_disabled.png" alt="Anterior" title="Anterior" />';
$pag_template['disabled_next'] = '<img src="template/img/next_disabled.png" alt="Próxima" title="Próxima" />';
$pag_template['disabled_last'] = '<img src="template/img/last_disabled.png" alt="Última" title="Última" />';

$page->set_template($pag_template);

$paginacao = $page->display(true);

/**
 * Busca os usuários cadastrados
 */

$sql .= " LIMIT ". $page->get('start') .", ". $page->get('end');
$resUsu = mysql_query($sql);

while ($regUsu = mysql_fetch_assoc($resUsu)) {
	$regUsu['usu_data_cadastro'] = System::format_date($regUsu['usu_data_cadastro']);
	
	$usuarios[] = $regUsu;
}

$template->assign('paginacao', $paginacao);
$template->assign('usuarios', $usuarios);
$template->display('src/usuarios/lista.html');
?>