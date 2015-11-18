<? include("menu.php");?>
<br>
<center>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif"><strong>LISTA DE ARQUIVOS</strong></font> 
</center><br>

<?
if($caminho == ""){
$caminho = 'galeria';
$rep = opendir($caminho);
while ($file = readdir($rep)) {
$tipo = filetype("$caminho/$file");
if($file != '..' && $file !='.' && $file !=''){ 
 if (!is_dir($file)){?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td width="20" height="20"> 
     <? if($tipo != "dir"){ echo "<img src=\"icone_img.gif\" width=\"18\" height=\"18\">";}
else { echo "<img src=\"icone_pastinha.gif\" width=\"15\" height=\"13\">";}
?>
   </td>
   <td width="200">
<? if($tipo == "dir"){ echo "<a href=\"listar_arquivos.php?caminho=$caminho/$file\"><font size=\"1\" face=\"Verdana, Tahoma, MS Sans Serif\"><strong>$file</strong></font></a>";}
else { echo "<a href=\"$caminho/$file\" target=\"_blank\"><font size=\"1\" face=\"Verdana, Tahoma, MS Sans Serif\"><strong>$file</strong></font></a>";}?>
</td>
    <td width="60"><a href="renomear_arq.php?caminho=<? echo $caminho?>&nomeantigo=<? echo $file?>"><font size="1" face="Verdana, Tahoma, MS Sans Serif">[Renomear]</font></a></td>
<td width="50" align="right">
 <a href="<? if($tipo != "dir"){ echo "excluir_arquivo.php?caminho=$caminho&nomedoarquivo=$file";
 } else { echo "excluir_pasta.php?caminho=$caminho&nomedapasta=$file";}?>">
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">[Excluir]</font></a></td>
 </tr>
</table>

<?
 }
}
}
closedir($rep);


} else { 
$rep = opendir($caminho);
while ($file = readdir($rep)) {
$tipo = filetype("$caminho/$file");
if($file != '..' && $file !='.' && $file !=''){ 
 if (!is_dir($file)){?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td width="20" height="20"> 
     <? if($tipo != "dir"){ echo "<img src=\"icone_img.gif\" width=\"18\" height=\"18\">";}
else { echo "<img src=\"icone_pastinha.gif\" width=\"15\" height=\"13\">";}
?>
   </td>
   <td width="200">
<? if($tipo == "dir"){ echo "<a href=\"listar_arquivos.php?caminho=$caminho/$file\"><font size=\"1\" face=\"Verdana, Tahoma, MS Sans Serif\"><strong>$file</strong></font></a>";}
else { echo "<a href=\"$caminho/$file\" target=\"_blank\"><font size=\"1\" face=\"Verdana, Tahoma, MS Sans Serif\"><strong>$file</strong></font></a>";}?>
</td>
    <td width="60"><a href="renomear_arq.php?caminho=<? echo $caminho?>&nomeantigo=<? echo $file?>"><font size="1" face="Verdana, Tahoma, MS Sans Serif">[Renomear]</font></a></td>
<td width="50" align="right">
 <a href="<? if($tipo != "dir"){ echo "excluir_arquivo.php?caminho=$caminho&nomedoarquivo=$file";
 } else { echo "excluir_pasta.php?caminho=$caminho&nomedapasta=$file";}?>">
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">[Excluir]</font></a></td>
 </tr>
</table>

<?
 }
}
}
closedir($rep);
}?>