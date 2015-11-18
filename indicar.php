<?php
require('core/inc.config.php');
require('core/class.pagination.php');
require('core/class.system.php');
require('core/Smarty/Smarty.class.php');
require('core/PHPMailer/class.phpmailer.php');

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
$template->template_dir = 'templates/'. $_CONFIG['template'];

$img_codigo = $_GET['img'];
$gal_codigo = $_GET['gal'];

$template->assign('config', $_CONFIG);
$template->assign('img_codigo', $img_codigo);
$template->assign('gal_codigo', $gal_codigo);

switch ($_GET['act']) {
	case 'enviar':
		$remetente = trim(addslashes($_POST['remetente']));
		$email_remetente = trim(addslashes($_POST['email_remetente']));
		$destino = trim(addslashes($_POST['destino']));
		$email_destino = trim(addslashes($_POST['email_destino']));
		
		$template->assign('remetente', $remetente);
		$template->assign('destino', $destino);		
		$mensagem = $template->fetch('../mensagem_indicar.html');
		
		$mail = new PHPMailer();
		
		$mail->From = $_CONFIG['email_admin'];
		$mail->FromName = $_CONFIG['titulo'];
		$mail->AddAddress($email_destino, $destino);
		$mail->AddReplyTo($email_remetente, $remetente);
		
		$mail->IsHTML(true);
		$mail->IsMail(true);
		
		$mail->Subject = $_CONFIG['titulo'] ." - ". $remetente ." lhe indicou esta imagem!";
		$mail->Body = $mensagem;
		
		if ($mail->Send()) {
			$success = true;
		}
		
		break;	
}

$template->assign('act', $_GET['act']);
$template->assign('success', $success);
$template->display('indicar.html');
?>