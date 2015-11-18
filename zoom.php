<script src="js/janelas_popup.js" language="javascript"></script>

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <table width="329" height="247" border="0" cellpadding="0" cellspacing="1">
<?php
if (empty($foto)) {
    $foto = $imagens[0];
}

$res = getimagesize($dir . $foto);

if ($res[1] > 265) {
    $height = 265 ;
    $width = ($res[0] * $height) / $res[1];
} else {
    $height = $res[1];
    $width = $res[0];
}

$width = ceil($width);
$height = ceil($height);
?>
                <tr>
                    <td align="center" valign="middle" bgcolor="E7E7E7">
                        <img id="foto" src="<?php echo $dir . $foto; ?>" border="0"  height="<?php echo $height?>" width="<?php echo $width ?>" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="42"> 
            <table border="0" cellspacing="0" cellpadding="0">
                <tr valign="top"> 
                    <td width="70" align="center" style="display: none">
                        <strong> 
                            <?php
                            if ($pg > 1) {
                                $pag = $pg - 1;
                                echo "<a href=\"?dir={$dir}&pg={$pag}\"><img src=\"images/icone_anterior.jpg\" border=\"0\" /></a>";
                            } else {
                                echo "<img src=\"images/icone_anterior.jpg\" border=0 />";
                            }
                            ?>
                        </strong>
                    </td>
                    <td width="70" align="center">
                        <a href="javascript:popup('imagempop.php');">
                            <img src="images/icone_ampliar.jpg" border=0>
                        </a>
                    </td>
                    <?php
                    if ($config['permitir_impressao'] == 1) {
                    ?>
                    <td width="70" align="center">
                        <a href="javascript:imprimi('imprimir.php?id=<?php echo $_SESSION['id']; ?>');">
                            <img src="images/icone_imprimir.jpg" />
                        </a>
                    </td>
                    <?php
                    }

                    if ($config['permitir_indicacao'] == 1) {
                    ?>
                    <td width="70" align="center">
                        <a href="javascript:indica('indicacao.php?id=<?php echo $_SESSION['id']; ?>');">
                            <img src="images/icone_enviar.jpg" border=0>
                        </a>
                    </td>
                    <?php
                    }
                    ?>
                    <td width="70" align="center" style="display: none">
                        <strong>
                            <?php
                            if ($pg < $total) {
                                $pagp = $pg + 1;
                                echo "<a href=\"?dir=". $dir ."&pg=" . $pagp ."\"><img src=\"images/icone_proxima.jpg\" border=0></a>";
                            } else {
                                echo "<img src=\"images/icone_proxima.jpg\" border=0>";
                            }
                            ?>
                        </strong>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

