<form action="?nivel=<? echo $nivel?>&acao=cadastra_db" method="post">
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
      <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Cadastrar Usuário</strong></font></td>
   </tr>
</table>
  <Table align="center" cellpadding="3" cellspacing="0" style="border: 1px solid <? echo $cortexto?>">
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Nome:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula1?>"> 
        <input name="nome" type="text" style="width:220;border:1px solid <? echo $cortexto?>" maxlength="255">
      </td>
    </TR>
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>E-mail:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula2?>"> 
        <input name="email" type="text" style="width:220;border:1px solid <? echo $cortexto?>" maxlength="255">
      </td>
    </TR>
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Login:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula1?>"> 
        <input name="login" type="text" style="width:220;border:1px solid <? echo $cortexto?>" maxlength="255">
      </td>
    </TR>
    <TR> 
      <td width="120" align="right" bgcolor="<? echo $corcelula2?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Senha:</strong></font></td>
      <td colspan="5" bgcolor="<? echo $corcelula2?>"> 
        <input name="user_senha" type="password" style="width:220;border:1px solid <? echo $cortexto?>" maxlength="255">
      </td>
    </TR>
  <tr> 
      <td width="120" align="right" bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong>Nível:</strong></font></td>
    <td bgcolor="<? echo $corcelula1?>"><select name="user_nivel" style="width:220;border:1px solid <? echo $cortexto?>" >
        <option value="1">Administrador</option>
        <option value="2">Usu&aacute;rio</option>
      </select>
    </td>
  </tr>
</table>
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <tr> 
     <td height="35" colspan="4" align="center"> 
       <INPUT Type="submit" Value="Cadastrar" name="Submit" style="width:100;border:1px solid <? echo $cortexto?>">
         <INPUT Type="reset" Value="Limpar" style="width:100;border:1px solid <? echo $cortexto?>">
     </td>
   </tr>
</table>
</form>