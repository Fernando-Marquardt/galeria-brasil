<?php
if (!defined('IN_SYS')) die();

$usuarios = db_query('SELECT * FROM usuario');
?>

<?php include 'usuarios/menu.php'; ?>

<div class="span-18 last">
    <h2>Usuários Cadastrados</h2>

    <table>
        <thead>
            <tr>
                <th width="30">ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = db_result($usuarios)): ?>
            <tr>
                <td><?php echo $usuario['id_usuario']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['login']; ?></td>
                <td>
                    <a href="?p=users_altera&id=<?php echo $usuario['id_usuario']; ?>"><img src="img/edit_item.png" alt="Alterar" /></a>
                    <a href="?p=users_deleta&id=<?php echo $usuario['id_usuario']; ?>"><img src="img/delete_item.png" alt="Excluir" /></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>