<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

switch ($_GET['act']) {
	case 'del':
		$usu_codigo = addslashes($_GET['id']);
		
		$sql = "DELETE FROM usuarios WHERE usu_codigo = ". $usu_codigo;
		$delUsu = mysql_query($sql);
		
		if ($delUsu) {
			$success = true;
		} else {
			$success = false;
		}
		
		break;
	default:
		$usu_nome = trim(addslashes($_POST['usu_nome']));
		$usu_email = trim(addslashes($_POST['usu_email']));
		$usu_login = trim(addslashes($_POST['usu_login']));
		$usu_senha = trim(addslashes($_POST['usu_senha']));
		
		if ($_POST['usu_codigo']) {
			$usu_codigo = addslashes($_POST['usu_codigo']);
			
			$sql = "
				UPDATE
					usuarios
				SET
					usu_nome = '". $usu_nome ."',
					usu_email = '". $usu_email ."',
					usu_login = '". $usu_login ."'
					". (($usu_senha) ? ",usu_senha = MD5('". $usu_senha ."')" : '') ."
				WHERE
					usu_codigo = ". $usu_codigo;
		} else {
			$sql = "
				INSERT INTO usuarios
					(usu_nome, usu_email, usu_login". (($usu_senha) ? ', usu_senha' : '') .", usu_data_cadastro)
				VALUES
					('". $usu_nome ."', '". $usu_email ."', '". $usu_login ."'". (($usu_senha) ? ", MD5('". $usu_senha ."')" : '') .", NOW())";
		}
		
		$qUsu = mysql_query($sql);
		echo mysql_error();
		
		if ($qUsu) {
			$success = true;
		} else {
			$success = false;
		}
}

$template->assign('action', $_GET['act']);
$template->assign('success', $success);
$template->display('src/usuarios/action.html');
?>