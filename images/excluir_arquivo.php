<? include ("verifica.php");include("menu.php");?>
<?
$url = "$caminho/$nomedoarquivo";
unlink("$url");
?>
<meta http-equiv="refresh" content="2;URL=listar_arquivos.php?caminho=<? echo $caminho?>">
<center><br>
<br>
<br>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">O arquivo <strong><? echo $nomedoarquivo?></strong> 
 foi excluído com sucesso!</font> 
</center>