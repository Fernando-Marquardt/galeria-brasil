<?php
if (!defined('IN_SYS')) die();

$pasta = '';
$pastaCriada = false;
$fotoEnviada = false;

// inicia criação de pasta
if ($_POST['nomedapasta'] != '') {
    $pasta = '../galerias/' . $_POST['nomedapasta'];
    $pastaCriada = mkdir($pasta, 0777);
    chmod($pasta, 0777);
}
// fim da criação da pasta

// inicia a função para enviar a foto
if ($pastaCriada && $_FILES['foto01']['tmp_name'] != '') {
    if (copy($_FILES['foto01']['tmp_name'], $pasta . "/" . $_FILES['foto01']['name'])) {
        $fotoEnviada = true;
        chmod($pasta . "/" . $_FILES['foto01']['name'], 0777);
    } else {
        $fotoEnviada = false;
    }
}
// termina a função para enviar a foto

$titulo = trim($_POST['titulo']);
$data = $_POST['ano'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
$diretorio = trim($_POST['nomedapasta']);

$sql = "INSERT INTO galeria (titulo, data, local, diretorio, capa) 
    VALUES ('{$titulo}','{$data}','{$_POST['local']}','{$diretorio}','{$_FILES['foto01']['name']}')"; 
$query = db_query($sql);
?>
<?php if ($query): ?>
<div class="success">Galeria cadastrada com sucesso!</div>
<?php else: ?>
<div class="error">Ocorreu um erro ao tentar cadastrar a galeria.</div>
<?php endif; ?>
<?php if ($_FILES['foto01']['tmp_name'] != '' && $fotoEnviada === false): ?>
<div class="error">Erro ao enviar a foto de destaque.</div>
<?php endif; ?>

<center><a href="?p=galerias">Voltar para as galerias</a></center>