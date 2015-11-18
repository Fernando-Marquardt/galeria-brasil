<?php
include("path.php");

$query = mysql_query("SELECT * FROM galeria"); 

// Agora exiba o código com a configuração de sua tabela - o cabeçalho dela.
?>

<table border="0" cellpadding="0" cellspacing="0">

<?
// Agora vamos montar o código. Pegue o valor total de resultados: 
$total = mysql_num_rows($query); 
// Defina o número de colunas que você deseja exibir: 
$colunas = "2"; 
// Agora vamos ao "truque": 
if ($total > 0) { 
	for ($i = 0; $i < $total; $i++) { 
		if (($i % $colunas) == 0) { 
?>
	<tr>
		<td height="20" colspan="4"> 
			<hr align="center" width="100%" size="1" noshade color="<?= $cortexto?>" />
		</td>
	</tr>
	<tr> 
<?php
		}
		
		$dados= mysql_fetch_array($query) ;
?>
		<td width="280" align="left" valign="top">
			<font color="<?= $cortexto?>" size="<?= $tfonte?>" face="<?= $fonte?>"> 
		<?php
		if ($dados['foto01'] != "") {
		?>
			<a href="javascript:AbreJanelaGaleria('janela.php?id=<?= $dados['id']; ?>')">
				<img src="imagemdimindex.php?imagem=images/galeria/<?= $dados['pasta']?>/<?= $dados['foto01']?>" border="1" align="left">
			</a> 
		<?php
		}
		?>
			<span style="text-transform: uppercase">
				<strong><a href="javascript:AbreJanelaGaleria('janela.php?id=<?= $dados['id'];?>')"><?= $dados['nome']?></a></strong>
			</span>
			<br />
			Data: <strong><?= $dados['dia'] ."/". $dados['mes'] ."/". $dados['ano'];?></strong>
			<br />
			Local: <strong><?= $dados['local']?></strong>
			<br />
			<strong> 
		<?php
		$dir = "images/galeria/". $dados['pasta'];
		$dir1 = opendir($dir);
		$cont = 0;
		while ($res = readdir($dir1)) {
			$tipo = explode(".", $res);
			if ($tipo[1] == "jpg" || $tipo[1] == "JPG"){
				$cont = $cont + 1;
			}
		}
		echo $cont;
		?>
			</strong>Fotos.
			</font>
		</td>
		<td width="15"></td>
	<?php
	}
}
	?>
	</tr>
</table>
