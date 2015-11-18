<?
// Sistema para verificar se o usuário já está logado ou não
if(!$_COOKIE["usuario"] && !$_COOKIE["senha"]){
header("Location: administrar.php?nivel=". $_GET['nivel']);
}
if($acao == sair){
setcookie("usuario");
setcookie("senha");
header("location: login.php");
}
?>
