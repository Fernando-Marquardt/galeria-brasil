<? include("verifica.php")?>
<? include("menu.php")?>

<center>
<?
// verifica se o campo foto_antiga preenchido
if($_POST['nova_foto'] == "nao"){

// função renomeia pasta
if($_POST['pastanova'] != $_POST['pastaantiga']){
$var1 = "../images/galeria/". $_POST['pastaantiga'];
$var2 = "../images/galeria/". $_POST['pastanova'];
rename($var1, $var2);
}
$sql = mysql_query("UPDATE galeria SET nome='". $_POST['nome' ] ."', dia='". $_POST['dia'] ."', mes='". $_POST['mes'] ."', ano='". $_POST['ano'] ."', local='". $_POST['local'] ."', pasta='". $_POST['pastanova'] ."', foto01='". $_POST['foto_antiga'] ."' WHERE id='". $_GET['id'] ."'");
?>
<font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><b>Galeria alterada com sucesso!</b></font><font color="<? echo $cortexto?>"><BR><br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique 
  aqui para Voltar</a></font></font>
 
<br>

<?
}
// verifica se o campo foto_antiga preenchido
elseif($_POST['nova_foto'] == "nada"){

// função renomeia pasta
if($_POST['pastanova'] != $_POST['pastaantiga']){
$var1 = "../images/galeria/". $_POST['pastaantiga'];
$var2 = "../images/galeria/". $_POST['pastanova'];
rename($var1, $var2);
}

$sql = mysql_query("UPDATE galeria SET nome='". $_POST['nome'] ."', dia='". $_POST['dia'] ."', mes='". $_POST['mes'] ."', ano='". $_POST['ano'] ."', local='". $_POST['local'] ."', pasta='". $_POST['pastanova'] ."', foto01='' WHERE id='". $_GET['id'] ."'");
?>
<font face='<? echo $fonte?>' size='<? echo $ttitulo?>'><b><font color="<? echo $cortexto?>">Galeria 
  alterada com sucesso!</font></b></font><font color="<? echo $cortexto?>"><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique 
  aqui para Voltar</a></font></font>

<br>

<?
}

// verifica se os campos foto_antiga e foto01 estão preenchidos
else {

// função renomeia pasta
if($_POST['pastanova'] != $_POST['pastaantiga']){
$var1 = "../images/galeria/". $_POST['pastaantiga'];
$var2 = "../images/galeria/". $_POST['pastanova'];
rename($var1, $var2);
}

// aqui executa o upload da foto
if (!copy($_FILES['foto01']['tmp_name'],"../images/galeria/". $_POST['pastanova'] ."/". $_FILES['foto01']['name'])){
	echo "<div align='center'><font color=\"#FF0000\" size='1' face='Verdana, tahoma'><b>Erro no enviar a foto!</b></font></div><BR>";
}

$sql = mysql_query("UPDATE galeria SET nome='". $_POST['nome'] ."', dia='". $_POST['dia'] ."', mes='". $_POST['mes'] ."', ano='". $_POST['ano'] ."', local='". $_POST['local'] ."', pasta='". $_POST['pastanova'] ."', foto01='". $_FILES['foto01']['name'] ."' WHERE id='". $_GET['id'] ."'") or die(mysql_error());
?>
<font face='<? echo $fonte?>' size='<? echo $ttitulo?>'><b><font color="<? echo $cortexto?>">Galeria 
  alterada com sucesso!</font></b></font><font color="<? echo $cortexto?>"><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique 
  aqui para Voltar</a></font></font>

<br>

<? }?>
</center>