<?
include("path.php");
include("../include/config.php");
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="<? echo $corcelula2?>">
    <td height="15" style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/administrar.php?nivel=<? echo $nivel?>&acao=lista">Administrar
      Usu&aacute;rios</a></font></td>
    <td style="border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../" target="_blank">Ver
      Galerias</a></font></td>
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/listar_galerias.php?nivel=<? echo $nivel?>">Listar
      Galerias</a></font></td>
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/cadastrar.php?nivel=<? echo $nivel?>">Cadastrar
      Galeria</a></font></td>
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../images/criar_dir.php?nivel=<? echo $nivel?>">Criar Pasta</a></font></td>
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../images/select_pastas.php?nivel=<? echo $nivel?>&usuario=<? echo $usuario?>">Enviar
      Imagens</a></font></td>
 	<td style="border:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?acao=sair">Logout
      </a></font></td>
	</tr>
	<tr align="center" bgcolor="<? echo $corcelula2?>">
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/editar_comentarios.php">Editar
      Comentários</a></font></td>
	<td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../calendario/insere.php">Inserir Evento no calendário</a></font></td>
    <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/editar_eventos.php">Editar Eventos do Calendario<td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">
	<font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">
	<a href="../images/marca.select_pastas.php?nivel=<? echo $nivel?>&usuario=<? echo $usuario?>">
	Marcar Imagens</font></td></a>
     <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="../admin/configurar.php?acao=form&id=1&nivel=<? echo $nivel?>">Configurar
      </a></font></td>
  </tr>
	<tr align="center" bgcolor="<? echo $corcelula2?>">
	  <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>"><a href="../images/listar_pastas.php"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> Listar pastas</font></a></td>
	  <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
	  <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">    
	  <td>    
	  <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
	  <td style="border-left:1px solid <? echo $cortexto?>;border-top:1px solid <? echo $cortexto?>;border-bottom:1px solid <? echo $cortexto?>">&nbsp;</td>
  </tr>
</table>
<br>
<font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>">Olá <b><? echo $usuario?></b>, seja bem vindo!</font>
<hr size="1" noshade color="<? echo $cortexto?>">


