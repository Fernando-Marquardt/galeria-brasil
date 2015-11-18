<?php
require_once '../core/inc.comum.php';
require_once BASEPATH . '/core/inc.login.php';

// ob_start() inicia um buffer de saída, assim as páginas podem usar header('Location: ') sem problemas.
ob_start();

if (!verificar_login()) {
    header('Location: login.php');
    die();
}

// Essa constante ajuda a evitar que página independentes sejam acessadas, verificar no topo das páginas pela constante
// com if (!defined('IN_SYS')) die();
define('IN_SYS', true);

if (isset($_GET['p'])) {
    $pagina = $_GET['p'] . '.php';
    
    if (!file_exists(realpath($pagina))) {
        $pagina = '404.php';
    }
} else {
    $pagina = 'dashboard.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    
    <link type="text/css" rel="stylesheet" href="css/screen.css" media="screen, projection" />
    <link type="text/css" rel="stylesheet" href="css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link type="text/css" rel="stylesheet" href="css/ie.css" media="screen, projection">
    <![endif]-->
    <link type="text/css" rel="stylesheet" href="css/form.css" media="screen, projection" />
    <link type="text/css" rel="stylesheet" href="css/layout.css" media="screen, projection" />
    
    <title><?php echo $config['titulo']; ?></title>
</head>
<body>
    <div class="barra-superior">
        <div class="container">
            Seja bem vindo, <strong><?php echo $_SESSION['usuario']['nome']; ?></strong>.
            
            <a href="login.php?logout=true">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="pagina-header">
            <a href="index.php">
                <img src="img/logo.png" />
            </a>
        </div>
        
        <div class="navegacao clearfix">
            <ul>
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="?p=galerias">Galerias</a>
                </li>
                <li>
                    <a href="?p=users_lista">Usuários</a>
                </li>
                <li>
                    <a href="?p=configuracoes">Configurações</a>
                </li>
                <li>
                    <a href="<?php echo $config['url']; ?>" class="highlight">Ver Galerias</a>
                </li>
            </ul>
        </div>
        
        <div class="pagina-conteudo">
            <?php include $pagina; ?>
        </div>
    </div>
</body>
</html>