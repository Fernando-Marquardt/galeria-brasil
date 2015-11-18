<?php
require('../core/inc.config.php');
require('../core/Smarty/Smarty.class.php');

/**
 * Etapas
 */
$etapas[1] = 'Verificaчуo dos Requisitos';
$etapas[2] = 'Configuraчуo do Banco de Dados';
$etapas[3] = 'Configuraчуo da Galeria';
$etapas[4] = 'Criaчуo da conta de usuсrio';
$etapas[5] = 'Finalizaчуo';

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