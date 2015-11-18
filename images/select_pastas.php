<? 
include ("verifica.php");
include("../admin/menu.php")?>

 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
      <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Selecione a pasta de destino</strong></font></td>
   </tr>
</table>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
    <td align="center"> 
      <select name="nomedapasta" style="width:290;border:1px solid <? echo $cortexto?>" onChange="if(options[selectedIndex].value) window.location.href= (options[selectedIndex].value)">
<option selected>Escolha uma Pasta...</option>
<option>==============================</option>
<?
$rep = opendir('galeria');
while ($file = readdir($rep)) {
if($file != '..' && $file !='.' && $file !=''){ 
 if (!is_dir($file)){?>
<option value="enviar_fotos.php?nomedapasta=<? echo $file?>&nivel=<? echo $nivel?>&usuario=<? echo $_COOKIE['usuario']?>"><? echo $file?></option>
<?
 }
}
}
closedir($rep);
?>
</select></form>
      </td>
 </tr>
</table>