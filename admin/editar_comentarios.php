<script src="../css/janelas_popup.js" language="JavaScript"></script>
<?
include "../path.php";
include "../confmsg.php";
include "verifica.php";
include "menu.php";
$query = "SELECT * FROM mensagemfoto order by post desc";
$result = mysql_query($query) or die("Error: " . mysql_error());
$sql = mysql_query("SELECT * FROM mensagemfoto order by post desc");
if(mysql_num_rows($sql)>0) {
while ($row = mysql_fetch_assoc($result))
		{
		$apagar = $row['post'];
		$foto = $row['pagina'];
		$nome = $row['nome'];
		$comentario = $row['comentario'];
		$data = $row['data'];
		$hora = $row['hora'];
echo"<Table width=\"400\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\" style=\"border: 1px solid #000000\">"
  . "  <TR align=\"center\" bgcolor=\"#999999\"> "
  . "    <TD width=\"30\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Comentario</strong></font></TD>"
  . "    <TD width=\"310\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Quem comentou</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Foto</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Data</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Apagar</strong></font></TD>"
  . "  </TR>"
  . "    <TR> "
  . "    <TD height=\"5\" colspan=\"4\"></TD>"
  . "  </TR>"
  . "  <TR bgcolor=\"#CCCCCC\"> "
  . "    <TD height=\"15\" align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\">$comentario</font></td>"
  . "    <TD align=\"left\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"></font>$nome</TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><a href=\"javascript:popup('../imagempop.php?imagem=/galeria/$foto');\"><img src=\"../$foto\" border=1 height=42></a><br>$foto<br></font></TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\">$data às $hora horas</font></TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><a href=\"excluir_comentario.php?del=$apagar\">Excluir</a></font></TD>"
  . "  </tr>"
  . "  </TABLE>"
 ."";

}
echo"</td>
</tr>
</table>";
}else {
echo "<center><font face=Verdana size=2 color=#FFFFFF><b>Não existem ainda comentários para esta Galeria!<br></b></font>";
}
?>