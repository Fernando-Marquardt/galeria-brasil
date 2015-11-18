<?
header("Content-type: image/jpeg");
$i = imagecreatefromjpeg($_GET['imagem']);
$i2 = imagecreatefromgif("http://www.vocejaviu.com.br/galeria/images/logofotos.gif");
imagecopymerge($i, $i2,390,620,0,0, imagesx($i2), imagesy($i2),100);
imagejpeg($i);
imagedestroy($i);
?>

