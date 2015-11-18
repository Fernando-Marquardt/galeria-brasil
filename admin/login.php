<?php
require('../core/inc.config.php');
require('../core/class.system.php');
require('../core/Smarty/Smarty.class.php');

/**
 * Inicia sessão
 */
session_start();

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

if ($_POST['usu_login']) {
	$usu_login = addslashes($_POST['usu_login']);
	$usu_senha = addslashes($_POST['usu_senha']);
	
	$sql = "
		SELECT
			*
		FROM
			usuarios
		WHERE
			usu_login = '". $usu_login ."'
			AND usu_senha = MD5('". $usu_senha ."')";
	$resUsu = mysql_query($sql);
	
	if (mysql_num_rows($resUsu)) {
		$regUsu = mysql_fetch_assoc($resUsu);
		
		foreach ($regUsu as $field => $value) {
			$_SESSION['gb'][$field] = $value;
		}
		
		header('Location: index.php');
		die();
	} else {
		$login_error = true;
	}
}

/**
 * Engine de templates
 */
$template = new Smarty();
$template->compile_dir = 'compile';
$template->template_dir = 'template';

$template->assign('login_error', $login_error);
$template->assign('gb_version', GB_VERSION);
$template->display('login.html');
?>