<?php
session_start();

function logar($usuario) {
    $_SESSION['usuario'] = $usuario;
}

function deslogar() {
    $_SESSION['usuario'] = null;
    unset($_SESSION['usuario']);
    session_destroy();
}

function verificar_login() {
    return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
}
?>