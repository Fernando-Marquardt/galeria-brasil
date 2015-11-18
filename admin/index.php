<?php
require('../core/inc.config.php');
require('../core/inc.json.php');
require('../core/class.system.php');
require('../core/class.pagination.php');
require('../core/Smarty/Smarty.class.php');

if (GB_INSTALADO !== '1') {
	header('Location: instalar/index.php');
}

if ($_GET['sessid']) {
	session_id($_GET['sessid']);
}

session_start();

if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

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
 * Engine de templates
 */
$template = new Smarty();
$template->compile_dir = 'compile';
$template->template_dir = 'template';

$template->assign('gb_version', GB_VERSION);
$template->assign('config', $_CONFIG);
$template->assign('usuario', $_SESSION['gb']);

/**
 * Verifica a página à ser visualizada
 */
if ($_GET['p']) {
	if ($_GET['src']) {
		$page = 'src/'. $_GET['src'] .'/'. $_GET['p'] .'.php';
	} else {
		$page = $_GET['p'] .'.php';
	}
} else {
	$page = 'principal.php';
}

if (file_exists($page)) {
	/**
	 * Carrega a página à ser visualizada
	 */
	ob_start();
		include($page);
		
		$conteudo = ob_get_contents();
	ob_end_clean();
} else {
	$pagina_error = true;
}

/**
 * Imprime o buffer total
 */

if (SEM_LAYOUT != 1) {
	$template->assign('pagina_error', $pagina_error);
	$template->assign('conteudo', $conteudo);
	$template->display('index.html');
} else {
	echo $conteudo;
}
?>