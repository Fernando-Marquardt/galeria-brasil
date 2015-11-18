<?
ini_set("register_globals","1");
include("path.php");
?>
<script src="css/janelas_popup.js" language="JavaScript"></script>

<? $var1 = "&evento=$evento&data=$data&local=$local";?>

<table cellpadding="0" cellspacing="0" border="0">
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
      <table width="329" height="247" border="0" cellpadding="0" cellspacing="1" bgcolor="<? echo $cortexto?>">
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

        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="E7E7E7"> <img src="<? echo "$dir$imagens[$i]";?>" border="0"  height="<? print $height?>"></td>
        </tr></table>
    </td>
 </tr>
 <tr>
    <TD height="42"> 
      <table border="0" cellspacing="0" cellpadding="0">
        <tr valign="top"> 
          <td width="70" align="center"> <font size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
            <strong> 
            <?
if ($pg > 1){
   $pag=$pg - 1;
  echo "<a href=\"?dir=$dir&pg=" . ($pag) . "$var1\"><img src=\"images/icone_anterior.jpg\" border=0></a>";
   } else { echo "<font color=$onmouseover><img src=\"images/icone_anterior.jpg\" border=0></font>";}
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
          <td width="70" align="center"><a href="javascript:imprimi('imprimir.php?imagem=<? echo "$dir$imagens[$i]";?><? echo $var1?>');"><img src="images/icone_imprimir.jpg" border=0></a></td>
          <td width="70" align="center"><a href="javascript:indica('indicacao.php?dir=<? echo "$dir";?>&imagem=<? echo $imagens[$i]?><? echo $var1?>');"><img src="images/icone_enviar.jpg" border=0></a></td>
          <td width="70" align="center"> <strong><font size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
            <? if($pg<$total) {
           $pagp=$pg+1;
   echo "<a href=\"?dir=$dir&pg=" . ($pagp) . "$var1\"><img src=\"images/icone_proxima.jpg\" border=0></a>";
} else { echo "<font color=$onmouseover><img src=\"images/icone_proxima.jpg\" border=0></font>";}
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
?>
</td>
</tr>
</table>

