<?include_once ("verifica.php"); include("menu.php");?>

<?
mkdir("galeria/$nomedapasta", 0777);
?>
<meta http-equiv="refresh" content="2;URL=listar_arquivos.php">
<center><br>
<br>
<br>
  <font size="1" face="Verdana, Tahoma, MS Sans Serif">A pasta <strong><? echo "$nomedapasta";?></strong> 
  foi criada com sucesso!</font> 
</center>
