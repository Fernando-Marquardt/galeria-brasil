<? include("verifica.php")?>
<? include("menu.php")?>

<script Language="JavaScript">
function validate(theForm) {
if (theForm.nome.value == "")
{
  alert("Digite o nome do Link");
  theForm.nome.focus();
  return (false);
}
return (true);
}
</script>
<Form Action="cadastrar_db.php?nivel=<? echo $nivel?>" Method="Post" onsubmit="return validate(this);" enctype="multipart/form-data">
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
      <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Cadastrar 
        Galeria</strong></font></td>
   </tr>
</table>
  <Table align="center" cellpadding="3" cellspacing="0" style="border: 1px solid <? echo $cortexto?>">
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Nome:</strong></font></td>
      <td width="280" colspan="5" bgcolor="<? echo $corcelula1?>"> <input name="nome" type="text" style="width:290;border:1px solid <? echo $cortexto?>" maxlength="255"> 
      </td>
    </TR>
    <tr> 
      <td align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Data:</strong></font></td>
      <td width="50" valign="top" bgcolor="<? echo $corcelula2?>"> 
        <input name="dia" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo date("d")?>" size="3" maxlength="2">
      </td>
      <TD width="50" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Mês:</strong></font></TD>
      <td width="50" valign="top" bgcolor="<? echo $corcelula2?>"> 
        <input name="mes" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo date("m")?>" size="3" maxlength="2">
      </td>
      <TD width="50" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Ano:</strong></font></TD>
      <td align="right" valign="top" bgcolor="<? echo $corcelula2?>"> 
        <input name="ano" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo date("Y")?>" size="6" maxlength="4">
      </td>
    </TR>
    <TR> 
      <td align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Local 
        do Evento:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula1?>"> <input name="local" type="text" style="width:290;border:1px solid <? echo $cortexto?>" maxlength="255"> 
      </td>
    </tr>
    <TR> 
      <td align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Pasta 
        de Destino:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula2?>"> 
        <input type="text" name="nomedapasta" style="width:290;border:1px solid <? echo $cortexto?>">
      </td>
    </TR>
    <TR> 
      <td align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Foto 
        de Destaque:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula1?>">
<input name="foto01" type="file" size="25" style="width:290;border:1px solid <? echo $cortexto?>">
      </td>
    </TR>
  </TABLE>
  
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <tr> 
     <td height="35" colspan="4" align="center"> 
       <INPUT Type="submit" Value="Cadastrar" name="Submit" style="width:100;border:1px solid <? echo $cortexto?>">
         <INPUT Type="reset" Value="Limpar" style="width:100;border:1px solid <? echo $cortexto?>">
     </td>
   </tr>
</table>
</FORM>
