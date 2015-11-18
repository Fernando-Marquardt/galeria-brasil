<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

if ($_GET['id']) {
	$usu_codigo = addslashes($_GET['id']);
	
	/**
	 * Busca o usuário selecionado
	 */
	
	$sql = "
		SELECT
			*
		FROM
			usuarios
		WHERE
			usu_codigo = ". $usu_codigo;
	$resUsu = mysql_query($sql);
	
	if (mysql_num_rows($resUsu)) {
		$usuario = mysql_fetch_assoc($resUsu);
	}
}

$template->assign('usuario', $usuario);
$template->display('src/usuarios/form.html');
?>