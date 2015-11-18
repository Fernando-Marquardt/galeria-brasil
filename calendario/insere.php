<? include("../admin/menu.php")?>
<?php
if ($_POST["btn_OK"]){
include "config.php";
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];
$dados=$_POST['dados'];
$SQL ="Insert Into calendario (dia,mes,ano,dados) values('$dia','$mes','$ano','$dados')"; 
$Result = mysql_db_query($DB,$SQL,$link); 
if($Result==0) { 
echo 'Erro ao inserir'; 
}else{ 
echo "<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\">";
echo "Dados inseridos com sucesso!!!<br> ";
} 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
<div align="center">
  <table width="500" border="1" cellspacing="2" cellpadding="0">
    <tr>
      <td><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">Dia:</font>
        <input type="text" name="dia"></td>
      <td><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">M&ecirc;s:</font>
        <input type="text" name="mes"></td>
      <td><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">Ano:</font>
        <input type="text" name="ano"></td>
    </tr>
    <tr>
      <td colspan="3"><font color="#000000" size="-1" face="Arial, Helvetica, sans-serif">Compromisso: </font>
        <input type="text" name="dados"></td>
      </tr>
    <tr>
      <td colspan="3"><div align="center">
        <input name="btn_OK" type="submit" id="btn_OK" value="Enviar">
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
