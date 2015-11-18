<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

function pasta_disponivel($pasta, $sequencia = 1) {
	if (file_exists('../galerias/'. $pasta)) {
		if ($sequencia > 1) {
			$pasta = substr($pasta, 0, strlen($pasta) - ($sequencia - 1) - 1);
		}
		
		if (strlen($pasta) > (30 - strlen($sequencia) - 1)) {
			$pasta = substr($pasta, 0, strlen($pasta) - strlen($sequencia) - 1);
		}
		
		$pasta .= "_". ($sequencia + 1);
		
		return pasta_disponivel($pasta, $sequencia + 1);
	} else {
		return $pasta;
	}
}

function deletar_pasta($pasta_nome) {
	$pasta = opendir($pasta_nome);
	
	while ($arquivo = readdir($pasta)) {
		if ($arquivo) {
			$tem_imagem++;
		}
	}
	
	if ($tem_imagem) {
		return false;
	} else {
		unlink($pasta_nome);
		return true;
	}
}

switch ($_GET['act']) {
	case 'del':
		$gal_codigo = addslashes($_GET['id']);
		
		$sql = "
			SELECT
				*
			FROM
				galerias
			WHERE
				gal_codigo = ". $gal_codigo;
		$resGal = mysql_query($sql);
		$regGal = mysql_fetch_assoc($resGal);
		
		$possui_imagens = (deletar_pasta('../galerias/'. $regGal['gal_pasta'])) ? false : true;
		
		$sql = "DELETE FROM galerias WHERE gal_codigo = ". $gal_codigo;
		$delGal = mysql_query($sql);
		
		if ($delGal) {
			$success = true;
		} else {
			$success = false;
		}
		
		break;
	default:
		$gal_titulo = trim(addslashes($_POST['gal_titulo']));
		$gal_local = trim(addslashes($_POST['gal_local']));
		$gal_data = trim(addslashes($_POST['gal_data']));
		$gal_pasta = pasta_disponivel(System::generate_unix_name($gal_titulo, 30));
		
		if ($_POST['gal_codigo']) {
			$gal_codigo = addslashes($_POST['gal_codigo']);
			$gal_codigo_img = addslashes($_POST['gal_codigo_img']);
			
			$sql = "
				UPDATE
					galerias
				SET
					gal_codigo_img = ". $gal_codigo_img .",
					gal_titulo = '". $gal_titulo ."',
					gal_local = '". $gal_local ."',
					gal_data = '". System::format_date($gal_data, 'Y-m-d') ."'
				WHERE
					gal_codigo = ". $gal_codigo;
		} else {
			$gal_codigo_img = 0;
			
			$sql = "
				INSERT INTO galerias
					(gal_codigo_usu, gal_codigo_img, gal_titulo, gal_local, gal_pasta, gal_data, gal_data_cadastro)
				VALUES
					(". $_SESSION['gb']['usu_codigo'] .", ". $gal_codigo_img .", '". $gal_titulo ."', '". $gal_local ."', '". $gal_pasta ."', '". System::format_date($gal_data, 'Y-m-d') ."', NOW())";

			mkdir('../galerias/'. $gal_pasta);
		}
		
		$qGal = mysql_query($sql);
		if (!$_POST['gal_codigo']) {
			$gal_codigo = mysql_insert_id();
		}
		
		if ($qGal) {
			$success = true;
		} else {
			$success = false;
		}
}

$template->assign('possui_imagens', $possui_imagens);
$template->assign('gal_codigo', $gal_codigo);
$template->assign('action', $_GET['act']);
$template->assign('success', $success);
$template->display('src/galerias/action.html');
?>