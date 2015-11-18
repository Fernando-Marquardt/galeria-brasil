<?
if (strstr($pg,".")== TRUE){
$pg=ceil($pg);
$pg=$pg-1;
}
if (!$pg==0)
{
$cont=$pg * 12;
} else {
$cont=0;
}
?>
<? include("path.php");?>
<body bgcolor="#FF00FF">
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
     
   <td width="230" height="240" valign="top"> 
     <?
$handle = opendir($dir);
$ext = "jpg";
$indice = 0;
$ipp = 12;

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
$inicio = $pg * $ipp;
$thumb="imagemdim.php?imagem=";
$var1 = "&evento=$evento&data=$data&local=$local";

for ($i=$inicio; $i<($inicio+$ipp); $i++)
if($imagens[$i] != ""){ ?>
      <? $cont=$cont+1; ?>
     <a href="zoom.php?dir=<? echo "$dir";?><? echo $var1?>&pg=<? echo "$cont";?>" target="exibe_foto">
     <img src="<? echo "$thumb$dir$imagens[$i]"; ?>" hspace="1" vspace="1" border="1"></a>
     <? }?>
   </td>
 </tr>

<tr>
   <TD width="230" align="left" valign="top"> 
     <HR size="1" noshade color="<? echo $cortexto?>">
<table width="230" border="0" cellspacing="0" cellpadding="0">
       <tr> 
         <td width="70" valign="top"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong> 
           <? $total = ceil(count($imagens)); echo $total; ?>
           </strong> Fotos.</font></td>
          <td align="right" valign="top"> <div align="right"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">P&Aacute;G: 
              <?
for($i=0; $i<$paginas; $i++){
$url = "?dir=$dir&pg=$i";
  if ($i==$pg) {
  echo " <b>".($i+1)."</b> ";
  } else {
  echo " <a href='$url'>".($i+1)."</a> ";
  }
} 
?>
              </font> </div></td>
</tr>
</table>
</td>
</tr>
</table>
</body>
