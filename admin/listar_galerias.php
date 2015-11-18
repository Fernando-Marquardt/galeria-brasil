<? include("verifica.php")?>
<? include("menu.php")?>

<script src="../css/janelas_popup.js" language="JavaScript"></script>
<?
$sql = mysql_query("SELECT * FROM galeria order by id");
$total = mysql_num_rows($sql); 
?>
<table width="400" align="center" cellpadding="0" cellspacing="0">
  <TR> 
    <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Lista 
      de Galerias</strong></font></td>
  </tr>
  <TR> 
    <TD height="25" align="center"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Total 
      de Galerias: <strong><? echo $total?></strong></font></TD>
  </TR>
</table>
 
<Table width="400" align="center" cellpadding="0" cellspacing="1" style="border: 1px solid <? echo $cortexto?>">
  <TR align="center" bgcolor="<? echo $corcelula1?>"> 
    <TD width="30" height="15"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>ID</strong></font></TD>
    <TD width="310" height="15"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>GALERIAS</strong></font></TD>
    <TD width="60" height="15"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>ALTERAR</strong></font></TD>
    <TD width="60" height="15"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>EXCLUIR</strong></font></TD>
  </TR>
  <? while ($dados=mysql_fetch_array($sql)) {?>
  <TR> 
    <TD height="5" colspan="4"></TD>
  </TR>
  <TR bgcolor="<? echo $corcelula2?>"> 
    <TD height="15" align="center"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><? echo $dados[id]?></font></td>
    <TD align="left"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="javascript:AbreJanelaGaleria('../janela.php?dir=images/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><? echo $dados[nome]?></a></font></TD>
    <TD align="center"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="alterar.php?id=<? echo $dados[id]?>&nivel=<? echo $nivel?>">Alterar</a></font></TD>
    <TD align="center"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="excluir_db.php?id=<? echo $dados[id]?>&pasta=<? echo $dados[pasta]?>&nivel=<? echo $nivel?>">Excluir</a></font></TD>
  </tr>
  <? }?>
</TABLE>
