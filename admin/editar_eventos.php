<script src="../css/janelas_popup.js" language="JavaScript"></script>
<?
include "../path.php";
include "../confmsg.php";
include "menu.php";
$query = "SELECT * FROM calendario order by id desc";
$result = mysql_query($query) or die("Error: " . mysql_error());
$sql = mysql_query("SELECT * FROM calendario order by id desc");
if(mysql_num_rows($sql)>0) {
while ($row = mysql_fetch_assoc($result))
		{
		$apagar = $row['id'];
		$dia = $row['dia'];
		$mes = $row['mes'];
		$ano = $row['ano'];
		$evento = $row['dados'];
echo"<Table width=\"400\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\" style=\"border: 1px solid #000000\">"
  . "  <TR align=\"center\" bgcolor=\"#999999\"> "
  . "    <TD width=\"30\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Dia</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Mes</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Ano</strong></font></TD>"
  . "    <TD width=\"310\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Evento</strong></font></TD>"
  . "    <TD width=\"60\" height=\"15\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><strong>Excluir</strong></font></TD>"
  . "  </TR>"
  . "    <TR> "
  . "    <TD height=\"5\" colspan=\"4\"></TD>"
  . "  </TR>"
  . "  <TR bgcolor=\"#CCCCCC\"> "
  . "    <TD height=\"15\" align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\">$dia</font></td>"
  . "    <TD align=\"left\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"></font>$mes</TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\">$ano<br></font></TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\">$evento</font></TD>"
  . "    <TD align=\"center\"><font color=\"#000000\" size=\"1\" face=\"verdana,tahoma,arial\"><a href=\"excluir_eventos.php?del=$apagar\">Excluir</a></font></TD>"
  . "  </tr>"
  . "  </TABLE>"
 ."";

}
echo"</td>
</tr>
</table>";
}else {
echo "<center><font face=Verdana size=2 color=#FFFFFF><b>Não existem eventos cadastrados!<br></b></font>";
}
?>