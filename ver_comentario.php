<?
include "path.php";
include "confmsg.php";
$query = "SELECT * FROM mensagemfoto WHERE pagina='$imagem' order by post desc";
$result = mysql_query($query) or die("Error: " . mysql_error());
$sql = mysql_query("SELECT * FROM mensagemfoto WHERE pagina='$imagem'");
if(mysql_num_rows($sql)>0) {
while ($row = mysql_fetch_assoc($result))
		{
		$nome = $row['nome'];
		$comentario = $row['comentario'];
		$data = $row['data'];
		$hora = $row['hora'];
echo"
<table border='0' width='97%' bordercolor='#000000' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%' bordercolor='#F9F9F9' bgcolor='#F9F9F9'>Mensagem de $nome em $data às $hora horas</td>
  </tr>
  <tr>
    <td width='100%' bordercolor='#F9F9F9'>&nbsp;$comentario</td>
  </tr>
</table>
";
}
echo"</td>
</tr>
</table>";
}else {
echo "<center><font face=Verdana size=2 color=#000000><b>Não existem ainda mensagens para esta foto!<br><a href=javascript:window.close(-1)>Clique aqui para fechar</a></b></font>";
}
?>
