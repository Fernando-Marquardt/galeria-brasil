<? include("menu.php");?>
<?
$var1 = "$nomeantigo";
$var2 = "$nomenovo";
rename("$var1", "$var2");
?>
<meta http-equiv="refresh" content="2;URL=listar_arquivos.php?caminho=<? echo $caminho?>">
<center><br>
<br>
<br>
 <font size="1" face="Verdana, Tahoma, MS Sans Serif">O Arquivo <strong><? echo $nomeantigo?></strong> 
 foi renomeado para <strong><? echo $nomenovo?></strong> com sucesso!</font> 
</center>