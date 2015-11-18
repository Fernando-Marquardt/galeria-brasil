<?php
require('core/class.image.php');

/**
 * Se não houver o nome da imagem, substitui pela imagem de aviso
 */
if ($_GET['img']) {
	$imagem_nome = $_GET['img'];
	$imagem_path = 'galerias/'. $_GET['gal'] .'/'. $imagem_nome;
} else {
	$imagem_nome = 'nao_possui_imagem.png';
	$imagem_path = 'galerias/'. $imagem_nome;
}

/**
 * Verifica se a imagem existe, senão substitui pela imagem de aviso
 */
if (!file_exists($imagem_path)) {
	$imagem_nome = 'imagem_nao_encontrada.png';
	$imagem_path = 'galerias/'. $imagem_nome;
}

header('Content-Disposition: inline; filename="'. $imagem_nome .'"');

$img = new Image($imagem_path);

$size = getimagesize($imagem_path);

switch ($_GET['thumb']) {
	case 1:
		if ($size[0] > 98 || $size[1] > 98) {
			$img->resize(98, 98, 'both');
		}
		break;
	case 2:
		if ($size[0] > 200 || $size[1] > 200) {
			$img->resize(200, 200, 'both');
		}
		break;
	case 3:
		if ($size[0] > 400 || $size[1] > 400) {
			$img->resize(400, 400, 'both');
		}
		
		
		if (file_exists('galerias/marca.png')) {
			$watermark = getimagesize('galerias/marca.png');
			
			$pos_x = $img->get_info('width') - 5 - $watermark[0];
			$pos_y = $img->get_info('height') - 5 - $watermark[1];
			
			$img->watermark('galerias/marca.png', $pos_x, $pos_y, 5);
		}
		break;
	default:
		if (file_exists('galerias/marca.png')) {
			$img->watermark('galerias/marca.png');
		}
}

$img->draw(null, null, 100);
?>