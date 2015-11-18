<? if($acao == "form"){
include("verifica.php");
include("menu.php");

$sql = mysql_query("SELECT * FROM config where id='$id'");
while ($dados=mysql_fetch_array($sql)) {
?>
<script src="../css/janelas_popup.js" language="JavaScript"></script>
<script>this.name='pai'; </script>
<form method='POST' action='configurar.php?acao=alterar&id=<? echo $id?>&nivel=<? echo $nivel?>'>
  <table width="400" border='0' align="center" cellpadding='0' cellspacing='0'>
    <tr> 
                  
      <td height='30' align='center'><font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><strong> 
        Configurara&ccedil;&otilde;es do site.</strong></font></td>
  </tr>
</table>
              
  <table border='0' align="center" cellpadding='3' cellspacing='0' style="border: 1px solid <? echo $cortexto?>">
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td width="120" align='right' bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Titulo 
        do site:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='tsite2' type='text' value="<? echo $dados[tsite]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>URL 
        do site:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='usite2' type='text' value="<? echo $dados[usite]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Fonte:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='fonte2' type='text' value="<? echo $dados[fonte]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Tamanho 
        Fonte:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='tfonte2' type='text' value="<? echo $dados[tfonte]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Tamanho 
        T&iacute;tulo:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='ttitulo2' type='text' value="<? echo $dados[ttitulo]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        Texto:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="cortexto_antiga" value="<? echo $dados[cortexto]?>">
	  <input disabled type='text' value="<? echo $dados[cortexto]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='cortexto_nova' type='text' value="<? echo $novacortexto?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=cortexto');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        OnMouseOver:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="coronmouse_antiga" value="<? echo $dados[coronmouse]?>">
	  <input disabled type='text' value="<? echo $dados[coronmouse]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='coronmouse_nova' type='text' value="<? echo $novacoronmouse?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=coronmouse');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        do Layout 1:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corcelula1_antiga" value="<? echo $dados[corcelula1]?>">
	  <input disabled type='text' value="<? echo $dados[corcelula1]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corcelula1_nova' type='text' value="<? echo $novacorcelula1?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corcelula1');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        do Layout 2:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corcelula2_antiga" value="<? echo $dados[corcelula2]?>">
	  <input disabled type='text' value="<? echo $dados[corcelula2]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corcelula2_nova' type='text' value="<? echo $novacorcelula2?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corcelula2');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        de Fundo:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corfundosite_antiga" value="<? echo $dados[corfundosite]?>">
	  <input disabled type='text' value="<? echo $dados[corfundosite]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corfundosite_nova' type='text' value="<? echo $novacorfundosite?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corfundosite');">Nova Cor</a></font></td>
    </tr>
  </table>
              
  <table width="400" border='0' align="center" cellpadding='0' cellspacing='0'>
    <tr> 
                  
      <td height="35" colspan='2' align="center"> 
        <center>
                      
          <input type='submit' value='Alterar' style="width:100;border:1px solid <? echo $cortexto?>">
                      
          <input type='reset' value='Limpar' style="width:100;border:1px solid <? echo $cortexto?>">
        </center></td>
  </tr>
  </table>
  </form>
<? }
} if($acao == "alterar"){
include("verifica.php");
include("menu.php");

if($_POST[cortexto_nova] != ""){$nova_cortexto = "#$cortexto_nova";} else {$nova_cortexto = "$cortexto_antiga";}
if($_POST[coronmouse_nova] != ""){$nova_coronmouse = "#$coronmouse_nova";} else {$nova_coronmouse = "$coronmouse_antiga";}
if($_POST[corcelula1_nova] != ""){$nova_corcelula1 = "#$corcelula1_nova";} else {$nova_corcelula1 = "$corcelula1_antiga";}
if($_POST[corcelula2_nova] != ""){$nova_corcelula2 = "#$corcelula2_nova";} else {$nova_corcelula2 = "$corcelula2_antiga";}
if($_POST[corfundosite_nova] != ""){$nova_corfundosite = "#$corfundosite_nova";} else {$nova_corfundosite = "$corfundosite_antiga";}

$sql = mysql_query("UPDATE config SET tsite='$tsite2', usite='$usite2', fonte='$fonte2', tfonte='$tfonte2', ttitulo='$ttitulo2', coronmouse='$nova_coronmouse', cortexto='$nova_cortexto', corcelula1='$nova_corcelula1', corcelula2='$nova_corcelula2', corfundosite='$nova_corfundosite' WHERE id='$id'");
?>
<meta http-equiv="refresh" content="0;URL=?acao=form&amp;id=<? echo $id?>&amp;nivel=<? echo $nivel?>">
<center><font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><b>Configurações alteradas com sucesso!</b></font><font color="<? echo $cortexto?>"><BR><br><font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='?acao=form&id=<? echo $id?>&nivel=<? echo $nivel?>'>Clique aqui para Voltar</a></font></font></center>
<? }?>
