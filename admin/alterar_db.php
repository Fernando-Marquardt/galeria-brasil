<? include("verifica.php")?>
<? include("menu.php")?>

<center>
<?
// verifica se o campo foto_antiga preenchido
if($nova_foto == "nao"){

// função renomeia pasta
if($pastanova != $pastaantiga){
$var1 = "../images/galeria/$pastaantiga";
$var2 = "../images/galeria/$pastanova";
rename("$var1", "$var2");
}
$sql = mysql_query("UPDATE galeria SET nome='$nome', dia='$dia', mes='$mes', ano='$ano', local='$local', pasta='$pastanova', foto01='$foto_antiga' WHERE id='$id'");
?>
<font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><b>Galeria alterada com sucesso!</b></font><font color="<? echo $cortexto?>"><BR><br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique 
  aqui para Voltar</a></font></font>
 
<br>

<?
}
// verifica se o campo foto_antiga preenchido
elseif($nova_foto == "nada"){

// função renomeia pasta
if($pastanova != $pastaantiga){
$var1 = "../images/galeria/$pastaantiga";
$var2 = "../images/galeria/$pastanova";
rename("$var1", "$var2");
}

$sql = mysql_query("UPDATE galeria SET nome='$nome', dia='$dia', mes='$mes', ano='$ano', local='$local', pasta='$pastanova', foto01='' WHERE id='$id'");
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
if($pastanova != $pastaantiga){
$var1 = "../images/galeria/$pastaantiga";
$var2 = "../images/galeria/$pastanova";
rename("$var1", "$var2");
}

// aqui executa o upload da foto
if (copy($foto01,"../images/galeria/$pastanova/".$foto01_name)){}
else{ echo "<div align='center'><font color=\"#FF0000\" size='1' face='Verdana, tahoma'><b>Erro no enviar a foto!</b></font></div><BR>";}

$sql = mysql_query("UPDATE galeria SET nome='$nome', dia='$dia', mes='$mes', ano='$ano', local='$local', pasta='$pastanova', foto01='$foto01_name' WHERE id='$id'");
?>
<font face='<? echo $fonte?>' size='<? echo $ttitulo?>'><b><font color="<? echo $cortexto?>">Galeria 
  alterada com sucesso!</font></b></font><font color="<? echo $cortexto?>"><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique 
  aqui para Voltar</a></font></font>

<br>

<? }?>
</center>