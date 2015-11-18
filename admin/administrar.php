<? include("verifica.php")?>
<? include("menu.php")?>
<font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
<?
if($nivel == 1){
$sql = mysql_query("SELECT * FROM users");
?>
<font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?nivel=<? echo $nivel?>&acao=cadastra&login=<? echo $_COOKIE['usuario']?>">- Cadastrar 
usuários</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?nivel=<? echo $nivel?>&acao=lista">- Listar 
Usuários</a><br>
</font><br>
<? if($_GET['acao'] == "cadastra"){ include("users_cadastra.php"); }?>
<? if($_GET['acao'] == "cadastra_db"){ include("users_cadastra_db.php"); }?>
<? if($_GET['acao'] == "deleta"){ include("users_deleta.php"); }?>
<? if($_GET['acao'] == "lista"){ include("users_lista.php");}?>
<? if($_GET['acao'] == "altera"){ include("users_altera.php");}?>
<? if($_GET['acao'] == "altera_db"){ include("users_altera_db.php");}?>

<? } if($nivel == 2){
$sql = mysql_query("SELECT * FROM users");
while ($dados=mysql_fetch_array($sql)) {
$id = $dados['id'];
}
?>
<br>
<font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><a href="?nivel=<? echo $nivel?>&acao=altera&id=<? echo $id;?>">- Alterar dados</a></font></font><br>
<? if($_GET['acao'] == "altera"){ include("users_altera.php");}?>
<? if($_GET['acao'] == "altera_db"){ include("users_altera_db.php");}?>
<? }?>
