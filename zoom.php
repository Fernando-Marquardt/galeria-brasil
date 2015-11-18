<? include("path.php");?>
<script src="css/janelas_popup.js" language="JavaScript"></script>

<? $var1 = "&evento=$evento&data=$data&local=$local";?>

<meta http-equiv="Page-Enter" content="blendTrans(Duration=2)">
<meta http-equiv="Page-Exit" content="blendTrans(Duration=2)">

<body bgcolor="#FF00FF"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
    <td>
      <?
if(!isset($pg) ){
 $pg=1;
}
$handle = opendir($dir);
$ext = "jpg";
$indice = 2;
$ipp = 1;

while (false !== ($file = readdir($handle)))
{
   $pathdata = pathinfo($file);
   if (!is_dir($file) && ($pathdata["extension"] == strtolower($ext)) || ($pathdata["extension"] == strtoupper($ext)))
   {
       $imagens[$indice] = $file;
       $indice++;
   }
}

$pagina = 1;
if ($_GET['pg'])
$pagina = $_GET['pg'];
$paginas = ceil(count($imagens) / $ipp);
$total = ceil(count($imagens));
$inicio = $pg * $ipp;
for ($i = $inicio; $i < ($inicio + $ipp); $i++)
?>
      <table width="100" height="90" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="<? echo $cortexto?>">
        <?
      $res=getimagesize("$dir$imagens[$i]");
      if ($res[1]>265){
      $height=265 ;
      $width=($res[0]*$height)/$res[1];
      }  else {
      $height=$res[1];
      $width=$res[0];
      }
      $width=ceil($width);
      $height=ceil($height);
      ?>
       <tr>
          <td height="15" bgcolor="FFFFFF"><font color="000000" size="<? echo $tfonte?>" face="<? echo $fonte?>"><? echo "&nbsp;<strong>Código</strong>: $imagens[$i]";?></font></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="E7E7E7"> <img src="<? echo "$dir$imagens[$i]";?>" border="0"  height="<? print $height?>"></td>
        </tr></table>
    </td>
 </tr>
 <tr>
    <TD height="42"> 
      <table width="219" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr valign="top"> 
        <td align="center"> <font size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
          <strong> 
          <?
if ($pg > 1){
   $pag=$pg - 1;
  echo "<a href=\"?dir=$dir&pg=" . ($pag) . "$var1\"><img src=\"images/icone_anterior.jpg\" alt='Foto anterior' border=0></a>";
   } else { echo "<font color=$onmouseover><img src=\"images/icone_anterior.jpg\" alt='Foto anterior' border='0'></font>";}
    $div=$pg/12;
for ($x=1;$x<99;$x++){
  if ($div==$x){
   $inter=0;
   break;
  }
}
if (isset($inter) AND $div * 12 < $pg){
if ($div==1){
 $div=0;
} else {
 $div=$div-1;
}
    echo "<script language=JavaScript>
     window.open('fotos.php?dir=$dir&pg=".($div)."$var1', 'fotos');
      </SCRIPT>";
}

?>
          </strong> </font></td>
          <td width="70" align="center"><a href="javascript:popup('imagempop.php?imagem=<? echo "$dir$imagens[$i]";?>');"><img src="images/icone_ampliar.jpg" border=0></a></td>
          <td width="70" align="center"><a href="javascript:imprimi('comprarfoto.php?imagem=<? echo "$dir$imagens[$i]";?><? echo $var1?>');"><img src="images/icone_imprimir.jpg" border=0></a></td>
          <td width="70" align="center"><a href="javascript:indica('indicacao.php?dir=<? echo "$dir";?>&imagem=<? echo $imagens[$i]?><? echo $var1?>');"><img src="images/icone_enviar.jpg" border=0></a></td>
		  <td width="70" align="center"> <strong><font size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
          <? if($pg<$total) {
           $pagp=$pg+1;
   echo "<a href=\"?dir=$dir&pg=" . ($pagp) . "$var1\"><img src=\"images/icone_proxima.jpg\" alt='Próxima Foto' border=0></a>";
} else { echo "<font color=$onmouseover><img src=\"images/icone_proxima.jpg\" alt='Próxima Foto' border=0></font>";}
?>
          </font></strong></td>
      </tr>
    </table>
<?
$div=$pag/12;
if (!strstr($div,'.'))
{
$inter=0;
}
   if (isset($inter) AND $div * 12 < $pg)
{
    echo "<script language=JavaScript>
         window.open('fotos.php?dir=$dir&pg=$div$var1', 'fotos');
      </SCRIPT>";
}
include "confmsg.php";
$query = "SELECT * FROM mensagemfoto WHERE pagina='$dir$imagens[$i]' order by post desc";
$result = mysql_query($query) or die("Error: " . mysql_error());
$sql = mysql_query("SELECT * FROM mensagemfoto WHERE pagina='$dir$imagens[$i]'");
if(mysql_num_rows($sql)>0) { if(mysql_num_rows($sql)>0) {
?>
<center><a href="javascript:window.open('comentar_foto.php?imagem=<? echo "$dir$imagens[$i]";?>', 'Comentarios', 'width=400,height=400,top=0,left=0');%20void(0);"><img src='images/comentar.gif' alt='Comente a foto acima' width="142" height="25" border=0></a> 
      <a href="javascript:window.open('ver_comentario.php?imagem=<? echo "$dir$imagens[$i]";?>', 'Comentarios', 'width=400,height=400,top=0,left=0');%20void(0);"><img src="images/existem.gif" alt='Existem mensagens para a foto acima' border=0></a></center>
<?
}
}else {
?>
<center><a href="javascript:window.open('comentar_foto.php?imagem=<? echo "$dir$imagens[$i]";?>', 'Comentarios', 'width=400,height=400,top=0,left=0');%20void(0);"><img src='images/comentar.gif' alt='Comente a foto acima' border=0></a> 
      <img src='images/naoexistemmsg.gif' alt='Não existem mensagens para a foto acima' width="121" height="25" border=0></center><br>
<?
}
?>

