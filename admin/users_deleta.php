<?php
if (!defined('IN_SYS')) die();

$delete = db_query("DELETE FROM usuario WHERE id_usuario = '{$_GET['id']}'");
?>
<?php if ($delete): ?>
<div class="success">Usu�rio exclu�do com sucesso!</div>
<?php else: ?>
<div class="error">N�o foi poss�vel excluir o usu�rio.</div>
<?php endif; ?>

<center><a href="?p=users_lista">Voltar para os usu�rios</a></center>