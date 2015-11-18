<?php
if (!defined('IN_SYS')) die();

$values = "nome = '{$_POST['nome']}', email = '{$_POST['email']}'";

if ($_SESSION['usuario']['nivel'] == 1) {
    $login = anti_injection($_POST['login']);
    $values .= ", login = '{$login}', nivel = '{$_POST['nivel']}'";
}

$senha = trim($_POST['senha']);

if (!empty($senha)) {
    $senha = md5($senha);
    $values .= ", senha = '{$senha}'";
}

$update = db_query("UPDATE usuario SET {$values} WHERE id_usuario = {$_GET['id']}");
?>

<?php if ($update): ?>
<div class="success">Usuário alterado com sucesso!</div>
<?php else: ?>
<div class="error">Não foi possível alterar os dados do usuário.</div>
<?php endif; ?>

<center><a href="?p=users_lista">Voltar para os usuários</a></center>