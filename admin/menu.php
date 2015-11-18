<?
ini_set("register_globals.php","1");
include("path.php");
include("../include/config.php");
$nivel=$_COOKIE['nivel'];
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="<? echo $corcelula2?>"> 
    <td width="14%" height="15" style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/administrar.php?nivel=<? echo $nivel?>&acao=lista">Administrar 
      Usu&aacute;rios</a></font></td>
    <td width="14%" style="border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../" target="_blank">Ver 
      Galerias</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/listar_galerias.php?nivel=<? echo $nivel?>">Listar 
      Galerias</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/cadastrar.php?nivel=<? echo $nivel?>">Cadastrar 
      Galeria</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../images/select_pastas.php?nivel=<? echo $nivel?>&usuario=<? echo $usuario?>">Enviar 
      Imagens</a></font></td>
    <td width="14%" style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/configurar.php?acao=form&id=1&nivel=<? echo $nivel?>">Configurar 
      </a></font></td>
    <td width="14%" style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?acao=sair">Logout 
      </a></font></td>
  </tr>
</table>
<br>
<font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>">Olá <b><? echo $usuario?></b>, seja bem vindo!</font>
<hr size="1" noshade color="<? echo $cortexto?>">


