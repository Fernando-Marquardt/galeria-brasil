<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

switch ($_GET['act']) {
	default:
		$config = $_POST['config'];
		
		$success = true;
		
		foreach ($config as $field => $value) {
			$sql = "
				REPLACE config
					(cfg_nome, cfg_valor)
				VALUES
					('". $field ."', '". $value ."')";
			$qCfg = mysql_query($sql);
			
			if (!$qCfg) {
				$success = false;
			}
		}
}

$template->assign('success', $success);
$template->display('src/config/action.html');
?>