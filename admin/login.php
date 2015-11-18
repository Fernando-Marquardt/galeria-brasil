<?
include ("../register_global.php");
include("path.php");

$query = mysql_query("Select * From users where login='$login_' and senha='$senha_'");
$valida = mysql_fetch_array($query);

$user = $valida["login"];
$pass = $valida["senha"];
$nivel = $valida["nivel"];

if($login_ == '' || $senha_ == ''){
?>
<? include("../include/config.php");?>
<HTML>
<title><? echo $tsite?></title>
<Script Language="JavaScript">
function validate(form1) {
if (form1.login_.value == "")
{ alert("O Campo Login é obrigatório!");
   form1.login_.focus();
return (false);
}
if (form1.senha_.value == "")
{ alert("O Campo Senha é obrigatório!");
   form1.senha_.focus();
   return (false);
}
return (true);
}
</script>
<form action="login.php?nivel=<? echo $nivel?>" method="post" onsubmit="return validate(this);">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="2">
    <tr valign="top">
      <td height="45" colspan="3" align="center"><strong><font size="<? echo $ttitulo?>" face="<? echo $fonte?>">Sistema
        de Login</font></strong></td>
    </tr>
</table>

<table border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="60" align="right"><font face="<? echo $fonte;?>" size="<? echo $tfonte;?>">Login:</font></td>
      <td colspan="2"><input name="login_" type="text" size="25"></td></tr>
<tr>
      <td width="60" align="right"><font face="<? echo $fonte;?>" size="<? echo $tfonte;?>">Senha:</font></td>
      <td><input name="senha_" type="password" size="15"></td>
	  <td><input name="logar" type="submit" value="Logar"></td>
	  </tr>
</table>
</form>
</HTML>
<?
} elseif($login_ == $user && $senha_ == $pass){
setcookie("usuario", $login_,0,"/");
setcookie("senha", $senha_,0,"/");
setcookie("nivel",$nivel,0,"/");
header("Location: administrar.php");
} elseif($login_ != $valida["login"] || $senha_ != $valida["senha"]){
?>
<? include("../include/config.php");?>
<HTML>
<title><? echo $tsite?></title>
<Script Language="JavaScript">
function validate(form1) {
if (form1.login_.value == "")
{ alert("O Campo Login é obrigatório!");
   form1.login_.focus();
return (false);
}
if (form1.senha_.value == "")
{ alert("O Campo Senha é obrigatório!");
   form1.senha_.focus();
   return (false);
}
return (true);
}
</script>
<form action="login.php" method="post" onsubmit="return validate(this);">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="2">
    <tr valign="top">
      <td height="45" colspan="3" align="center"><font size="<? echo $ttitulo?>" face="<? echo $fonte?>"><font color="#FF0000"><strong>Usuário ou Senha Inválidos</strong></font>
	  <br><font size="1">Por favor tente novamente!</font>
</font></td>
    </tr>
</table>
  <table border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="60" align="right"><font face="<? echo $fonte;?>" size="<? echo $tfonte;?>">Login:</font></td>
      <td colspan="2"><input name="login_" type="text" size="25"></td></tr>
<tr>
      <td width="60" align="right"><font face="<? echo $fonte;?>" size="<? echo $tfonte;?>">Senha:</font></td>
      <td><input name="senha_" type="password" size="15"></td>
	  <td><input name="logar" type="submit" value="Logar"></td>
	  </tr>
</table>
</form>
</HTML>
<? }?>
