<? include("path.php");?>

<?
$id = $_REQUEST["id"];
$sql = @mysql_query("SELECT * FROM galeria WHERE id = '$id'");
$rows = @mysql_fetch_array($sql);
$clicks = $rows["clicks"];
$pasta = $rows["pasta"];
$clicks = $clicks + 1; // Fim deste modo para vcs entenderem
$sql = @mysql_query("UPDATE galeria SET clicks = '$clicks' WHERE id = '$id'");

?>
<body background="images/galeria/festas/Montanhas%20azuis.jpg">
<input type="hidden" value="<? echo $evento?>" name="teste">
<table width="626" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td align="left" colspan="2"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong><span style="text-transform: uppercase"></span></strong> 
      <!-- <? include("banner.php");?> -->
      <br>
      <strong><span style="text-transform: uppercase"><font size="<? echo $ttitulo?>">Evento: 
      <? echo "$evento";?></font></span></strong> <br>
      Data: <? echo "$data";?> <br>
      Local: <? echo "$local";?> </font><br>
 </tr>
  <tr> 
    <td width="240" valign="top">
<iframe width="240" height="500" frameborder="0" marginheight="0" marginwidth="0" name="fotos" scrolling="no" src="fotos.php?dir=<? echo $dir?>"></iframe></td>
    <td width="356" valign="top"> 
      <iframe width="356" height="500" frameborder="0" marginheight="0" marginwidth="0" name="exibe_foto" scrolling="no" src="zoom.php?dir=<? echo $dir?>&foto=<? echo $foto?>&evento=<? echo "$evento";?>&data=<? echo $data?>&local=<? echo $local?>"></iframe><br></td>
</tr>
  <tr>
    <td height="21" valign="top"></td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
