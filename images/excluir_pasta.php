<?include ("verifica.php"); include("menu.php");?>
<?
if($caminho != ""){
rmdir ("$caminho/$nomedapasta");
} else {
rmdir ("$nomedapasta");
}
?>
<meta http-equiv="refresh" content="2;URL=listar_arquivos.php">
<center><br>
<br>
<br>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">A pasta <strong><? echo $nomedapasta?></strong> 
 foi excluída com sucesso!</font> 
</center>