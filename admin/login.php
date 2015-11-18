<?php
require_once '../core/inc.comum.php';
require_once BASEPATH . '/core/inc.login.php';

$loginFalhou = false;
$logout = false;

if (isset($_GET['logout'])) {
    $logout = true;
    
    deslogar();
}

if (!empty($_POST['login'])) {
    $login = anti_injection($_POST['login']);
    $senha = md5($_POST['senha']);
    
    $query = mysql_query("SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha}'");
    
    if ($query) {
        $usuario = mysql_fetch_assoc($query);
        
        if ($usuario['login'] === $login && $usuario['senha'] === $senha) {
            logar($usuario);
            
            header('Location: index.php');
        } else {
            $loginFalhou = true;
        }
    } else {
        $loginFalhou = true;
    }
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
    <link type="text/css" rel="stylesheet" href="css/login.css" media="screen, projection" />
    
    <title><?php echo $config['titulo']; ?> - Login </title>
</head>
<body>
    <div class="login-painel">
        <div class="login-titulo">
            Área Restrita
        </div>

        <div class="login-conteudo">
            <?php if ($logout): ?>
            <div class="success">
                Logout efetuado com sucesso!
            </div>
            <?php endif; ?>
            <?php if ($loginFalhou): ?>
            <div class="error">
                Login e/ou senha informados estão incorretos.
            </div>
            <?php endif; ?>
            
            <form action="" method="post">
                <div class="form-field">
                    <label for="login">Login:</label>
                    <input type="text" name="login" id="login" />
                </div>

                <div class="form-field">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" />
                </div>

                <div class="login-rodape">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>