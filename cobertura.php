<?php include("path.php");
$busca = "SELECT * FROM galeria order by id DESC"; ?>
<?php $total_reg = "16"; // número de registros por página ?>
<?php if (!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
} ?>
<?php
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;
?>
<?php
$limite = mysql_query("$busca LIMIT $inicio,$total_reg ");
$todos = mysql_query("$busca");

$tr = mysql_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas


// Agora vamos montar o código. Pegue o valor total de resultados: 
$total = mysql_num_rows($limite); 
// Defina o número de colunas que você deseja exibir: 
$colunas = "3"; 
// Agora vamos ao "truque": 
if ($total>0) { 
for ($i = 0; $i < $total; $i++) { 
if (($i%$colunas)==0) { 
?>
<script src="css/janelas_popup.js" language="JavaScript"></script>
<body bgcolor="#FFFFFF" text="#000000">
<div align="center">
<table width="84%" border="0" align="center" cellpadding="0" cellspacing="0">
<TR> 
<TD height="20" colspan="4">&nbsp;</TD>
</tr>
<tr> 
<? }?>
<?
$dados= mysql_fetch_array($limite) ;
?>
<td width="349" align="left" valign="top" bgcolor="#FFAF38"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
<? if($dados[foto01] != ""){?>
<a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><img src="imagemdimindex.php?imagem=images/galeria/<? echo $dados['pasta']?>/<? echo $dados['foto01']?>" border="1" align="left"></a> 
<? }?>
<span style="text-transform: uppercase"><b><a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><? echo $dados['nome']?></a></b></span></font><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><BR>
Data: <strong><? echo $dados['dia'],"/",$dados['mes'],"/",$dados[ano];?></strong><br>
Local: <strong><? echo $dados['local']?></strong><br>
<strong> 
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
</strong>Fotos.</font></font></td>
<TD width="295" bgcolor="#FFAF38"></TD>
<? }}?>
</TR>
</table>
<br>
<font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
<strong> 
<? // agora vamos criar os botões "Anterior e próximo"
$anterior = $pc -1;
$proximo = $pc +1;
if ($pc>1) {
echo " <a href='?pagina=$anterior'><- Festas Anteriores</a> ";
}
echo "|";
if ($pc<$tp) {
echo " <a href='?pagina=$proximo'>Mais Festas -></a>";
}
?>
</strong></font><br>
<br>
<font color="<? echo $cortexto?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Total 
de pag&iacute;nas<strong> <font color="<? echo $cortexto?>"><font color="<? echo $cortexto?>"><? echo $tp?></font></font></strong><font color="<? echo $cortexto?>"><font color="<? echo $cortexto?>">, 
voc&ecirc; est&aacute; na<strong> <font color="<? echo $cortexto?>"><font color="<? echo $cortexto?>"><font color="<? echo $cortexto?>"><? echo $pc?></font></font></font></strong></font></font></font></font><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&ordm; 
pag&iacute;na</font></strong><br>
<font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Mostrando<strong> 
</strong></font><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $total_reg?></strong></font></font> 
<font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
</strong>festas do total<strong> <? echo $tr?> </strong>na se&ccedil;&atilde;o 
&quot;Ult&iacute;mas festas&quot;</font><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
<br>
</strong></font><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"></font></font></font></font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
</strong></font></font></font></font></div>