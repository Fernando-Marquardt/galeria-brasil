<?php
if (!defined('IN_SYS')) die();

$query = db_query("SELECT * FROM galeria WHERE id_galeria = {$_GET['id']}");
$galeria = db_result($query);

$url = "../galerias/{$galeria['diretorio']}";
?>

<?php include 'galerias/menu.php'; ?>

<div class="span-18 last">
    <?php
    for ($i = 1, $size = count($_FILES['foto']['name']); $i <= $size; $i++) {
        $name = $_FILES['foto']['name'][$i];
        $tmp_name = $_FILES['foto']['tmp_name'][$i];

        if (!empty($tmp_name)) {
            if (copy($tmp_name, "{$url}/{$name}")) {
                echo "<div class=\"success\">Foto {$i} enviada com sucesso!</div>";
            } else {
                echo "<div class=\"error\">Foto {$i} não pode ser enviada.</div>";
            }
        }
    }
    ?>
    
    <center><a href="?p=galerias">Voltar para as galerias</a></center>
</div>