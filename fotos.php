<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="230" height="240" valign="top"> 
     <?
$handle = opendir($dir);
$ext = "jpg";
$indice = 0;
$ipp = 4;

while (false !== ($file = readdir($handle)))
{
   $pathdata = pathinfo($file);
   if (!is_dir($file) && ($pathdata["extension"] == strtolower($ext)) || ($pathdata["extension"] == strtoupper($ext)))
   {
       $imagens[$indice] = $file;
       $indice++;
   }
}

if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
	$pagina = $_GET['pg'];
} else {
	$pagina = 1;
}

$paginas = ceil(count($imagens) / $ipp);
$inicio = ($pagina - 1) * $ipp;
$thumb = "imagemdim.php?imagem=";
$var1 = "&evento=". $rs['evento'] ."&data=". $rs['data'] ."&local=". $rs['local'];

for ($i = $inicio; $i < ($inicio + $ipp); $i++) {
	if($imagens[$i] != ""){
		$cont = $cont + 1;
		
		$res = getimagesize($dir . $imagens[$i]);
		if ($res[1] > 265) {
			$height = 265 ;
			$width = ($res[0] * $height) / $res[1];
		} else {
			$height = $res[1];
			$width = $res[0];
		}
		
		$width = ceil($width);
		$height = ceil($height);
?>

			<a href="javascript: mudar_foto('<?= $dir; ?>', '<?= $imagens[$i]; ?>', '<?= $width; ?>', '<?= $height; ?>');" >
				<img src="<?= $thumb . $dir . $imagens[$i]; ?>" hspace="1" vspace="1" border="1">
			</a>
<?php
	}
}
?>
		</td>
	</tr>
	<tr>
		<td width="230" align="left" valign="top"> 
			<hr size="1" noshade color="<?= $cortexto?>" />
			<table width="230" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td width="70" valign="top">
						<font color="<?= $cortexto?>" size="<?= $tfonte?>" face="<?= $fonte?>"><strong> 
						<?php
						$total = ceil(count($imagens));
						echo $total;
						?>
						</strong> Fotos.</font>
					</td>
					<td align="right" valign="top">
						<font color="<?= $cortexto?>" size="<?= $tfonte?>" face="<?= $fonte?>">
						<strong>P�ginas: </strong>
						<select name="pagina" id="pagina" onchange="mudar_pagina(this.value);"> 
						<?php
						for ($i = 1; $i <= $paginas; $i++) {
							$selected = ($i == $pagina) ? " selected=\"selected\"" : "";
							
							echo "<option value=\"". $i ."\"". $selected .">". $i ."</option>";
						}
						?>
						</select>
						</font>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
