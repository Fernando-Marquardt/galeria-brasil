<?php
require('../core/inc.config.php');
require('../core/Smarty/Smarty.class.php');

/**
 * Etapas
 */
$etapas[1] = 'Verifica��o dos Requisitos';
$etapas[2] = 'Configura��o do Banco de Dados';
$etapas[3] = 'Configura��o da Galeria';
$etapas[4] = 'Cria��o da conta de usu�rio';
$etapas[5] = 'Finaliza��o';

$etapa_atual = ($_GET['e']) ? $_GET['e'] : 1;

$template = new Smarty();
$template->compile_dir = 'compile';
$template->template_dir = 'template';

ob_start();
	include('src/etapa_'. $etapa_atual .'.php');
	
	$conteudo = ob_get_contents();
ob_end_clean();

$template->assign('conteudo', $conteudo);
$template->assign('etapa_atual', $etapa_atual);
$template->assign('etapas', $etapas);
$template->assign('gb_version', GB_VERSION);
$template->display('index.html');
?>