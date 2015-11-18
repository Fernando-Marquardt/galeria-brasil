<?
include("path.php");
$sql = mysql_query("SELECT * FROM galeria");
?>

<link href="../../css/fonts.css" rel="stylesheet" type="text/css">

<?php
$busca = "SELECT * FROM galeria order by id desc";
$total_reg = "4"; // número max. de registros por página

if (!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
}

$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysql_query("$busca LIMIT $inicio,$total_reg");
$todos = mysql_query("$busca");
$tr = mysql_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas
?>


<? // Agora exiba o código com a configuração de sua tabela - o cabeçalho dela. ?>
<table width="326" border="0" align="center" cellpadding="0" cellspacing="0" >


<?
// Agora vamos montar o código. Pegue o valor total de resultados:
$total = mysql_num_rows($sql);

// Defina o número de colunas que você deseja exibir:
$colunas = "1";

// Agora vamos ao "truque":
if ($total>0) {
for ($i = 0; $i < $total; $i++) {
if (($i%$colunas)==0) {
?>
<? }?>


<? // Inicio Da Tabela ##################################################################
while ($dados = mysql_fetch_array($limite)) {
?>
<tr>
<td colspan="3" align="left" valign="top" style="padding-top:10px"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"></font>
<table width="326" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFAF38">

<tr>
  <td width="73" rowspan="4"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><img src="imagemdimindex.php?imagem=images/galeria/<? echo $dados['pasta']?>/<? echo $dados['foto01']?>" hspace="5" vspace="5" border="0" align="bottom" /></a></font></td>
  <td align="left" valign="middle"><span style="padding-left:5px;"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">
    <? if($dados[foto01] != ""){?>
    <? }?>
    <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><span style="text-transform: uppercase" class="linkHover"><b><a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><? echo $dados['nome']?></a></b></span></font></font></span></td>
</tr>
<tr>
<td width="300" align="left" valign="middle"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Data: <strong><? echo $dados['dia'],"/",$dados['mes'],"/",$dados[ano];?></strong></font></td>
</tr>
<tr>
<td align="left" valign="middle"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Local: <strong><? echo $dados['local']?></strong></font></td>
</tr>
<tr>
<td align="left" valign="middle"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Fotos:<strong>
<?
$dir="images/galeria/$dados[pasta]";
$dir1=opendir($dir);
$cont=0;
while ($res=readdir($dir1) ){
$tipo=explode(".",$res);
if ($tipo[1]=="jpg" || $tipo[1]=="JPG"){
$cont=$cont+1;
}
}
print ($cont);
?>

</strong></font></td>
</tr>
</table>

<? } ?>
<? //Fim Da Tabela ############################################################################ ?></td>

<? }}?>
</table> 