<? include_once ("verifica.php");include("menu.php");?><br>
<br>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td align="center">
<form name="form1" method="post" action="listar_arquivos.php?caminho=<? echo $caminho?>">
       <input name="caminho" type="text" style="width:150; height:20; border:1px solid" maxlength="25">
<input type="submit" name="Submit" value="Buscar" style="width:50; height:20; border:1px solid">
     </form></td>
 </tr>
</table>
</body>
</html>