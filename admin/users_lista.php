<table width="400" align="center" cellpadding="0" cellspacing="0">
  <TR>
      
    <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Lista 
      de Usu&aacute;rios</strong></font></td>
   </tr>
</table>
  
<Table align="center" cellpadding="2" cellspacing="0" style="border: 1px solid <? echo $cortexto?>">
  <tr align="center" bgcolor="<? echo $corcelula1?>"> 
    <td width="30" style="border-right: 1px solid <? echo $corcelula2?>"><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">ID</font></strong></td>
    <td width="40" style="border-right: 1px solid <? echo $corcelula2?>" align="center"><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">NÍVEL</font></strong></td>
    <td width="150" style="border-right: 1px solid <? echo $corcelula2?>" align="center" bgcolor="<? echo $corcelula1?>"><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">LOGIN</font></strong></td>
    <td width="65" style="border-right: 1px solid <? echo $corcelula2?>"><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">ALTERAR</font></strong></td>
    <td width="65"><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">EXCLUIR</font></strong></td>
  </tr>
  <? while ($dados=mysql_fetch_array($sql)) {?>
    <tr><td colspan="5" height="5"></td></tr>
  <tr align="center" bgcolor="<? echo $corcelula2?>"> 
    <td style="border-right: 1px solid <? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><? echo "$dados[id]";?></font></td>
    <td style="border-right: 1px solid <? echo $corcelula1?>" align="center"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><? echo "$dados[nivel]";?></font></td>
    <td style="border-right: 1px solid <? echo $corcelula1?>" align="left"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><? echo "$dados[login]";?></font></td>
    <td style="border-right: 1px solid <? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?nivel=<? echo $nivel?>&acao=altera&id=<? echo "$dados[id]";?>">Alterar</a></font></td>
    <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?nivel=<? echo $nivel?>&acao=deleta&id=<? echo "$dados[id]";?>">Exluir</a></font></td>
  </tr>
  <? }?>
</table>
