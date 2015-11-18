<?php
if (!defined('IN_SYS')) die();

$query = db_query("SELECT *, DAYOFMONTH(data) AS dia, MONTH(data) AS mes, YEAR(data) AS ano FROM galeria where id_galeria = {$_GET['id']}");
$galeria = db_result($query);
?>

<script language="javascript">
function validate(theForm) {
    if (theForm.nome.value == "") {
        alert("Digite o nome do Link");
        theForm.nome.focus();
        return (false);
    }
    
    return (true);
}

function habilitar() {
    var nForm = document.getElementById('cadastro');
    
    if(nForm.elements['nova_foto'][1].checked == true || nForm.elements['nova_foto'][2] == true) {
        nForm.elements['capa'].disabled = false;
        nForm.elements['capa'].className= "sim";
    } 
}

function desabilitar() {
    var nForm = document.forms['cadastro'];
    
    nForm.elements['capa'].disabled = true;
    nForm.elements['capa'].className = "nao";
}
</script>

<?php include 'galerias/menu.php'; ?>

<div class="span-18 last">
    <h2>Alterar Galeria</h2>

    <form action="?p=alterar_db&id=<?php echo $galeria['id_galeria']; ?>" method="post" enctype="multipart/form-data" id="cadastro" id="cadastro" onsubmit="return validate(this);">
        <table>
            <tr> 
                <td>
                    <label for="titulo">Título:</label>
                </td>
                <td>
                    <input name="titulo" id="titulo" type="text" value="<?php echo $galeria['titulo']?>" /> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label>Data:</label>
                </td>
                <td>
                    <label for="dia">Dia:</label>
                    <input name="dia" id="dia" type="text" value="<?php echo $galeria['dia']; ?>" size="3" />
                    
                    <label for="mes">Mês:</label>
                    <input name="mes" id="mes" type="text" value="<?php echo $galeria['mes']?>" size="3" />
                    
                    <label for="ano">Ano:</label>
                    <input name="ano" id="ano" type="text" value="<?php echo $galeria['ano']?>" size="6" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="local">Local do Evento:</label>
                </td>
                <td>
                    <input name="local" id="local" type="text" value="<?php echo $galeria['local']?>" /> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="diretorio">Pasta de Destino:</label>
                </td>
                <td>
                    <input name="diretorio" id="diretorio" type="text" value="<?php echo $galeria['diretorio']?>">
                </td>
            </tr>
            <tr> 
                <td>
                    <label>Foto de Destaque:</label>
                </td>
                <td>
                    <?php
                    if($galeria['capa'] !== ""):
                        $foto = "../galerias/{$galeria['diretorio']}/{$galeria['capa']}";
                    ?>
                    <a href="<?php echo $foto; ?>" target="_blank">
                        <img src="<?php echo $foto; ?>" height="60">
                    </a>
                    <?php else: ?>
                    <strong>Nenhuma foto</strong>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label>Trocar Foto?</label><BR>
                    <input name="nova_foto" id="foto-nao" type="radio" value="nao" checked="checked" onclick="javascript:desabilitar()" />
                    <label for="foto-nao">Não</label>
                    <input name="nova_foto" id="foto-sim" type="radio" value="sim" onclick="javascript:habilitar();" />
                    <label for="foto-sim">Sim</label> 
                    <input name="nova_foto" id="foto-nada" type="radio" value="nada" onclick="javascript:desabilitar()" />
                    <label for="foto-nada">Sem foto</label>
                    <br /><input name='capa' type='file' size="14" disabled="disabled" />
                </td>
            </tr>
        </table>

        <div class="box">
            <input type="submit" value="Alterar" name="Submit" />
            <input type="reset" value="Limpar" />
        </div>
    </form>
</div>