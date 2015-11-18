<?php
if (!defined('IN_SYS')) die();

$delete = db_query("DELETE FROM usuario WHERE id_usuario = '{$_GET['id']}'");
?>
<?php if ($delete): ?>
<div class="success">Usuário excluído com sucesso!</div>
<?php else: ?>
<div class="error">Não foi possível excluir o usuário.</div>
<?php endif; ?>

<center><a href="?p=users_lista">Voltar para os usuários</a></center>