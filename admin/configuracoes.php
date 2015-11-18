<?php
if (!defined('IN_SYS')) die();

$erro = false;

if (isset($_POST['config'])) {
    $_POST['config']['permitir_impressao'] = isset($_POST['config']['permitir_impressao']) ? $_POST['config']['permitir_impressao'] : 0;
    $_POST['config']['permitir_indicacao'] = isset($_POST['config']['permitir_indicacao']) ? $_POST['config']['permitir_indicacao'] : 0;
    
    foreach ($_POST['config'] as $key => $value) {
        if (!db_query("INSERT INTO config (chave, valor) VALUES ('{$key}', '{$value}')
            ON DUPLICATE KEY UPDATE valor = VALUES(valor)")) {
            $erro = true;
        }
    }
    
    $configQuery = db_query('SELECT * FROM config');

    while ($item = db_result($configQuery)) {
        $config[$item['chave']] = $item['valor'];
    }
}
?>
<script type="text/javascript">
this.name = 'pai';

function muda_indicacao(checked) {
    var div = document.getElementById('tipo_email')

    if (checked == true) {
        div.style.display = 'table-row';
    } else {
        div.style.display = 'none';
    }
}
</script>
<h2>Configurações</h2>

<?php
if (isset($_POST['config'])):
    if ($erro === true):
?>
<div class="error">Um ou mais itens da configuração não foram salvos.</div>
<?php else: ?>
<div class="success">Configurações foram salvas com sucesso .</div>
<?php
    endif;
endif;
?>

<form method="post" action="?p=configuracoes">
    <table>
        <tr> 
            <td width="180">
                <label for="titulo">Título do site:</label>
            </td>
            <td>
                <input name="config[titulo]" id="titulo" type="text" value="<?php echo $config['titulo']; ?>" size="32" />
            </td>
        </tr>
        <tr> 
            <td>
                <label for="url">URL do site:</label>
            </td>
            <td>
                <input name="config[url]" id="url" type="text" value="<?php echo $config['url']; ?>" size="32" />
            </td>
        </tr>
        <tr> 
            <td>
                <label for="permitir_impressao">Permitir impressão?</label>
            </td>
            <td>
                <?php
                $checked = ($config['permitir_impressao'] == 1) ? ' checked="checked"' : '';
                ?>
                <input type="checkbox" name="config[permitir_impressao]" id="permitir_impressao" value="1"<?php echo $checked; ?> />
            </td>
        </tr>
        <tr> 
            <td>
                <label for="permitir_indicacao">Permitir Indicação?</label>
            </td>
            <td>
                <?php
                $checked = ($config['permitir_indicacao'] == 1) ? ' checked="checked"' : '';
                ?>
                <input type="checkbox" name="config[permitir_indicacao]" id="permitir_indicacao" value="1" <?php echo $checked; ?> onclick="muda_indicacao(this.checked);" />
            </td>
        </tr>
        <tr id="tipo_email" style="display: <?php echo ($config['permitir_indicacao'] == 1) ? 'table-row' : 'none'; ?>">
            <td>
                <label>Tipo de envio dos e-mails:</label>
            </td>
            <td>
                <?php $mail_checked = ($config['tipo_email'] == 'mail') ? ' checked="checked"' : ''; ?>
                <input type="radio" name="config[tipo_email]" id="tipo_email_mail" value="mail"<?php echo $mail_checked; ?> />
                <label for="tipo_email_mail">PHP mail();</label>
                
                <?php $mailto_checked = ($config['tipo_email'] == 'mailto') ? ' checked="checked"' : ''; ?>
                <br /><input type="radio" name="config[tipo_email]" id="tipo_email_mailto" value="mailto"<?php echo $mailto_checked; ?> />
                <label for="tipo_email_mailto">Link mailto:</label>
            </td>
        </tr>
    </table>
    
    <div class="box">
        <input type="submit" value="Alterar" />
        <input type="reset" value="Limpar" />
    </div>
</form>