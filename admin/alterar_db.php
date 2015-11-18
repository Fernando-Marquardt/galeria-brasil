<?php
if (!defined('IN_SYS')) die();

$falhaFoto = false;

$query = db_query('SELECT * FROM galeria WHERE id_galeria = ' . $_GET['id']);
$galeria = db_result($query);

// Verifica se é necessário renomear a pasta
if ($_POST['diretorio'] != $galeria['diretorio']) {
    $diretorio = $_POST['diretorio'];
    $diretorioOriginal = "../galerias/{$galeria['diretorio']}";
    $diretorioNovo = "../galerias/{$_POST['diretorio']}";
    
    rename($diretorioOriginal, $diretorioNovo);
} else {
    $diretorio = $galeria['diretorio'];
}

switch ($_POST['nova_foto']) {
    case 'nao':
        $capa = $galeria['capa'];
        break;
    case 'nada':
        $capa = '';
        break;
    case 'sim':
        $capa = $_FILES['capa']['name'];
        
        if (!copy($_FILES['capa']['tmp_name'], "../galerias/{$diretorio}/{$capa}")) {
            $falhaFoto = true;
        }
        
        break;
}

$titulo = $_POST['titulo'];
$data = $_POST['ano'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
$local = $_POST['local'];

$sql = "UPDATE galeria SET 
    titulo = '{$titulo}', data = '{$data}', local = '{$local}', diretorio = '{$diretorio}', capa = '{$capa}'
    WHERE id_galeria = {$_GET['id']}";
$update = db_query($sql);
?>
<?php if ($update): ?>
<div class="success">Galeria alterada com sucesso!</div>
<?php else: ?>
<div class="error">Não foi possível alterar a galeria.</div>
<?php endif; ?>

<?php if ($falhaFoto): ?>
<div class="error">Ocorreu um falha e a foto de capa não pode ser enviada.</div>
<?php endif; ?>

<center><a href="?p=galerias">Voltar para as galerias</a></center>