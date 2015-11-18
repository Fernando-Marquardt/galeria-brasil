<?php
require_once 'core/inc.comum.php';
?>

<Script Language="JavaScript">
function validate(theForm) {
    if (theForm.nome.value == "") {
        alert("Digite seu Nome!");
        theForm.nome.focus();
        return (false);
    }
    
    if (theForm.email.value == "") {
        alert("Digite seu E-mail!");
        theForm.email.focus();
        return (false);
    }
    
    if (theForm.nomepara.value == "") {
        alert("Digite o nome do seu amigo!");
        theForm.nomepara.focus();
        return (false);
    }
    
    if (theForm.emailpara.value == "") {
        alert("Digite o email do seu amigo!");
        theForm.emailpara.focus();
        return (false);
    }
    
    return (true);
}
</script>

<form action="indicacao_cod.php" method="post" onsubmit="return validate(this);">
    <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>"/>
    <input name="imagem" type="hidden" value="<?php echo $_GET['imagem']; ?>" />
    <input name="pagina" type="hidden" value="<?php echo $_GET['pg']; ?>" />
              
    <table border="0" cellspacing="2" cellpadding="0">
        <tr> 
            <td width="100" align=right>
                <label for="nome">Seu Nome:</label>
            </td>
            <td width="150">
                <input type="text" name="nome" id="nome" style="width: 150px;">
            </td>
        </tr>
        <tr> 
            <td align=right>
                <label for="email">Seu E-mail:</label>
            </td>
            <td>
                <input type="text" name="email" id="email" style="width: 150px;" />
            </td>
        </tr>
        <tr> 
            <td align=right>
                <label for="nomepara">Nome do Amigo:</label>
            </td>
            <td width="150">
                <input type="text" name="nomepara" id="nomepara" style="width: 150px;" />
            </td>
        </tr>
        <tr> 
            <td align=right>
                <label for="emailpara">E-mail do Amigo:</label>
            </td>
            <td>
                <input type="text" name="emailpara" id="emailpara" style="width: 150px;" />
            </td>
        </tr>
        <tr align="center"> 
            <td height="30" colspan=2>
                <input type="submit" value="Enviar" /> 
                <input type="reset" value="Limpar" />
            </td>
        </tr>
    </table>
</form>