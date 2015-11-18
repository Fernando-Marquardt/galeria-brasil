<?php
if (!defined('IN_SYS')) die();

$sql = 'SELECT g.count AS galerias, u.count AS usuarios FROM
    (SELECT COUNT(*) AS count FROM galeria) AS g,
    (SELECT COUNT(*) AS count FROM usuario) AS u';

$query = db_query($sql);
$estatisticas = db_result($query);
?>
<table style="width: 250px;">
    <caption>Estatísticas</caption>

    <tbody>
        <tr>
            <td>Galerias Cadastradas</td>
            <td><?php echo $estatisticas['galerias']; ?></td>
        </tr>
        <tr>
            <td>Usuários Cadastrados</td>
            <td><?php echo $estatisticas['usuarios']; ?></td>
        </tr>
    </tbody>
</table>