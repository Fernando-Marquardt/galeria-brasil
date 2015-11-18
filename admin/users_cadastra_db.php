<?php
if (!defined('IN_SYS')) die();

$usuarioExistente = false;

$query = db_query("SELECT * FROM usuario WHERE login = '{$_POST['login']}'");
$usuario = db_result($query);

$login = anti_injection($_POST['login']);

if ($usuario && $usuario['login'] == $_POST['login']) {
    $usuarioExistente = true;
} else {
    $senha = md5($_POST['senha']);
    
    $valores = "'{$_POST['nome']}', '{$_POST['email']}', '{$login}', '{$senha}', '{$_POST['nivel']}'";
    $insert = db_query("INSERT INTO usuario (nome, email, login, senha, nivel) VALUES ({$valores})");
}
?>

<?php if ($usuarioExistente): ?>
<div class="error">O login '<?php echo $login; ?>' já está cadastrado.</div>
<?php elseif ($insert): ?>
<div class="success">Usuário cadastrado com sucesso!</div>
<?php else: ?>
<div class="error">Não foi possível cadastrar o usuário.</div>
<?php endif; ?>

<center><a href="?p=users_lista">Voltar para os usuários</a></center>