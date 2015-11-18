<?include ("verifica.php"); include("menu.php");?>
<br>
<center>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif"><strong>RENOMEAR PASTA</strong></font> 
</center><br>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td align="center">
<form name="form1" method="post" action="renomear_pasta.php">
<input name="nomeantigo" type="hidden" value="<? echo $nomeantigo?>">
       <font size="1" face="Verdana, Tahoma, MS Sans Serif">Digite o novo nome:</font> 
       <input name="nomedapasta" type="text" style="width:150; height:20; border:1px solid" maxlength="25">
       <input type="submit" name="Submit" value="Alterar" style="width:50; height:20; border:1px solid">
     </form></td>
 </tr>
</table>
</body>
</html>