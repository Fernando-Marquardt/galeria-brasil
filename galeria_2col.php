<?php
require_once 'core/inc.comum.php';

$query = db_query("SELECT *, DAYOFMONTH(data) AS dia, MONTH(data) AS mes, YEAR(data) AS ano FROM galeria");

// Agora exiba o código com a configuração de sua tabela - o cabeçalho dela.
?>

<table>
    <?php
    // Agora vamos montar o código. Pegue o valor total de resultados: 
    $total = db_row_count($query); 
    // Defina o número de colunas que você deseja exibir: 
    $colunas = "2"; 
    // Agora vamos ao "truque": 
    if ($total > 0):
        for ($i = 0; $i < $total; $i++): 
            if (($i % $colunas) == 0):
    ?>
    <tr>
        <td height="20" colspan="4"> 
            <hr  />
        </td>
    </tr>
    <tr> 
    <?php
            endif;

            $dados = db_result($query);
    ?>
        <td width="280" align="left" valign="top">
            <?php
            if ($dados['capa'] != ""):
            ?>
            <a href="javascript:AbreJanelaGaleria('janela.php?id=<?php echo $dados['id_galeria']; ?>');">
                <img src="imagemdimindex.php?imagem=galerias/<?php echo $dados['diretorio']?>/<?php echo $dados['capa']?>" />
            </a> 
            <?php
            endif;
            ?>
            <span style="text-transform: uppercase">
                <strong><a href="javascript:AbreJanelaGaleria('janela.php?id=<?php echo $dados['id_galeria'];?>')"><?php echo $dados['titulo']?></a></strong>
            </span>
            <br />
            Data: <strong><?php echo $dados['dia'] ."/". $dados['mes'] ."/". $dados['ano'];?></strong>
            <br />
            Local: <strong><?php echo $dados['local']?></strong>
            <br />
            <strong> 
                <?php
                $dir = "galerias/". $dados['diretorio'];
                $dir = opendir($dir);
                $cont = 0;

                while ($res = readdir($dir)) {
                    $tipo = explode(".", $res);

                    if ($tipo[1] == "jpg" || $tipo[1] == "JPG"){
                            $cont = $cont + 1;
                    }
                }
                
                echo $cont;
                ?>
            </strong> foto(s).
        </td>
    <?php
	endfor;
    endif;
    ?>
    </tr>
</table>