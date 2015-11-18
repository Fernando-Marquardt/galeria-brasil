<? include("../admin/menu.php")?>
/* ***********************************************
 *  Autor  : Sólon Albuquerque Góis
 *  E-mail : web@itnet.com.br
 *  licensa: Free
 * ***********************************************
*/
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
      <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Opções da Marca d agua</strong></font></td>
   </tr>
</table>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
    <td align="left">
<form action="marca.php" method="post" name="formname2" id="formname2">
    <input name="dir_source" type="hidden" value="galeria/<? echo $nomedapasta?>">
    <input name="dir_output" type="hidden" value="galeria/<? echo $nomedapasta?>">
	<input type="radio" value="marca01.png" name="watermark_file" checked>Marca 01<br>
    <input type="radio" value="marca02.png" name="watermark_file" checked>Marca 02<br><br>
	Opacidade: <input type="text" name="watermark_opa" value="80" size="3" maxlength="3" />%<br><br>
	Posição da marca d´água:<br />
	<select name="watermark_pos">
	<option value="0"> centro meio</option>
	<option value="8"> centro esquerdo</option>
	<option value="6"> centro direito</option>
	<option value="5"> topo meio</option>
	<option value="1"> topo esquerdo</option>
	<option value="2"> topo direito</option>
	<option value="7"> inferior meio</option>
	<option value="4"> inferior esquerdo</option>
	<option value="3" selected="selected"> inferior direito</option>
	</select>
	<br><br>
	<input type="hidden" name="action" value="make_merge" />
	<input type="submit" />
	</form>
      </td>
 </tr>
</table>
