<? include("path.php");?>

<script Language="JavaScript">
function validate(theForm) {
if (theForm.nome.value == "")
{
  alert("Digite seu Nome!");
  theForm.nome.focus();
  return (false);
}
if (theForm.email.value == "")
{
  alert("Digite seu E-mail!");
  theForm.email.focus();
  return (false);
}
if (theForm.telefone.value == "")
{
  alert("Digite o numero de seu telefone!");
  theForm.telefone.focus();
  return (false);
}
if (theForm.endereco.value == "")
{
  alert("Digite o seu endereço!");
  theForm.endereco.focus();
  return (false);
}
if (theForm.cidade.value == "")
{
  alert("Digite a sua cidade!");
  theForm.cidade.focus();
  return (false);
}
return (true);
}
</script>

<center>
<form action="comprarfoto_cod.php" method="post" onsubmit="return validate(this);">
   <p><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
     <strong>COMPRAR FOTO</strong></font></p>
   <p> 
     <input name="dir" type="hidden" value="<? echo $dir?>">
     <input name="evento" type="hidden" value="<? echo $evento?>">
     <input name="data" type="hidden" value="<? echo $data?>">
     <input name="local" type="hidden" value="<? echo $local?>">
     <input name="imagem" type="hidden" value="<? echo $imagem?>">
   </p>
   <table width="421" border="0" cellpadding="0" cellspacing="2">
     <tr> 
       <TD width="104" align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Nome 
         Completo:</font></strong></TD>
       <TD width="311"> 
         <INPUT name="nome" style="BORDER:1px solid <? echo $cortexto?>; width:200" size="40" maxLength="100">
       </TD>
     </tr>
     <tr> 
       <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">E-mail:</font></strong></TD>
       <TD><INPUT name="email" style="BORDER:1px solid <? echo $cortexto?>; width:200" size="40" maxLength="100"></TD>
     </tr>
    <tr> 
       <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Telefone:</font></strong></TD>
       <TD> 
         <INPUT name="telefone" style="BORDER:1px solid <? echo $cortexto?>; width:200" size="40" maxLength="100">
       </TD>
     </tr>
    <tr> 
       <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Endereço 
         Completo:</font></strong></TD>
       <TD> 
         <textarea name="endereco" cols="40" rows="5" style="BORDER:1px solid <? echo $cortexto?>; width:200"></textarea>
       </TD>
     </tr>
     <tr> 
       <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Cidade/Estado:</font></strong></TD>
       <TD> 
         <INPUT name="cidade" style="BORDER:1px solid <? echo $cortexto?>; width:200" size="40" maxLength="100">
       </TD>
     </tr>
     <tr align="center"> 
       <TD height="30" colSpan=2> 
         <INPUT type=submit value=Enviar style="border:1px solid <? echo $cortexto?>"> 
         <INPUT type=reset value=Limpar style="border:1px solid <? echo $cortexto?>">
       </TD>
     </tr>
   </table>
  
   <table width="240" height="160" border="0" cellpadding="0" cellspacing="0">
     <tr>
       <td height="100%" valign="bottom" background="<? echo $imagem;?>"></td>
     </tr>
   </table>
   <p><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>TAMANHO 
     DA FOTO IMPRESSA: 10x15 CM = R$2,00</strong></font></p>
 </form>
</center>