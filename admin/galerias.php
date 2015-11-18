<?php
if (!defined('IN_SYS')) die();

$galerias = db_query('SELECT * FROM galeria ORDER BY data DESC');
?>

<?php include 'galerias/menu.php'; ?>

<div class="span-18 last">
    <h2>Galerias Cadastradas</h2>
    
    <table>
        <thead>
            <tr>
                <th width="30">ID</th>
                <th>Galeria</th>
                <th width="120">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (db_row_count($galerias) === 0): ?>
            <tr>
                <td colspan="3">
                    Nenhum galeria cadastrada.
                </td>
            </tr>
            <?php endif; ?>
            <?php while ($galeria = db_result($galerias)): ?>
            <tr>
                <td><?php echo $galeria['id_galeria']; ?></td>
                <td>
                    <strong>
                        <?php echo $galeria['titulo']; ?>
                    </strong>
                    <br /><?php echo $galeria['local']. ' em ' . date('d/m/Y', strtotime($galeria['data'])); ?>
                </td>
                <td>
                    <a href="?p=enviar_fotos&id=<?php echo $galeria['id_galeria'] ?>"><img src="img/attachment.png" alt="Enviar arquivos" title="Enviar arquivos" /></a>
                    <a href="?p=alterar&id=<?php echo $galeria['id_galeria']; ?>"><img src="img/edit_item.png" alt="Alterar" /></a>
                    <a href="?p=excluir_db&id=<?php echo $galeria['id_galeria']; ?>"><img src="img/delete_item.png" alt="Excluir" /></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>