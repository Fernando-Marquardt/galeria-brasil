<? include ("verifica.php");include("menu.php");?>
<br>
<center>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif"><strong>LISTA DE PASTA</strong></font> 
</center><br>

<?
$rep = opendir('.');
while ($file = readdir($rep)) {
if($file != '..' && $file !='.' && $file !=''){ 
 if (is_dir($file)){?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
   <td width="20" height="20"><img src="icone_pastinha.gif" width="15" height="14"></td>
   <td width="200"><a href="listar_arquivos.php?caminho=<? echo $file?>"><strong><font size="1" face="Verdana, Tahoma, MS Sans Serif"><? echo $file?></font></strong></a></td>
   <td width="60"><a href="renomear_dir.php?nomeantigo=<? echo $file?>"><font size="1" face="Verdana, Tahoma, MS Sans Serif">[Renomear]</font></a></td>
   <td width="50" align="right"><a href="excluir_pasta.php?nomedapasta=<? echo $file?>"><font size="1" face="Verdana, Tahoma, MS Sans Serif">[Excluir]</font></a></td>
 </tr>
</table>

<?
 }
}
}
closedir($rep);
?>