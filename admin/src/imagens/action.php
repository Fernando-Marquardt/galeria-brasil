<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

switch ($_GET['act']) {
	case 'del':
		$img_codigo = addslashes($_GET['id']);
		
		$sql = "
			SELECT
				*
			FROM
				imagens,
				galerias
			WHERE
				img_codigo = ". $img_codigo ."
				AND gal_codigo = img_codigo_gal
			LIMIT 1";
		$resImg = mysql_query($sql);
		echo mysql_error();
		$regImg = mysql_fetch_array($resImg);
		
		$sql = "DELETE FROM imagens WHERE img_codigo = ". $img_codigo;
		$delUsu = mysql_query($sql);
		
		if ($delUsu) {
			@unlink($_CONFIG['site_path'] ."/galerias/". $regImg['gal_pasta'] ."/". $regImg['img_nome_arquivo']);
			
			$success = true;
		} else {
			$success = false;
		}
		
		break;
	default:
		$img_mensagem = trim(addslashes($_POST['img_mensagem']));
		
		if ($_POST['img_codigo']) {
			$img_codigo = addslashes($_POST['img_codigo']);
			
			$sql = "
				UPDATE
					imagens
				SET
					img_mensagem = '". $img_mensagem ."'
				WHERE
					img_codigo = ". $img_codigo;
		}
		
		$qImg = mysql_query($sql);
		echo mysql_error();
		
		if ($qImg) {
			$success = true;
		} else {
			$success = false;
		}
}

$template->assign('action', $_GET['act']);
$template->assign('success', $success);
$template->display('src/imagens/action.html');
?>