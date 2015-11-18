<?php
include "path.php";
  if ($acao=="gravar")
  {
$data = date("d/m/Y");
$hora = date("H;i");
    include "confmsg.php";
    conecta();
    $sql = mysql_query("INSERT INTO mensagemfoto (nome,pagina,comentario,data,hora) VALUES ('$username','$imagem','$comentario','$data','$hora')") or die("Erro ao inserir");
    echo "<br><br><center><font size='2' face='Verdana'>Mensagem Enviada com sucesso!</font><br>
		<a href=\"javascript:window.opener.location.reload(); self.close();\"><font size='2' face='Verdana'> Fechar Janela</font> </a> </center>";
exit;
};
?>

<body>
<form name=voto action="" method="post" name="eventos">
  <script language="javascript">
	function calcula() {
		intCaracteres = 250 - document.voto.comentario.value.length;
		if (intCaracteres > 0) {
			document.voto.restante.value = intCaracteres;
			return true;
		} else {
			intcomentario = 250;
			document.voto.restante.value = 0;
			document.voto.comentario.value = document.voto.comentario.value.substr(0,intcomentario);
			return false;
		}
	}
	</script>

<body bgcolor='#FBFDFF'>
<p>
    <p>
    <center>
	<font color=003468 face=verdana size=2><b>
    Comentar foto<br>
</b><br>
</font> <font color="003468" face="verdana" size="1">O coment&aacute;rio a seguir 
&eacute; por toda a sua responsabilidade!</font><font color=003468 face=verdana size=2><font color=red face=verdana> 
<P>
<input type=hidden name=id value="<? echo $id; ?>"><font face=Verdana size=2><input type=hidden class=form_news name=id value="<? echo $id; ?>">
	
<table width=250 cellpadding=0 cellspacing=0>
  <tr> 
    <td width=80> <B> <font color=black face=verdana size=1> Nome:</font></font></font></font> 
      </b><font color=003468 face=verdana size=2>&nbsp; </font> 
    <td width=170> <font face=Verdana size=2> 
      <input class=form_news name='username' size='20'>
      </font><br> 
</table>

<b>

	<font color=black face=verdana size=1>
	Mensagem:<br>
    </font>

	<font color=#FBFDFF face=verdana size=1>
	<textarea name="comentario" class=form_news cols="35" rows="4" onkeyup="return calcula()" style="width: 287; height: 79"></textarea></font>

	<font color=black face=verdana size=1>
	<font color=003468 face=verdana size=2><P>

	<font color=black face=verdana size=1><b>
    Caracteres restantes:
	<input class=form_news type=text name=restante size=5 READONLY value='250' style="width: 30; height: 16"><p>

	<input type="hidden" name="acao" value="gravar">
          <input type="submit" name="Submit" value="Enviar" style="width: 55; height: 23; border: 1px solid $cortexto?>">
	</form>
    </b></font>
