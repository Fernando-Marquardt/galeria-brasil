<?include ("verifica.php"); include("menu.php");?>
<?
rename("$nomeantigo", "$nomedapasta");
?>
<meta http-equiv="refresh" content="2;URL=listar_arquivos.php">
<center><br>
<br>
<br>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">A pasta <strong><? echo $nomeantigo?></strong> 
 foi renomeada para <strong><? echo $nomedapasta?></strong> com sucesso!</font> 
</center>