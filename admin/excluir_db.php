<?php
if (!defined('IN_SYS')) die();

$galeria = db_result(db_query("SELECT * FROM galeria WHERE id_galeria = {$_GET['id']}"));
$remove = db_query("DELETE FROM galeria WHERE id_galeria = {$_GET['id']}");

$dirName = "../galerias/". $galeria['diretorio'];
$dir = opendir($dirName);

while ($res = readdir($dir)){
    if ($res != '' && $res != '.' && $res != '..'){
        $url = "{$dirName}/{$res}";
        unlink($url);
    }
}

rmdir ($dirName);
?>
<?php if ($remove): ?>
<div class="success">Galeria excluída com sucesso!</div>
<?php else: ?>
<div class="error">Não foi possível excluir a galeria.</div>
<?php endif; ?>

<center><a href="?p=galerias">Voltar para as galerias</a></center>