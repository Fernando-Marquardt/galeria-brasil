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
<style type="text/css">
.sim {}
.nao { background-color: #CCCCCC}
</style>
<script>
function Habilitar() {
nForm = document.forms['cadastro'];
    if(nForm.elements['nova_foto'].checked = true) {
        nForm.elements['foto01'].disabled = false;
		nForm.elements['foto01'].className= "sim";
    } 
}

function desabilitar() {
nForm.elements['foto01'].disabled = true;
nForm.elements['foto01'].className = "nao";
}
</script>

<?
$sql = mysql_query("SELECT * FROM galeria where id='". $_GET['id'] ."'");
while ($dados=mysql_fetch_array($sql)) {
?>

<Form Action="alterar_db.php?id=<? echo $_GET['id']?>&nivel=<? echo $nivel?>" Method="Post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validate(this);">
  <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
      <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Alterar 
        Galeria</strong></font></td>
   </tr>
</table>
  <Table align="center" cellpadding="3" cellspacing="0" style="border: 1px solid <? echo $cortexto?>">
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Nome:</strong></font></td>
      <td width="280" colspan="5" bgcolor="<? echo $corcelula1?>"> <input name="nome" type="text" style="width:290;border:1px solid <? echo $cortexto?>" value="<? echo $dados[nome]?>" maxlength="255"> 
      </td>
    </TR>
    <tr> 
      <td align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Data:</strong></font></td>
      <td width="50" valign="top" bgcolor="<? echo $corcelula2?>"> <input name="dia" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo $dados[dia]?>" size="3" maxlength="2"> 
      </td>
      <TD width="50" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Mês:</strong></font></TD>
      <td width="50" valign="top" bgcolor="<? echo $corcelula2?>"> <input name="mes" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo $dados[mes]?>" size="3" maxlength="2"> 
      </td>
      <TD width="50" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Ano:</strong></font></TD>
      <td align="right" valign="top" bgcolor="<? echo $corcelula2?>"><input name="ano" type="text" style="border:1px solid <? echo $cortexto?>" value="<? echo $dados[ano]?>" size="6" maxlength="4"> 
      </td>
    </TR>
    <TR> 
      <td align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Local 
        do Evento:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula1?>"> <input name="local" type="text" style="width:290;border:1px solid <? echo $cortexto?>" value="<? echo $dados[local]?>" maxlength="255"> 
      </td>
    </tr>
    <TR> 
      <td align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Pasta 
        de Destino:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula2?>"><input name="pastaantiga" type="hidden" value="<? echo $dados[pasta]?>"> 
        <input name="pastanova" type="text" style="width:290;border:1px solid <? echo $cortexto?>" value="<? echo $dados[pasta]?>"></td>
    </TR>

    <TR bgcolor="<? echo $corcelula1?>"> 
      <td align="right"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Foto 
        de Destaque:</strong></font></td>
     
      <td valign="middle"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
        <? if($dados[foto01] != "") { echo "<b><a href=\"../images/galeria/$dados[pasta]/$dados[foto01]\" target=_blank><img src=\"../images/galeria/$dados[pasta]/$dados[foto01]\" border=1 height=42></a><input name=foto_antiga type=hidden value=$dados[foto01] size=12>";} else { echo "<b>nenhuma foto</b>";}?>
        </font> </td>
            
      <td colspan="4" align="right" valign="top"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Trocar 
        Foto?</strong>:<BR>
              <input name="nova_foto" type="radio" value="nao" checked onClick="javascript:desabilitar()">
              N&atilde;o 
              <input name="nova_foto" type="radio" onClick="javascript: Habilitar();" value="sim">
              Sim 
              <input name="nova_foto" type="radio" value="nada" onClick="javascript:desabilitar()">
              Sem foto<br>
              </font> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto_antiga" type="hidden" value="<? echo $dados[foto01]?>">
              <input name='foto01' type='file' size=14 disabled class="nao">
              </font></td>
			  </TR>
  </table>

 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <tr> 
     <td height="35" colspan="4" align="center"> 
       <INPUT Type="submit" Value="Alterar" name="Submit" style="width:100;border:1px solid <? echo $cortexto?>">
         <INPUT Type="reset" Value="Limpar" style="width:100;border:1px solid <? echo $cortexto?>">
     </td>
   </tr>
</table>
</FORM>
<? }?>