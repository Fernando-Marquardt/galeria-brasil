<?php
include_once 'core/inc.comum.php';

session_start();

if ((!isset($_GET['id']) || !is_numeric($_GET['id'])) && (!isset($_SESSION['id']) || !is_numeric($_SESSION['id']))) {
    echo "Nenhuma galeria selecionada";
    exit();
} elseif (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

$sql = "SELECT *, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM galeria WHERE id_galeria = ". $_SESSION['id'];
$query = mysql_query($sql);

if (db_row_count($query) == 0) {
    echo "Galeria não encontrada.";
    exit();
} else {
    $rs = db_result($query);

    $dir = "galerias/{$rs['diretorio']}/";

    if (isset($_GET['foto'])) {
        $foto = $_GET['foto'];
    } else {
        $foto = $rs['capa'];
    }
}
?>
<script src="js/janelas_popup.js" language="JavaScript"></script>

<!-- Alguns input hidden que irão armazenar alguma informações on-fly -->
<input type="hidden" name="foto_atual" id="foto_atual" value="<?= $foto; ?>" />
<input type="hidden" name="dir" id="dir" value="<?= $dir; ?>" />

<table border="0" align="center" cellpadding="1" cellspacing="0">
    <tr>
        <td align="left" colspan="2">
            <strong><span style="text-transform: uppercase"><?php echo $rs['titulo'];?></span></strong>
            <br /><?php echo $rs['data'] . ' - ' . $rs['local'];?>
            <hr width="100%" size="1" noshade="noshade" />
        </td>
    </tr>
    <tr> 
        <td width="240" valign="top">
            <div style="width: 240px; height: 300px; overflow: auto;">
                <?php require("fotos.php"); ?>
            </div>
        </td>
        <td width="356" valign="top">
            <div id="zoom" style="width: 356px; height: 320px;">
                <?php require("zoom.php"); ?>
            </div>
        </td>
    </tr>
</table>