<?php
include("path.php");

session_start();

if ((!isset($_GET['id']) || !is_numeric($_GET['id'])) && (!isset($_SESSION['id']) || !is_numeric($_SESSION['id']))) {
	echo "Nenhuma galeria selecionada";
	exit();
} elseif (isset($_GET['id'])) {
	$_SESSION['id'] = $_GET['id'];
}

$sql = "SELECT *, nome AS evento, CONCAT_WS('/', dia, mes, ano) AS data FROM galeria WHERE id = ". $_SESSION['id'];
$query = mysql_query($sql);

if (mysql_num_rows($query) == 0) {
	echo "Galeria não encontrada.";
	exit();
} else {
	$rs = mysql_fetch_array($query);
	
	if (isset($_GET['foto'])) {
		$foto = $_GET['foto'];
	} else {
		$foto = $rs['foto01'];
	}
}

$dir = "images/galeria/". $rs['pasta'] ."/";
?>
<script src="js/janelas_popup.js" language="JavaScript"></script>

<!-- Alguns input hidden que irão armazenar alguma informações on-fly -->
<input type="hidden" name="foto_atual" id="foto_atual" value="<?= $foto; ?>" />
<input type="hidden" name="dir" id="dir" value="<?= $dir; ?>" />

<table border="0" align="center" cellpadding="1" cellspacing="0">
	<tr>
		<td align="left" colspan="2">
			<font color="<?= $cortexto?>" size="<?= $tfonte?>" face="<?= $fonte?>">
			<strong><span style="text-transform: uppercase">
			<font size="<?= $ttitulo?>"><?= $rs['evento'];?></font>
			</span></strong>
			<br />
     		<?= $rs['data'];?>  -  <?= $rs['local'];?>
     		</font><br /> 
     		<hr width="100%" size="1" noshade color="<?= $cortexto?>" />
     	</td>
	</tr>
	<tr> 
		<td width="240" valign="top">
			<div style="width: 240px; height: 300px; overflow: auto;">
				<?php
				require("fotos.php");
				?>
			</div>
		</td>
		<td width="356" valign="top">
			<div id="zoom" style="width: 356px; height 320px;">
				<?php
				require("zoom.php");
				?>
			</div>
		</td>
	</tr>
</table>