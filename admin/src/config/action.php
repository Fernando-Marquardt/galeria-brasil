<?php
if (!$_SESSION['gb']['usu_codigo']) { header('Location: login.php'); die('Não autorizado'); }

require('../core/class.image.php');

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
		
		/**
		 * Deleta a imagem de marca d'água ou atualiza a mesma se necessário
		 */
		if ($_POST['deletar_marca']) {
			unlink('../galerias/marca.png');
		} elseif ($_FILES['imagem_marca']['tmp_name']) {
			$img = new Image($_FILES['imagem_marca']['tmp_name']);
			
			$img->draw('../galerias/marca.png', IMAGETYPE_PNG);
		}
		
		/**
		 * Atualiza a imagem de 'Não possui imagem'
		 */
		if ($_FILES['imagem_nao_possui']['tmp_name']) {
			$img = new Image($_FILES['imagem_nao_possui']['tmp_name']);
			
			$img->draw('../galerias/nao_possui_imagem.png', IMAGETYPE_PNG);
		}
		
		/**
		 * Atualiza a imagem de 'Imagem não encontrada'
		 */
		if ($_FILES['imagem_nao_encontrada']['tmp_name']) {
			$img = new Image($_FILES['imagem_nao_encontrada']['tmp_name']);
			
			$img->draw('../galerias/imagem_nao_encontrada.png', IMAGETYPE_PNG);
		}
}

$template->assign('success', $success);
$template->display('src/config/action.html');
?>