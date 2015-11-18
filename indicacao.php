<? include("path.php");?>

<Script Language="JavaScript">
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
if (theForm.nomepara.value == "")
{
   alert("Digite o nome do seu amigo!");
   theForm.nomepara.focus();
   return (false);
}
if (theForm.emailpara.value == "")
{
   alert("Digite o email do seu amigo!");
   theForm.emailpara.focus();
   return (false);
}
return (true);
}
</script>

<center>
<form action="indicacao_cod.php" method="post" onsubmit="return validate(this);">

<input name="id" type="hidden" value="<?= $_GET['id']?>">
<input name="imagem" type="hidden" value="<?= $_GET['imagem']?>">
<input name="pagina" type="hidden" value="<?= $_GET['pg']; ?>" />
              
    <table border="0" cellspacing="2" cellpadding="0">
      <tr> 
        <TD width="100" align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Seu 
          Nome:</font></strong></TD>
        <TD width="150"> <INPUT style="BORDER:1px solid <? echo $cortexto?>; width:150" maxLength="100" name="nome">
        </TD>
      </tr>
      <tr> 
        <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Seu 
          E-mail:</font></strong></TD>
        <TD><INPUT style="BORDER:1px solid <? echo $cortexto?>; width:150" maxLength="100" name="email"></TD>
      </tr>
      <tr> 
        <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Nome 
          do Amigo:</font></strong></TD>
        <TD width="150"> <INPUT style="BORDER:1px solid <? echo $cortexto?>; width:150" maxLength="100" name="nomepara">
        </TD>
      </tr>
      <tr> 
        <TD align=right><strong><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">E-mail 
          do Amigo:</font></strong></TD>
        <TD><INPUT style="BORDER:1px solid <? echo $cortexto?>; width:150" maxLength="100" name="emailpara"></TD>
      </tr>
      <tr align="center"> 
        <TD height="30" colSpan=2> <INPUT type=submit value=Enviar style="border:1px solid <? echo $cortexto?>"> 
          <INPUT type=reset value=Limpar style="border:1px solid <? echo $cortexto?>"> </TD>
      </tr>
    </table>
			</form>
</center>
